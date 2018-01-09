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

namespace Fresh\FirebaseCloudMessagingBundle\Message\Part\Target;

/**
 * MulticastTarget.
 *
 * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref#table1
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MulticastTarget implements TargetInterface, TokenTargetInterface
{
    /** @var string[] */
    private $registrationTokens = [];

    /**
     * @param string $registrationToken
     *
     * @return $this
     */
    public function addRegistrationToken(string $registrationToken): self
    {
        if (!\in_array($registrationToken, $this->registrationTokens)) {
            $this->registrationTokens[] = $registrationToken;
        }

        return $this;
    }

    /**
     * @param string[] $registrationTokens
     *
     * @return $this
     */
    public function setRegistrationTokens(array $registrationTokens): self
    {
        foreach ($registrationTokens as $registrationToken) {
            $this->addRegistrationToken($registrationToken);
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRegistrationTokens(): array
    {
        return $this->registrationTokens;
    }

    /**
     * {@inheritdoc}
     */
    public function getSequentialSentTokens(): array
    {
        return $this->getRegistrationTokens();
    }

    /**
     * {@inheritdoc}
     */
    public function getNumberOfSequentialSentTokens(): int
    {
        return \count($this->getRegistrationTokens());
    }
}
