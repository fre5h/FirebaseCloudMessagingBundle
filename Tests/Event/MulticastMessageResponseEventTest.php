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

use Fresh\FirebaseCloudMessagingBundle\Event\MulticastMessageResponseEvent;
use PHPUnit\Framework\TestCase;

/**
 * MulticastMessageResponseEventTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MulticastMessageResponseEventTest extends TestCase
{
    public function testObjectCreation()
    {
        $multicastId = 123;
        $success = 1;
        $failure = 0;
        $canonicalIds = 1;

        $event = new MulticastMessageResponseEvent($multicastId, $success, $failure, $canonicalIds);
        $this->assertSame($multicastId, $event->getMulticastId());
        $this->assertSame($success, $event->getSuccessfulMessageResults());
        $this->assertSame($failure, $event->getNumberOfFailedMessageResults());
        $this->assertSame($canonicalIds, $event->getNumberOfMessagesWithCanonicalRegistrationToken());
    }
}
