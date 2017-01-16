<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Service;

use Fresh\FirebaseCloudMessaging\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface as SymfonyEventDispatcherInterface;

/**
 * Class SymfonyEventDispatcher.
 */
class SymfonyEventDispatcher implements EventDispatcherInterface
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
     * @param string $eventName
     * @param array  $eventData
     */
    public function dispatch($eventName, $eventData)
    {
        $this->dispatcher->dispatch($eventName, $eventData);
    }
}
