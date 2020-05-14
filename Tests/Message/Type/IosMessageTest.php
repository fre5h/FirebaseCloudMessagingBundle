<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle.
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Type;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Options\Options;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\IosNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\IosMessage;
use PHPUnit\Framework\TestCase;

/**
 * IosMessageTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class IosMessageTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $iosMessage = new IosMessage();
        $this->assertInstanceOf(AbstractMessage::class, $iosMessage);
    }

    public function testSetGetTarget(): void
    {
        $target = new MulticastTarget();
        $iosMessage = (new IosMessage())->setTarget($target);
        $this->assertSame($target, $iosMessage->getTarget());
    }

    public function testSetGetOptions(): void
    {
        $options = new Options();
        $iosMessage = (new IosMessage())->setOptions($options);
        $this->assertSame($options, $iosMessage->getOptions());
    }

    public function testSetGetPayload(): void
    {
        $payload = new IosNotificationPayload();
        $iosMessage = (new IosMessage())->setPayload($payload);
        $this->assertSame($payload, $iosMessage->getPayload());
    }
}
