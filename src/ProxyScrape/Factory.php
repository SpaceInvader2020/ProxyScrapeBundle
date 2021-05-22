<?php

namespace PhpForce\ProxyScrapeBundle\ProxyScrape;

use Psr\Http\Client\ClientInterface;

class Factory
{
    protected static string $clientClass = Client::class;

    public static function create(string $auth, string $baseUrl, ClientInterface $httpClient): ClientInterface
    {
        return new static::$clientClass($auth, $baseUrl, $httpClient);
    }
}
