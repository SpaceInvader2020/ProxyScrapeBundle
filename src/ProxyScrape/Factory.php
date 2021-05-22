<?php

namespace PhpForce\ProxyScrapeBundle\ProxyScrape;

class Factory
{
    protected static string $clientClass = Client::class;

    public static function create(string $auth, string $baseUrl, \GuzzleHttp\ClientInterface $httpClient): ClientInterface
    {
        return new static::$clientClass($auth, $baseUrl, $httpClient);
    }
}
