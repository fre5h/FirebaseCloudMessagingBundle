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

use Fresh\FirebaseCloudMessaging\Event\TopicMessageResponseEvent;
use PHPUnit\Framework\TestCase;

/**
 * TopicMessageResponseEventTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class TopicMessageResponseEventTest extends TestCase
{
    public function testObjectCreation()
    {
        $messageId = 123;
        $error = 'Missing Registration Token';

        $event = new TopicMessageResponseEvent($messageId, $error);
        $this->assertSame($messageId, $event->getMessageId());
        $this->assertSame($error, $event->getError());
    }
}
