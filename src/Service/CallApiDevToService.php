<?php

namespace App\Service;

use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CallApiDevToService {

    private $client;
    private $apiKeyDevTo;

    public function __construct(HttpClientInterface $client, string $apiKeyDevTo)
    {
        $this->client = $client;
        $this->apiKeyDevTo = $apiKeyDevTo;
    }

    /**
     * List of favorite articles 
     *
     * @return array
     */
    public function getAllReadingList(): array
    {
        return $this->getApi('/readinglist?username=grezor&per_page=100');
    }
    
    /**
     * basic function to access all the apis dev.to, 
     * with authentication
     * 
     * @param string $url
     * @return array
     */
    private function getApi(string $url)
    {
        $response = $this->client->request('GET', 'https://dev.to/api' . $url, [
            'headers' => [
                'api-key' => $this->apiKeyDevTo,
            ],
        ]);
        return $response->toArray();
    }

    public function getAllData(): string
    {
        $cache = new FilesystemAdapter();
        $response = $cache->get('devto_feed', function (ItemInterface $item) {
            $item->expiresAfter(3600);
            $data = $this->client->request('GET', 'https://dev.to/feed');
            
            return $data->getContent();
        });
        return $response;
    }

    public function getAllDataRss(): string
    {
        $cache = new FilesystemAdapter();
        $response = $cache->get('devto_rss', function (ItemInterface $item) {
            $item->expiresAfter(3600);
            $data = $this->client->request('GET', 'https://dev.to/rss');
            
            return $data->getContent();
        });
        return $response;
    }
}