<?php

namespace App\Service;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiDevToService {

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllReadingList(): array
    {
        return $this->getApi('/readinglist?username=grezor&per_page=100');
    }

    private function getApi(string $url)
    {
        $response = $this->client->request('GET', 'https://dev.to/api' . $url, [
            'headers' => [
                'api-key' => $_ENV['KEY_DEVTO'],
            ],
        ]);
        return $response->toArray();
    }
}