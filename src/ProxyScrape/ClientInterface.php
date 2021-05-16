<?php

namespace PhpForce\ProxyScrapeBundle\ProxyScrape;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface {
    public function getProxies(string $proxyType = 'http'): array;
    public function authenticateIp(array $ip): ResponseInterface;
}
