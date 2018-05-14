<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Payload\Notification;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\IosPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\IosNotificationPayload;
use PHPUnit\Framework\TestCase;

/**
 * IosNotificationPayloadTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class IosNotificationPayloadTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $iosNotificationPayload = new IosNotificationPayload();
        $this->assertInstanceOf(IosPayloadInterface::class, $iosNotificationPayload);
        $this->assertEmpty($iosNotificationPayload->getBadge());
        $this->assertEmpty($iosNotificationPayload->getBody());
        $this->assertEmpty($iosNotificationPayload->getBodyLocArgs());
        $this->assertEmpty($iosNotificationPayload->getBodyLocKey());
        $this->assertEmpty($iosNotificationPayload->getClickAction());
        $this->assertEmpty($iosNotificationPayload->getSound());
        $this->assertEmpty($iosNotificationPayload->getTitle());
        $this->assertEmpty($iosNotificationPayload->getTitleLocArgs());
        $this->assertEmpty($iosNotificationPayload->getTitleLocKey());
    }

    public function setGetBadge(): void
    {
        $badge = '1';
        $iosNotificationPayload = (new IosNotificationPayload())->setBadge($badge);
        $this->assertSame($badge, $iosNotificationPayload->getBadge());
    }

    public function setGetBody(): void
    {
        $body = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setBody($body);
        $this->assertSame($body, $iosNotificationPayload->getBody());
    }

    public function setGetBodyLocArgs(): void
    {
        $bodyLocArgs = ['test'];
        $iosNotificationPayload = (new IosNotificationPayload())->setBodyLocArgs($bodyLocArgs);
        $this->assertSame($bodyLocArgs, $iosNotificationPayload->getBodyLocArgs());
    }

    public function setGetBodyLocKey(): void
    {
        $bodyLocKey = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setBodyLocKey($bodyLocKey);
        $this->assertSame($bodyLocKey, $iosNotificationPayload->getBodyLocKey());
    }

    public function setGetClickAction(): void
    {
        $clickAction = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setClickAction($clickAction);
        $this->assertSame($clickAction, $iosNotificationPayload->getClickAction());
    }

    public function setGetSound(): void
    {
        $sound = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setSound($sound);
        $this->assertSame($sound, $iosNotificationPayload->getSound());
    }

    public function setGetTitle(): void
    {
        $title = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setTitle($title);
        $this->assertSame($title, $iosNotificationPayload->getTitle());
    }

    public function setGetTitleLocArgs(): void
    {
        $titleLocArgs = ['test'];
        $iosNotificationPayload = (new IosNotificationPayload())->setTitleLocArgs($titleLocArgs);
        $this->assertSame($titleLocArgs, $iosNotificationPayload->getTitleLocArgs());
    }

    public function setGetTitleLocKey(): void
    {
        $titleLocKey = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setTitleLocKey($titleLocKey);
        $this->assertSame($titleLocKey, $iosNotificationPayload->getTitleLocKey());
    }
}
