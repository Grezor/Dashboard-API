<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallFeedService {

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllFeed(): array
    {
        return $this->getApiFeed('/symfony/blog');
    }

    private function getApiFeed(string $url)
    {
        $response = $this->client->request('GET', 'https://feeds.feedburner.com' . $url);
    
        return $response->toArray();
    }
}