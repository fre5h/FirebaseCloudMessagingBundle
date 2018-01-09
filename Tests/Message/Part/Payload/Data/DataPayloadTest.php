<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Payload\Data;

use Fresh\FirebaseCloudMessaging\Message\Part\Payload\AndroidPayloadInterface;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\Data\DataPayload;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\IosPayloadInterface;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\WebPayloadInterface;
use PHPUnit\Framework\TestCase;

/**
 * DataPayloadTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class DataPayloadTest extends TestCase
{
    public function testObjectCreation()
    {
        $dataPayload = new DataPayload();
        $this->assertInstanceOf(AndroidPayloadInterface::class, $dataPayload);
        $this->assertInstanceOf(IosPayloadInterface::class, $dataPayload);
        $this->assertInstanceOf(WebPayloadInterface::class, $dataPayload);
        $this->assertEmpty($dataPayload->getData());
    }

    public function setGetDataPayload()
    {
        $data = ['test' => 'data'];
        $dataPayload = (new DataPayload())->setData($data);
        $this->assertSame($data, $dataPayload->getData());
    }
}
