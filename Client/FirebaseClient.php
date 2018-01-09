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

namespace Fresh\FirebaseCloudMessagingBundle\Client;

use Fresh\FirebaseCloudMessagingBundle\Event\FirebaseEvents;
use Fresh\FirebaseCloudMessagingBundle\Event\MulticastMessageResponseEvent;
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\MessageBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessagingBundle\Response\FirebaseResponseInterface;
use Fresh\FirebaseCloudMessagingBundle\Response\MulticastMessageResponse;
use Fresh\FirebaseCloudMessagingBundle\Response\ResponseProcessor;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * FirebaseClient.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class FirebaseClient
{
    /** @var HttpClient */
    private $httpClient;

    /** @var MessageBuilder */
    private $messageBuilder;

    /** @var ResponseProcessor */
    private $responseProcessor;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /**
     * @param HttpClient               $httpClient
     * @param MessageBuilder           $messageBuilder
     * @param ResponseProcessor        $responseProcessor
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(HttpClient $httpClient, MessageBuilder $messageBuilder, ResponseProcessor $responseProcessor, EventDispatcherInterface $eventDispatcher)
    {
        $this->messageBuilder = $messageBuilder;
        $this->responseProcessor = $responseProcessor;
        $this->httpClient = $httpClient;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param AbstractMessage $message
     *
     * @return FirebaseResponseInterface
     */
    public function sendMessage(AbstractMessage $message): FirebaseResponseInterface
    {
        $this->messageBuilder->setMessage($message);

        $response = $this->httpClient->post(
            '',
            ['body' => $this->messageBuilder->getMessageAsJson()]
        );

        $processedResponse = $this->responseProcessor->processResponse($message, $response);
        $this->dispatchEvent($processedResponse);

        return $processedResponse;
    }

    /**
     * @param FirebaseResponseInterface $response
     */
    private function dispatchEvent(FirebaseResponseInterface $response): void
    {
        if ($response instanceof MulticastMessageResponse) {
            $this->eventDispatcher->dispatch(
                FirebaseEvents::MULTICAST_MESSAGE_RESPONSE_EVENT,
                new MulticastMessageResponseEvent(
                    $response->getMulticastId(),
                    $response->getSuccessfulMessageResults(),
                    $response->getFailedMessageResults(),
                    $response->getCanonicalTokenMessageResults()
                )
            );
        }
    }
}
