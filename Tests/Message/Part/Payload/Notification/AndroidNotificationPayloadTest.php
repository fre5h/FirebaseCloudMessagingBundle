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

use Fresh\FirebaseCloudMessaging\Message\Part\Payload\AndroidPayloadInterface;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\Notification\AndroidNotificationPayload;
use PHPUnit\Framework\TestCase;

/**
 * AndroidNotificationPayloadTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class AndroidNotificationPayloadTest extends TestCase
{
    public function testObjectCreation()
    {
        $androidNotificationPayload = new AndroidNotificationPayload();
        $this->assertInstanceOf(AndroidPayloadInterface::class, $androidNotificationPayload);
        $this->assertEmpty($androidNotificationPayload->getBody());
        $this->assertEmpty($androidNotificationPayload->getBodyLocArgs());
        $this->assertEmpty($androidNotificationPayload->getBodyLocKey());
        $this->assertEmpty($androidNotificationPayload->getClickAction());
        $this->assertEmpty($androidNotificationPayload->getColor());
        $this->assertEmpty($androidNotificationPayload->getIcon());
        $this->assertEmpty($androidNotificationPayload->getSound());
        $this->assertEmpty($androidNotificationPayload->getTag());
        $this->assertEmpty($androidNotificationPayload->getTitle());
        $this->assertEmpty($androidNotificationPayload->getTitleLocArgs());
        $this->assertEmpty($androidNotificationPayload->getTitleLocKey());
    }

    public function setGetBody()
    {
        $body = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setBody($body);
        $this->assertSame($body, $androidNotificationPayload->getBody());
    }

    public function setGetBodyLocArgs()
    {
        $bodyLocArgs = ['test'];
        $androidNotificationPayload = (new AndroidNotificationPayload())->setBodyLocArgs($bodyLocArgs);
        $this->assertSame($bodyLocArgs, $androidNotificationPayload->getBodyLocArgs());
    }

    public function setGetBodyLocKey()
    {
        $bodyLocKey = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setBodyLocKey($bodyLocKey);
        $this->assertSame($bodyLocKey, $androidNotificationPayload->getBodyLocKey());
    }

    public function setGetClickAction()
    {
        $clickAction = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setClickAction($clickAction);
        $this->assertSame($clickAction, $androidNotificationPayload->getClickAction());
    }

    public function setGetColor()
    {
        $color = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setColor($color);
        $this->assertSame($color, $androidNotificationPayload->getColor());
    }

    public function setGetIcon()
    {
        $icon = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setIcon($icon);
        $this->assertSame($icon, $androidNotificationPayload->getIcon());
    }

    public function setGetSound()
    {
        $sound = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setSound($sound);
        $this->assertSame($sound, $androidNotificationPayload->getSound());
    }

    public function setGetTag()
    {
        $tag = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setTag($tag);
        $this->assertSame($tag, $androidNotificationPayload->getTag());
    }

    public function setGetTitle()
    {
        $title = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setTitle($title);
        $this->assertSame($title, $androidNotificationPayload->getTitle());
    }

    public function setGetTitleLocArgs()
    {
        $titleLocArgs = ['test'];
        $androidNotificationPayload = (new AndroidNotificationPayload())->setTitleLocArgs($titleLocArgs);
        $this->assertSame($titleLocArgs, $androidNotificationPayload->getTitleLocArgs());
    }

    public function setGetTitleLocKey()
    {
        $titleLocKey = 'test';
        $androidNotificationPayload = (new AndroidNotificationPayload())->setTitleLocKey($titleLocKey);
        $this->assertSame($titleLocKey, $androidNotificationPayload->getTitleLocKey());
    }
}
