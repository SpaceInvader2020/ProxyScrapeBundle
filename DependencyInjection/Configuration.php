<?php

namespace App\SpaceInvader\ProxyScrapeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('proxy_scrape');

        $treeBuilder->getRootNode()

            ->children()
                ->scalarNode('base_url')
//                    ->isRequired()
//                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('auth')
//                    ->isRequired()
//                    ->cannotBeEmpty()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
