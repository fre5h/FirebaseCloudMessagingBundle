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

use Fresh\FirebaseCloudMessagingBundle\DependencyInjection\FreshFirebaseCloudMessagingBundleExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * FreshFirebaseCloudMessagingBundleExtensionTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class FreshFirebaseCloudMessagingBundleExtensionTest extends \PHPUnit_Framework_TestCase
{
    /** @var FreshFirebaseCloudMessagingBundleExtension */
    private $extension;

    /** @var ContainerBuilder */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->extension = new FreshFirebaseCloudMessagingBundleExtension();
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    public function testLoadExtension()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        // Check that services have been loaded
        $this->assertTrue($this->container->has('fcm.client'));
        $this->assertTrue($this->container->hasParameter('fcm.sender_id'));
        $this->assertTrue($this->container->hasParameter('fcm.server_key'));
        $this->assertTrue($this->container->hasParameter('fcm.endpoint'));
    }
}
