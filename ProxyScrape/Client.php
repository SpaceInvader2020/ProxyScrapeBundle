<?php

namespace PhpForce\ProxyScrapeBundle\ProxyScrape;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private string $auth;
    private string $baseUrl;
    private ClientInterface $httpClient;

    public function __construct(string $auth, string $baseUrl, ClientInterface $httpClient)
    {
        $this->auth = $auth;
        $this->baseUrl = $baseUrl;
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $proxyType
     * @return array
     * @throws GuzzleException
     */
    public function getProxies(string $proxyType = 'http'): array
    {
        $url = $this->baseUrl . '/proxy-list?auth=' . $this->auth . '&protocol=' . $proxyType;
        $response = $this->httpClient->request('GET', $url);
        $content = $response->getBody()->getContents();
        return explode("\r\n", trim($content));
    }

    /**
     * @param array $ip
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function authenticateIp(array $ip): ResponseInterface
    {
        $query = http_build_query($ip);
        return $this->httpClient->request(
            'GET',
            $this->baseUrl . '/whitelist?auth=' . $this->auth . '&type=set' . $query
        );
    }
}
