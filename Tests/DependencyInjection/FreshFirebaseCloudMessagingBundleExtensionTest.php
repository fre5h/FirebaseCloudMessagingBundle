<?php
/*
 * This file is part of the FirebaseCloudMessagingBundle.
 *
 * (c) Artem Henvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Fresh\FirebaseCloudMessagingBundle\Tests\DependencyInjection;

use Fresh\FirebaseCloudMessagingBundle\DependencyInjection\FreshFirebaseCloudMessagingExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;

/**
 * FreshFirebaseCloudMessagingBundleExtensionTest.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class FreshFirebaseCloudMessagingBundleExtensionTest extends TestCase
{
    private FreshFirebaseCloudMessagingExtension $extension;

    private ContainerBuilder $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->extension = new FreshFirebaseCloudMessagingExtension();
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    public function testGetAlias(): void
    {
        $this->assertSame('fresh_firebase_cloud_messaging', $this->extension->getAlias());
    }

    public function testLoadExtension(): void
    {
        $yaml = <<<'YAML'
fresh_firebase_cloud_messaging:
    sender_id: some_dummy_key
    server_key: some_dummy_secret
YAML;
        $parser = new Parser();
        $config = $parser->parse($yaml);
        $this->extension->load($config, $this->container);
        $this->container->loadFromExtension($this->extension->getAlias(), $config['fresh_firebase_cloud_messaging']);
        $this->container->set('event_dispatcher', new \stdClass());
        $this->container->compile();

        $this->assertTrue($this->container->hasParameter('firebase_cloud_messaging.sender_id'));
        $this->assertTrue($this->container->hasParameter('firebase_cloud_messaging.server_key'));
        $this->assertTrue($this->container->hasParameter('firebase_cloud_messaging.endpoint'));
        $this->assertTrue($this->container->hasParameter('firebase_cloud_messaging.guzzle_timeout'));
    }
}
