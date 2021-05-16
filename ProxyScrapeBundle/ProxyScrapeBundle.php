<?php

namespace App\SpaceInvader\ProxyScrapeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProxyScrapeBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        return new DependencyInjection\ProxyScrapeExtension();
    }
}
