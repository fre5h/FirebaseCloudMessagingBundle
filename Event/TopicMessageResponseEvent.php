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

namespace Fresh\FirebaseCloudMessagingBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * TopicMessageResponseEvent.
 *
 * @see https://firebase.google.com/docs/cloud-messaging/http-server-ref#table6
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class TopicMessageResponseEvent extends Event
{
    /**
     * The topic message ID when FCM has successfully received the request
     * and will attempt to deliver to all subscribed devices.
     *
     * @var int
     */
    private $messageId;

    /**
     * Error that occurred when processing the message.
     *
     * @var string
     */
    private $error;

    /**
     * @param int    $messageId
     * @param string $error
     */
    public function __construct(int $messageId, string $error)
    {
        $this->messageId = $messageId;
        $this->error = $error;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }
}
