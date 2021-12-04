<?php

namespace PhpForce\ProxyScrapeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
class ProxyScrapeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DependencyInjection\ProxyScrapeExtension();
    }
}
