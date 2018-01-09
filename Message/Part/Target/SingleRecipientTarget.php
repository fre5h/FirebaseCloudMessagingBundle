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
 * SingleRecipientTarget.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class SingleRecipientTarget implements TargetInterface, TokenTargetInterface
{
    /** @var string */
    private $registrationToken = '';

    /**
     * @param string $registrationToken
     *
     * @return $this
     */
    public function setRegistrationToken(string $registrationToken): self
    {
        $this->registrationToken = $registrationToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrationToken(): string
    {
        return $this->registrationToken;
    }

    /**
     * {@inheritdoc}
     */
    public function getSequentialSentTokens(): array
    {
        return (array) $this->getRegistrationToken();
    }

    /**
     * {@inheritdoc}
     */
    public function getNumberOfSequentialSentTokens(): int
    {
        return !empty($this->getRegistrationToken()) ? 1 : 0;
    }
}
