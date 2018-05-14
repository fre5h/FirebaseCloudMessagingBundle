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

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Builder\Payload;

use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\AbstractPayloadBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\PayloadBuilderInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\WebPayloadBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\WebNotificationPayload;
use PHPUnit\Framework\TestCase;

/**
 * WebPayloadBuilderTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class WebPayloadBuilderTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $webNotificationPayload = new WebNotificationPayload();
        $builder = new WebPayloadBuilder($webNotificationPayload);
        $this->assertInstanceOf(AbstractPayloadBuilder::class, $builder);
        $this->assertInstanceOf(PayloadBuilderInterface::class, $builder);
    }

    public function testGetEmptyPayloadPartWithoutCallingBuildMethod(): void
    {
        $webNotificationPayload = new WebNotificationPayload();
        $builder = new WebPayloadBuilder($webNotificationPayload);
        $this->assertSame([], $builder->getPayloadPart());
    }

    public function testGetEmptyPayloadPartWithCallingBuildMethod(): void
    {
        $webNotificationPayload = new WebNotificationPayload();
        $builder = new WebPayloadBuilder($webNotificationPayload);
        $builder->build();
        $this->assertSame([], $builder->getPayloadPart());
    }

    public function testGetPayloadPartWithAllFields(): void
    {
        $webNotificationPayload = (new WebNotificationPayload())
            ->setTitle('hello world')
            ->setBody('body')
            ->setClickAction('some_click_action')
            ->setIcon('star');

        $builder = new WebPayloadBuilder($webNotificationPayload);
        $builder->build();
        $expected = [
            'title' => 'hello world',
            'body' => 'body',
            'icon' => 'star',
            'click_action' => 'some_click_action',
        ];
        $this->assertEquals($expected, $builder->getPayloadPart());
    }

    public function testGetPayloadPartWithSomeFields(): void
    {
        $webNotificationPayload = (new WebNotificationPayload())
            ->setTitle('hello world')
            ->setBody('body');

        $builder = new WebPayloadBuilder($webNotificationPayload);
        $builder->build();
        $expected = [
            'title' => 'hello world',
            'body' => 'body',
        ];
        $this->assertEquals($expected, $builder->getPayloadPart());
    }
}
