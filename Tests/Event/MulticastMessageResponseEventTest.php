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
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\CanonicalTokenMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\FailedMessageResultCollection;
use Fresh\FirebaseCloudMessagingBundle\Response\MessageResult\Collection\SuccessfulMessageResultCollection;
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
        $success = new SuccessfulMessageResultCollection();
        $failure = new FailedMessageResultCollection();
        $canonicalIds = new CanonicalTokenMessageResultCollection();

        $event = new MulticastMessageResponseEvent($multicastId, $success, $failure, $canonicalIds);
        $this->assertSame($multicastId, $event->getMulticastId());

        $this->assertSame($success, $event->getSuccessfulMessageResults());
        $this->assertCount(0, $event->getSuccessfulMessageResults());

        $this->assertSame($failure, $event->getFailedMessageResults());
        $this->assertCount(0, $event->getFailedMessageResults());

        $this->assertSame($canonicalIds, $event->getCanonicalTokenMessageResults());
        $this->assertCount(0, $event->getCanonicalTokenMessageResults());
    }
}
