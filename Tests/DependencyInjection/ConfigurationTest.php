<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FirebaseCloudMessagingBundle\Tests\DependencyInjection;

use Fresh\FirebaseCloudMessagingBundle\DependencyInjection\Configuration;
use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;

/**
 * ConfigurationTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    public function testInvalidConfiguration()
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

    public function testValidDefaultConfiguration()
    {
        $this->assertProcessedConfigurationEquals(
            [],
            [
                'endpoint' => 'https://fcm.googleapis.com/fcm/send',
                'guzzle_timeout' => 50,
            ]
        );
    }

    public function testValidConfiguration()
    {
        $this->assertProcessedConfigurationEquals(
            [
                [
                    'messaging_sender_id' => 1234567890,
                    'server_key' => 'some_key',
                ],
            ],
            [
                'messaging_sender_id' => 1234567890,
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
