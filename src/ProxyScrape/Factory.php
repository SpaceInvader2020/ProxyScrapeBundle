<?php

namespace PhpForce\ProxyScrapeBundle\ProxyScrape;

class Factory
{
    /**
     * @var string
     */
    protected static $clientClass = Client::class;

    /**
     * {@inheritdoc}
     */
    public static function create(array $parameters = [], array $options = []): ClientInterface
    {
        return new static::$clientClass($parameters, $options);
    }
}
