<?php
/*
 * This file is part of the FreshFcmBundle
 *
 * (c) Artem Genvald <genvaldartem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fresh\FcmBundle\Tests\DependencyInjection;

use Fresh\FcmBundle\DependencyInjection\FreshFcmExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * FreshFcmExtensionTest.
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class FreshFcmExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FreshFcmExtension $extension FreshFcmExtension
     */
    private $extension;

    /**
     * @var ContainerBuilder $container Container builder
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->extension = new FreshFcmExtension();
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    public function testLoadExtension()
    {
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        // Check that services have been loaded
        $this->assertTrue($this->container->has('fcm.client'));
    }
}
