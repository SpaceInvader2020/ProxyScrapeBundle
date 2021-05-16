<?php

namespace PhpForce\ProxyScrapeBundle\DependencyInjection;

use GuzzleHttp\Client;
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
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('auth')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('http_client')
                    ->defaultValue('@GuzzleHttpClient')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
