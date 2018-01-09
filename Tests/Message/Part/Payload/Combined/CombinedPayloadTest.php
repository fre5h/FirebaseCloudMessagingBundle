<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Payload\Combined;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\AndroidPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Combined\CombinedPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Data\DataPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\IosPayloadInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\WebPayloadInterface;
use PHPUnit\Framework\TestCase;

/**
 * CombinedPayloadTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class CombinedPayloadTest extends TestCase
{
    public function testObjectCreation()
    {
        $combinedPayload = new CombinedPayload();
        $this->assertInstanceOf(AndroidPayloadInterface::class, $combinedPayload);
        $this->assertInstanceOf(IosPayloadInterface::class, $combinedPayload);
        $this->assertInstanceOf(WebPayloadInterface::class, $combinedPayload);
    }

    public function setGetDataPayload()
    {
        $dataPayload = new DataPayload();
        $combinedPayload = (new CombinedPayload())->setDataPayload($dataPayload);
        $this->assertSame($dataPayload, $combinedPayload->getDataPayload());
    }

    public function setGetNotificationPayload()
    {
        $notificationPayload = new AndroidNotificationPayload();
        $combinedPayload = (new CombinedPayload())->setNotificationPayload($notificationPayload);
        $this->assertSame($notificationPayload, $combinedPayload->getNotificationPayload());
    }
}
