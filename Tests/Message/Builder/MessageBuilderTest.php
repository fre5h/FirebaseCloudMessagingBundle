<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Builder;

use Fresh\FirebaseCloudMessaging\Message\Builder\MessageBuilder;
use PHPUnit\Framework\TestCase;

/**
 * MessageBuilderTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MessageBuilderTest extends TestCase
{
    public function testObjectCreation()
    {
        $builder = new MessageBuilder();
//        $this->assertEquals([], $builder->getMessagePartsAsArray());
//        $this->assertJsonStringEqualsJsonString('{}', $builder->getMessageAsJson());
    }
}
