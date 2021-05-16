<?php

namespace PhpForce\ProxyScrapeBundle\ProxyScrape;
use Psr\Http\Client\ClientInterface;

interface FactoryInterface
{
    public function create(string $auth, string $baseUrl, ClientInterface $httpClient): ClientInterface;
}
