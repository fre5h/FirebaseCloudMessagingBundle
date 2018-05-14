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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\SingleRecipientTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TargetInterface;
use PHPUnit\Framework\TestCase;

/**
 * SingleRecipientTargetTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class SingleRecipientTargetTest extends TestCase
{
    public function testObjectCreation(): void
    {
        $singleRecipientTarget = new SingleRecipientTarget();
        $this->assertInstanceOf(TargetInterface::class, $singleRecipientTarget);
        $this->assertEmpty($singleRecipientTarget->getRegistrationToken());
    }

    public function testSetGetCondition(): void
    {
        $token = 'token';
        $singleRecipientTarget = (new SingleRecipientTarget())->setRegistrationToken($token);
        $this->assertSame($token, $singleRecipientTarget->getRegistrationToken());
    }
}
