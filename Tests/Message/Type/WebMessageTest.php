<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Type;

use Fresh\FirebaseCloudMessaging\Message\Part\Options\Options;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\Notification\WebNotificationPayload;
use Fresh\FirebaseCloudMessaging\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessaging\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessaging\Message\Type\WebMessage;
use PHPUnit\Framework\TestCase;

/**
 * WebMessageTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class WebMessageTest extends TestCase
{
    public function testObjectCreation()
    {
        $webMessage = new WebMessage();
        $this->assertInstanceOf(AbstractMessage::class, $webMessage);
        $this->assertNull($webMessage->getTarget());
        $this->assertNull($webMessage->getOptions());
        $this->assertNull($webMessage->getPayload());
    }

    public function testSetGetTarget()
    {
        $target = new MulticastTarget();
        $webMessage = (new WebMessage())->setTarget($target);
        $this->assertSame($target, $webMessage->getTarget());
    }

    public function testSetGetOptions()
    {
        $options = new Options();
        $webMessage = (new WebMessage())->setOptions($options);
        $this->assertSame($options, $webMessage->getOptions());
    }

    public function testSetGetPayload()
    {
        $payload = new WebNotificationPayload();
        $webMessage = (new WebMessage())->setPayload($payload);
        $this->assertSame($payload, $webMessage->getPayload());
    }
}
