<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Event;

use Fresh\FirebaseCloudMessaging\Event\FirebaseEvents;
use Fresh\FirebaseCloudMessaging\Event\MulticastMessageResponseEvent;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessaging\Response\MessageResult\Collection\SuccessfulMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Event\SymfonyEventDispatcher;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface as SymfonyEventDispatcherInterface;

/**
 * SymfonyEventDispatcherTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class SymfonyEventDispatcherTest extends TestCase
{
    public function testDispatchMethod()
    {
        /** @var SymfonyEventDispatcherInterface|\PHPUnit_Framework_MockObject_MockObject $eventDispatcher */
        $eventDispatcher = $this->getMockBuilder(SymfonyEventDispatcherInterface::class)
                                ->disableOriginalConstructor()
                                ->getMock();

        $eventDispatcher->expects($this->once())
                        ->method('dispatch');

        $eventData = new MulticastMessageResponseEvent(
            1234567890,
            new SuccessfulMessageResultCollection(),
            new FailedMessageResultCollection(),
            new CanonicalTokenMessageResultCollection()
        );

        $symfonyEventDispatcher = new SymfonyEventDispatcher($eventDispatcher);
        $symfonyEventDispatcher->dispatch(
            FirebaseEvents::MULTICAST_MESSAGE_RESPONSE_EVENT,
            $eventData
        );
    }
}
