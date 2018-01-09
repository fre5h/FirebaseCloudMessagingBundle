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

/**
 * FirebaseEvents.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
final class FirebaseEvents
{
    /**
     * @see \Fresh\FirebaseCloudMessagingBundle\Event\MulticastMessageResponseEvent
     */
    public const MULTICAST_MESSAGE_RESPONSE_EVENT = 'firebase.multicast_message_response';

    /**
     * @see \Fresh\FirebaseCloudMessagingBundle\Event\TopicMessageResponseEvent
     */
    public const TOPIC_MESSAGE_RESPONSE_EVENT = 'firebase.topic_message_response';
}
