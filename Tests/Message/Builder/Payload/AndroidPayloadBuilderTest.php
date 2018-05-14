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
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\AndroidPayloadBuilder;
use Fresh\FirebaseCloudMessagingBundle\Message\Builder\Payload\PayloadBuilderInterface;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Payload\Notification\AndroidNotificationPayload;
use PHPUnit\Framework\TestCase;

/**
 * AndroidPayloadBuilderTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class AndroidPayloadBuilderTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $androidNotificationPayload = new AndroidNotificationPayload();
        $builder = new AndroidPayloadBuilder($androidNotificationPayload);
        $this->assertInstanceOf(AbstractPayloadBuilder::class, $builder);
        $this->assertInstanceOf(PayloadBuilderInterface::class, $builder);
    }

    public function testGetEmptyPayloadPartWithoutCallingBuildMethod(): void
    {
        $androidNotificationPayload = new AndroidNotificationPayload();
        $builder = new AndroidPayloadBuilder($androidNotificationPayload);
        $this->assertSame([], $builder->getPayloadPart());
    }

    public function testGetEmptyPayloadPartWithCallingBuildMethod(): void
    {
        $androidNotificationPayload = new AndroidNotificationPayload();
        $builder = new AndroidPayloadBuilder($androidNotificationPayload);
        $builder->build();
        $this->assertSame([], $builder->getPayloadPart());
    }

    public function testGetPayloadPartWithAllFields(): void
    {
        $androidNotificationPayload = (new AndroidNotificationPayload())
            ->setTitle('hello world')
            ->setTitleLocArgs(['third', 'fourth'])
            ->setTitleLocKey('some_key_1')
            ->setBody('body')
            ->setBodyLocArgs(['first', 'second'])
            ->setBodyLocKey('some_key_2')
            ->setClickAction('some_click_action')
            ->setColor('green')
            ->setIcon('star')
            ->setSound('blabla')
            ->setTag('some_tag');

        $builder = new AndroidPayloadBuilder($androidNotificationPayload);
        $builder->build();
        $expected = [
            'title' => 'hello world',
            'body' => 'body',
            'icon' => 'star',
            'sound' => 'blabla',
            'tag' => 'some_tag',
            'color' => 'green',
            'click_action' => 'some_click_action',
            'title_loc_key' => 'some_key_1',
            'title_loc_args' => ['third', 'fourth'],
            'body_loc_key' => 'some_key_2',
            'body_loc_args' => ['first', 'second'],
        ];
        $this->assertEquals($expected, $builder->getPayloadPart());
    }

    public function testGetPayloadPartWithSomeFields(): void
    {
        $androidNotificationPayload = (new AndroidNotificationPayload())
            ->setTitle('hello world')
            ->setBody('body')
            ->setSound('blabla')
            ->setTag('some_tag');

        $builder = new AndroidPayloadBuilder($androidNotificationPayload);
        $builder->build();
        $expected = [
            'title' => 'hello world',
            'body' => 'body',
            'sound' => 'blabla',
            'tag' => 'some_tag',
        ];
        $this->assertEquals($expected, $builder->getPayloadPart());
    }
}
