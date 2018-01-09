<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Payload;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Combined\CombinedPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Data\DataPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\IosNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\WebNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\PayloadFactory;
use PHPUnit\Framework\TestCase;

/**
 * PayloadFactoryTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class PayloadFactoryTest extends TestCase
{
    public function testMethodCreateCombinedPayload()
    {
        $this->assertInstanceOf(CombinedPayload::class, PayloadFactory::createCombinedPayload());
    }

    public function testMethodCreateDataPayload()
    {
        $this->assertInstanceOf(DataPayload::class, PayloadFactory::createDataPayload());
    }

    public function testMethodCreateNotificationAndroidPayload()
    {
        $this->assertInstanceOf(AndroidNotificationPayload::class, PayloadFactory::createNotificationAndroidPayload());
    }

    public function testMethodCreateNotificationIosPayload()
    {
        $this->assertInstanceOf(IosNotificationPayload::class, PayloadFactory::createNotificationIosPayload());
    }

    public function testMethodCreateNotificationWebPayload()
    {
        $this->assertInstanceOf(WebNotificationPayload::class, PayloadFactory::createNotificationWebPayload());
    }
}
