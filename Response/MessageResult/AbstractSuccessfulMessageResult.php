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

namespace Fresh\FirebaseCloudMessagingBundle\Response\MessageResult;

/**
 * AbstractSuccessfulMessageResult.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
abstract class AbstractSuccessfulMessageResult extends AbstractMessageResult implements SuccessfulMessageResultInterface
{
    /** @var string */
    private $messageId = '';

    /**
     * {@inheritdoc}
     */
    public function getMessageId(): string
    {
        return $this->messageId;
    }

    /**
     * {@inheritdoc}
     */
    public function setMessageId(string $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }
}
