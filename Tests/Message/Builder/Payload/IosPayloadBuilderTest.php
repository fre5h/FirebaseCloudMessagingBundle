<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Builder\Payload;

use Fresh\FirebaseCloudMessaging\Message\Builder\Payload\AbstractPayloadBuilder;
use Fresh\FirebaseCloudMessaging\Message\Builder\Payload\IosPayloadBuilder;
use Fresh\FirebaseCloudMessaging\Message\Builder\Payload\PayloadBuilderInterface;
use Fresh\FirebaseCloudMessaging\Message\Part\Payload\Notification\IosNotificationPayload;
use PHPUnit\Framework\TestCase;

/**
 * IosPayloadBuilderTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class IosPayloadBuilderTest extends TestCase
{
    public function testObjectCreation()
    {
        $iosNotificationPayload = new IosNotificationPayload();
        $builder = new IosPayloadBuilder($iosNotificationPayload);
        $this->assertInstanceOf(AbstractPayloadBuilder::class, $builder);
        $this->assertInstanceOf(PayloadBuilderInterface::class, $builder);
    }

    public function testGetEmptyPayloadPartWithoutCallingBuildMethod()
    {
        $iosNotificationPayload = new IosNotificationPayload();
        $builder = new IosPayloadBuilder($iosNotificationPayload);
        $this->assertSame([], $builder->getPayloadPart());
    }

    public function testGetEmptyPayloadPartWithCallingBuildMethod()
    {
        $iosNotificationPayload = new IosNotificationPayload();
        $builder = new IosPayloadBuilder($iosNotificationPayload);
        $builder->build();
        $this->assertSame([], $builder->getPayloadPart());
    }

    public function testGetPayloadPartWithAllFields()
    {
        $iosNotificationPayload = (new IosNotificationPayload())
            ->setTitle('hello world')
            ->setTitleLocArgs(['third', 'fourth'])
            ->setTitleLocKey('some_key_1')
            ->setBody('body')
            ->setBodyLocArgs(['first', 'second'])
            ->setBodyLocKey('some_key_2')
            ->setClickAction('some_click_action')
            ->setSound('blabla')
            ->setBadge('1');

        $builder = new IosPayloadBuilder($iosNotificationPayload);
        $builder->build();
        $expected = [
            'title' => 'hello world',
            'body' => 'body',
            'sound' => 'blabla',
            'badge' => '1',
            'click_action' => 'some_click_action',
            'title_loc_key' => 'some_key_1',
            'title_loc_args' => ['third', 'fourth'],
            'body_loc_key' => 'some_key_2',
            'body_loc_args' => ['first', 'second'],
        ];
        $this->assertEquals($expected, $builder->getPayloadPart());
    }

    public function testGetPayloadPartWithSomeFields()
    {
        $iosNotificationPayload = (new IosNotificationPayload())
            ->setTitle('hello world')
            ->setBody('body')
            ->setSound('blabla')
            ->setBadge('1');

        $builder = new IosPayloadBuilder($iosNotificationPayload);
        $builder->build();
        $expected = [
            'title' => 'hello world',
            'body' => 'body',
            'sound' => 'blabla',
            'badge' => '1',
        ];
        $this->assertEquals($expected, $builder->getPayloadPart());
    }
}
