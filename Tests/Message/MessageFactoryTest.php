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

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message;

use Fresh\FirebaseCloudMessagingBundle\Message\MessageFactory;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\AndroidMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\IosMessage;
use Fresh\FirebaseCloudMessagingBundle\Message\Type\WebMessage;
use PHPUnit\Framework\TestCase;

/**
 * MessageFactoryTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MessageFactoryTest extends TestCase
{
    public function testMethodCreateAndroidMessage(): void
    {
        $this->assertInstanceOf(AndroidMessage::class, MessageFactory::createAndroidMessage());
    }

    public function testMethodCreateIosMessage(): void
    {
        $this->assertInstanceOf(IosMessage::class, MessageFactory::createIosMessage());
    }

    public function testMethodCreateWebMessage(): void
    {
        $this->assertInstanceOf(WebMessage::class, MessageFactory::createWebMessage());
    }
}
