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

namespace Fresh\FirebaseCloudMessagingBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages FreshFirebaseCloudMessagingBundle configuration.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class FreshFirebaseCloudMessagingExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('firebase_cloud_messaging.sender_id', $config['sender_id']);
        $container->setParameter('firebase_cloud_messaging.server_key', $config['server_key']);
        $container->setParameter('firebase_cloud_messaging.endpoint', $config['endpoint']);
        $container->setParameter('firebase_cloud_messaging.guzzle_timeout', $config['guzzle_timeout']);
    }
}
