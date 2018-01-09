<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Response;

use Fresh\FirebaseCloudMessagingBundle\Exception\AuthenticationException;
use Fresh\FirebaseCloudMessagingBundle\Exception\ExceptionInterface;
use Fresh\FirebaseCloudMessagingBundle\Exception\InternalServerErrorException;
use Fresh\FirebaseCloudMessagingBundle\Exception\InvalidJsonException;
use Fresh\FirebaseCloudMessagingBundle\Exception\UnsupportedResponseException;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TokenTargetInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\CanonicalTokenMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\SuccessfulMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\FailedMessageResult;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\SuccessfulMessageResult;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResponseProcessor.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class ResponseProcessor
{
    /** @var array */
    private $jsonContentTypes = [
        'application/json',
        'application/json; charset=UTF-8',
    ];

    /** @var AbstractMessage */
    private $message;

    /**
     * @param AbstractMessage   $message
     * @param ResponseInterface $response
     *
     * @throws ExceptionInterface
     *
     * @return FirebaseResponseInterface
     */
    public function processResponse(AbstractMessage $message, ResponseInterface $response): FirebaseResponseInterface
    {
        $this->message = $message;

        if (Response::HTTP_OK === $response->getStatusCode()) {
            $result = $this->processHttpOkResponse($response);
        } elseif (Response::HTTP_BAD_REQUEST === $response->getStatusCode()) {
            throw new InvalidJsonException();
        } elseif (Response::HTTP_UNAUTHORIZED === $response->getStatusCode()) {
            throw new AuthenticationException();
        } elseif (Response::HTTP_INTERNAL_SERVER_ERROR === $response->getStatusCode()) {
            throw new InternalServerErrorException();
        } else {
            throw new UnsupportedResponseException();
        }

        return $result;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return FirebaseResponseInterface
     */
    private function processHttpOkResponse(ResponseInterface $response)
    {
        $body = $this->getBodyAsArray($response);

        if (isset($body['error'])) {
            $response = $this->processHttpOkResponseWithError($body);
        } else {
            $response = $this->processHttpOkResponseWithoutError($body);
        }

        return $response;
    }

    /**
     * @param array $body
     *
     * @return MulticastMessageResponse
     */
    private function processHttpOkResponseWithoutError(array $body): MulticastMessageResponse
    {
        $successfulMessageResults = new SuccessfulMessageResultCollection();
        $failedMessageResults = new FailedMessageResultCollection();
        $canonicalTokenMessageResults = new CanonicalTokenMessageResultCollection();

        if ($this->message->getTarget() instanceof TokenTargetInterface) {
            $numberOfSequentialSentTokens = $this->message->getTarget()->getNumberOfSequentialSentTokens();

            if (isset($body['results']) && \count($body['results']) !== $numberOfSequentialSentTokens) {
                throw new \Exception('Mismatch number of sent tokens and results');
            }

            for ($i = 0; $i < $numberOfSequentialSentTokens; ++$i) {
                $currentToken = $this->message->getTarget()->getSequentialSentTokens()[$i];
                $currentResult = $body['results'][$i];

                if (isset($currentResult['error'])) {
                    $messageResult = (new FailedMessageResult())
                        ->setError($currentResult['error']);

                    $failedMessageResults[] = $messageResult;
                } elseif (isset($currentResult['registration_id'])) {
                    $messageResult = (new CanonicalTokenMessageResult())
                        ->setMessageId($currentResult['message_id'])
                        ->setCanonicalToken($currentResult['registration_id']);

                    $canonicalTokenMessageResults[] = $messageResult;
                } else {
                    $messageResult = (new SuccessfulMessageResult())->setMessageId($currentResult['message_id']);
                    $successfulMessageResults[] = $messageResult;
                }

                $messageResult->setToken($currentToken);
            }
        }

        return (new MulticastMessageResponse())
            ->setMulticastId($body['multicast_id'])
            ->setSuccessfulMessageResults($successfulMessageResults)
            ->setFailedMessageResults($failedMessageResults)
            ->setCanonicalTokenMessageResults($canonicalTokenMessageResults);
    }

    /**
     * @param array $body
     */
    private function processHttpOkResponseWithError(array $body)
    {
        // @todo finish it
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    private function getBodyAsArray(ResponseInterface $response): array
    {
        if ($this->responseContentTypeIsJson($response)) {
            $response->getBody()->rewind();
            $body = null;

            if ($response->getBody()->getSize() > 0) {
                $body = $response->getBody()->getContents();
            }

            return \json_decode($body, true);
        }

        throw new \InvalidArgumentException('Response from Firebase Cloud Messaging is not a JSON');
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    private function responseContentTypeIsJson(ResponseInterface $response): bool
    {
        return $response->hasHeader('Content-Type')
               && \in_array($response->getHeader('Content-Type')[0], $this->jsonContentTypes);
    }
}
