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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that loads and manages bundle configuration.
 *
 * @author Artem Henvald <genvaldartem@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fresh_firebase_cloud_messaging');

        $rootNode
            ->children()
                ->scalarNode('sender_id')->end()
                ->scalarNode('server_key')->end()
                ->scalarNode('endpoint')->defaultValue('https://fcm.googleapis.com/fcm/send')->end()
                ->scalarNode('guzzle_timeout')->defaultValue(50)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
