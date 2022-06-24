<?php

/**
 * Bundle configuration file for importing yaml
 * configurations to Symfony application
 *
 * @author  Soltix <soltix@soltix.pl>
 * @license proprietary // @cs-ignore
 */

declare(strict_types=1);

namespace Soltix\RegisterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{


    /**
     * Import bundle configuration to Symfony application
     *
     * @return TreeBuilder Symfony TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('soltix_register');

        $treeBuilder->getRootNode()
            ->children()
            // Email configuration.
            ->arrayNode('email')
            ->children()
            ->booleanNode('activation')->end()
            ->booleanNode('welcome')->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;

    }//end getConfigTreeBuilder()


}//end class