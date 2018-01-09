<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message;

use Fresh\FirebaseCloudMessaging\Message\MessageFactory;
use Fresh\FirebaseCloudMessaging\Message\Type\AndroidMessage;
use Fresh\FirebaseCloudMessaging\Message\Type\IosMessage;
use Fresh\FirebaseCloudMessaging\Message\Type\WebMessage;
use PHPUnit\Framework\TestCase;

/**
 * MessageFactoryTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MessageFactoryTest extends TestCase
{
    public function testMethodCreateAndroidMessage()
    {
        $this->assertInstanceOf(AndroidMessage::class, MessageFactory::createAndroidMessage());
    }

    public function testMethodCreateIosMessage()
    {
        $this->assertInstanceOf(IosMessage::class, MessageFactory::createIosMessage());
    }

    public function testMethodCreateWebMessage()
    {
        $this->assertInstanceOf(WebMessage::class, MessageFactory::createWebMessage());
    }
}
