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
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\Notification\IosNotificationPayload;
use Fresh\FirebaseCloudMessaging\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessaging\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessaging\Message\Type\IosMessage;
use PHPUnit\Framework\TestCase;

/**
 * IosMessageTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class IosMessageTest extends TestCase
{
    public function testObjectCreation()
    {
        $iosMessage = new IosMessage();
        $this->assertInstanceOf(AbstractMessage::class, $iosMessage);
        $this->assertNull($iosMessage->getTarget());
        $this->assertNull($iosMessage->getOptions());
        $this->assertNull($iosMessage->getPayload());
    }

    public function testSetGetTarget()
    {
        $target = new MulticastTarget();
        $iosMessage = (new IosMessage())->setTarget($target);
        $this->assertSame($target, $iosMessage->getTarget());
    }

    public function testSetGetOptions()
    {
        $options = new Options();
        $iosMessage = (new IosMessage())->setOptions($options);
        $this->assertSame($options, $iosMessage->getOptions());
    }

    public function testSetGetPayload()
    {
        $payload = new IosNotificationPayload();
        $iosMessage = (new IosMessage())->setPayload($payload);
        $this->assertSame($payload, $iosMessage->getPayload());
    }
}
