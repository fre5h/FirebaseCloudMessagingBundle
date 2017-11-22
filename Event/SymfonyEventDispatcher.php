<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Event;

use Fresh\FirebaseCloudMessaging\Event\EventInterface;
use Fresh\FirebaseCloudMessaging\Event\FirebaseEvents;
use Fresh\FirebaseCloudMessaging\EventDispatcherInterface as FirebaseCloudMessagingEventDispatcherInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface as SymfonyEventDispatcherInterface;

/**
 * Class SymfonyEventDispatcher.
 */
class SymfonyEventDispatcher implements FirebaseCloudMessagingEventDispatcherInterface
{
    /** @var SymfonyEventDispatcherInterface */
    private $dispatcher;

    /**
     * @param SymfonyEventDispatcherInterface $dispatcher
     */
    public function __construct(SymfonyEventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param string         $eventName
     * @param EventInterface $eventData
     */
    public function dispatch($eventName, EventInterface $eventData)
    {
        $this->dispatcher->dispatch($eventName, $this->getEventData($eventName, $eventData));
    }

    /**
     * @param string         $eventName
     * @param EventInterface $eventData
     *
     * @throws \Exception
     *
     * @return MulticastMessageResponseEvent|TopicMessageResponseEvent
     */
    private function getEventData(string $eventName, EventInterface $eventData): Event
    {
        switch ($eventName) {
            case FirebaseEvents::MULTICAST_MESSAGE_RESPONSE_EVENT:
                /** @var MulticastMessageResponseEvent $eventData */
                $event = new MulticastMessageResponseEvent(
                    $eventData->getMulticastId(),
                    $eventData->getSuccessfulMessageResults(),
                    $eventData->getFailedMessageResults(),
                    $eventData->getCanonicalTokenMessageResults()
                );

                break;
            case FirebaseEvents::TOPIC_MESSAGE_RESPONSE_EVENT:
                /** @var TopicMessageResponseEvent $eventData */
                $event = new TopicMessageResponseEvent(
                    $eventData->getMessageId(),
                    $eventData->getError()
                );

                break;
            default:
                throw new \Exception('Unsupported event type');
        }

        return $event;
    }
}
