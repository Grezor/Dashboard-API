<?php

namespace App\Service;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiDevToService {

    private $client;
    private $apiKeyDevTo;

    public function __construct(HttpClientInterface $client, string $apiKeyDevTo)
    {
        $this->client = $client;
        $this->apiKeyDevTo = $apiKeyDevTo;
    }

    public function getAllReadingList(): array
    {
        return $this->getApi('/readinglist?username=grezor&per_page=100');
    }

    private function getApi(string $url)
    {
        $response = $this->client->request('GET', 'https://dev.to/api' . $url, [
            'headers' => [
                'api-key' => $this->apiKeyDevTo,
            ],
        ]);
        return $response->toArray();
    }
}