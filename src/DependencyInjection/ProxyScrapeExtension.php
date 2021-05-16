<?php

namespace PhpForce\ProxyScrapeBundle\DependencyInjection;

use PhpForce\ProxyScrapeBundle\ProxyScrape;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use ReflectionClass;
use ReflectionException;

class ProxyScrapeExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws ReflectionException
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__) . '/Resources/config'));
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $configs = $this->processConfiguration($configuration, $configs);

        $factoryReference = new Reference(ProxyScrape\FactoryInterface::class);
        $container->setDefinition($factoryReference, new Definition(ProxyScrape\Factory::class));

        $httpClientReference = new Reference($configs['http_client']);
        $definition = new Definition(ProxyScrape\Client::class);
        $definition->setFactory([$factoryReference, 'create']);
        $definition->setArguments([$configs['auth'], $configs['base_url'], $httpClientReference]);
        $definition->setPublic(true);

        $container->setDefinition(sprintf('%s.%s', $this->getAlias(), 'client'), $definition);

        if (false === $container->hasDefinition(ProxyScrape\ClientInterface::class)) {
            $container->setDefinition(ProxyScrape\ClientInterface::class, $definition);
        }
    }

    public function getAlias(): string
    {
        return 'proxy_scrape';
    }
}
