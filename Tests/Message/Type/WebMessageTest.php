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
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\WebNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\WebMessage;
use PHPUnit\Framework\TestCase;

/**
 * WebMessageTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class WebMessageTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $webMessage = new WebMessage();
        $this->assertInstanceOf(AbstractMessage::class, $webMessage);
    }

    public function testSetGetTarget(): void
    {
        $target = new MulticastTarget();
        $webMessage = (new WebMessage())->setTarget($target);
        $this->assertSame($target, $webMessage->getTarget());
    }

    public function testSetGetOptions(): void
    {
        $options = new Options();
        $webMessage = (new WebMessage())->setOptions($options);
        $this->assertSame($options, $webMessage->getOptions());
    }

    public function testSetGetPayload(): void
    {
        $payload = new WebNotificationPayload();
        $webMessage = (new WebMessage())->setPayload($payload);
        $this->assertSame($payload, $webMessage->getPayload());
    }
}
