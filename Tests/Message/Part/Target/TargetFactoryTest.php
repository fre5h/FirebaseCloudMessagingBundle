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

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Target;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\ConditionTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\SingleRecipientTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TargetFactory;
use PHPUnit\Framework\TestCase;

/**
 * TargetFactoryTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class TargetFactoryTest extends TestCase
{
    public function testMethodCreateConditionTarget(): void
    {
        $this->assertInstanceOf(ConditionTarget::class, TargetFactory::createConditionTarget());
    }

    public function testMethodCreateMulticastTarget(): void
    {
        $this->assertInstanceOf(MulticastTarget::class, TargetFactory::createMulticastTarget());
    }

    public function testMethodCreateRecipientTarget(): void
    {
        $this->assertInstanceOf(SingleRecipientTarget::class, TargetFactory::createSingleRecipientTarget());
    }
}
