<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\Message\Part\Target;

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\ConditionTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TargetInterface;
use PHPUnit\Framework\TestCase;

/**
 * ConditionTargetTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class ConditionTargetTest extends TestCase
{
    public function testObjectCreation()
    {
        $conditionTarget = new ConditionTarget();
        $this->assertInstanceOf(TargetInterface::class, $conditionTarget);
        $this->assertNull($conditionTarget->getCondition());
    }

    public function testSetGetCondition()
    {
        $condition = "'dogs' in topics || 'cats' in topics";
        $conditionTarget = (new ConditionTarget())->setCondition($condition);
        $this->assertSame($condition, $conditionTarget->getCondition());
    }
}
