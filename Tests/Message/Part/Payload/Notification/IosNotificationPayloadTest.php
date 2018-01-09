<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
    public function testObjectCreation()
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

    public function setGetBadge()
    {
        $badge = '1';
        $iosNotificationPayload = (new IosNotificationPayload())->setBadge($badge);
        $this->assertSame($badge, $iosNotificationPayload->getBadge());
    }

    public function setGetBody()
    {
        $body = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setBody($body);
        $this->assertSame($body, $iosNotificationPayload->getBody());
    }

    public function setGetBodyLocArgs()
    {
        $bodyLocArgs = ['test'];
        $iosNotificationPayload = (new IosNotificationPayload())->setBodyLocArgs($bodyLocArgs);
        $this->assertSame($bodyLocArgs, $iosNotificationPayload->getBodyLocArgs());
    }

    public function setGetBodyLocKey()
    {
        $bodyLocKey = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setBodyLocKey($bodyLocKey);
        $this->assertSame($bodyLocKey, $iosNotificationPayload->getBodyLocKey());
    }

    public function setGetClickAction()
    {
        $clickAction = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setClickAction($clickAction);
        $this->assertSame($clickAction, $iosNotificationPayload->getClickAction());
    }

    public function setGetSound()
    {
        $sound = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setSound($sound);
        $this->assertSame($sound, $iosNotificationPayload->getSound());
    }

    public function setGetTitle()
    {
        $title = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setTitle($title);
        $this->assertSame($title, $iosNotificationPayload->getTitle());
    }

    public function setGetTitleLocArgs()
    {
        $titleLocArgs = ['test'];
        $iosNotificationPayload = (new IosNotificationPayload())->setTitleLocArgs($titleLocArgs);
        $this->assertSame($titleLocArgs, $iosNotificationPayload->getTitleLocArgs());
    }

    public function setGetTitleLocKey()
    {
        $titleLocKey = 'test';
        $iosNotificationPayload = (new IosNotificationPayload())->setTitleLocKey($titleLocKey);
        $this->assertSame($titleLocKey, $iosNotificationPayload->getTitleLocKey());
    }
}
