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

use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\MulticastTarget;
use Fresh\FirebaseCloudMessagingBundle\Message\Part\Target\TargetInterface;
use PHPUnit\Framework\TestCase;

/**
 * MulticastTargetTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class MulticastTargetTest extends TestCase
{
    public function testObjectCreation()
    {
        $multicastTarget = new MulticastTarget();
        $this->assertInstanceOf(TargetInterface::class, $multicastTarget);
        $this->assertEmpty($multicastTarget->getRegistrationTokens());
    }

    public function testAddRegistrationToken()
    {
        $multicastTarget = (new MulticastTarget())
            ->addRegistrationToken('token_1')
            ->addRegistrationToken('token_1')
            ->addRegistrationToken('token_2')
            ->addRegistrationToken('token_2')
            ->addRegistrationToken('token_3');

        $this->assertSame(['token_1', 'token_2', 'token_3'], $multicastTarget->getRegistrationTokens());
    }

    /**
     * @dataProvider dataProviderForTestSetGetRegistrationTokens
     */
    public function testSetGetRegistrationTokens($inputTokens, $expectedTokensFromOutput)
    {
        $multicastTarget = (new MulticastTarget())->setRegistrationTokens($inputTokens);
        $this->assertSame($expectedTokensFromOutput, $multicastTarget->getRegistrationTokens());
    }

    public function dataProviderForTestSetGetRegistrationTokens()
    {
        return [
            [
                ['token_1', 'token_2'],
                ['token_1', 'token_2'],
            ],
            [
                ['token_1', 'token_2', 'token_1', 'token_2'],
                ['token_1', 'token_2'],
            ],
        ];
    }
}
