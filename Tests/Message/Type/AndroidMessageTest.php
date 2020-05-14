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
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AbstractMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AndroidMessage;
use PHPUnit\Framework\TestCase;

/**
 * AndroidMessageTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class AndroidMessageTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $androidMessage = new AndroidMessage();
        $this->assertInstanceOf(AbstractMessage::class, $androidMessage);
    }

    public function testSetGetTarget(): void
    {
        $target = new MulticastTarget();
        $androidMessage = (new AndroidMessage())->setTarget($target);
        $this->assertSame($target, $androidMessage->getTarget());
    }

    public function testSetGetOptions(): void
    {
        $options = new Options();
        $androidMessage = (new AndroidMessage())->setOptions($options);
        $this->assertSame($options, $androidMessage->getOptions());
    }

    public function testSetGetPayload(): void
    {
        $payload = new AndroidNotificationPayload();
        $androidMessage = (new AndroidMessage())->setPayload($payload);
        $this->assertSame($payload, $androidMessage->getPayload());
    }
}
