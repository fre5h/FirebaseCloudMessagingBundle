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

namespace Fresh\FirebaseCloudMessagingBundle\Tests\DependencyInjection;

use Fresh\FirebaseCloudMessagingBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use PHPUnit\Framework\TestCase;

/**
 * ConfigurationTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class ConfigurationTest extends TestCase
{
    use ConfigurationTestCaseTrait;

    public function testInvalidConfiguration(): void
    {
        $this->assertConfigurationIsInvalid(
            [
                [
                    'invalid_parameter' => 123,
                ],
            ],
            'invalid_parameter'
        );
    }

    public function testValidDefaultConfiguration(): void
    {
        $this->assertProcessedConfigurationEquals(
            [],
            [
                'endpoint' => 'https://fcm.googleapis.com/fcm/send',
                'guzzle_timeout' => 50,
            ]
        );
    }

    public function testValidConfiguration(): void
    {
        $this->assertProcessedConfigurationEquals(
            [
                [
                    'sender_id' => 1234567890,
                    'server_key' => 'some_key',
                ],
            ],
            [
                'sender_id' => 1234567890,
                'server_key' => 'some_key',
                'endpoint' => 'https://fcm.googleapis.com/fcm/send',
                'guzzle_timeout' => 50,
            ]
        );
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}
