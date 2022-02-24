<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiGlobal {

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getApiHebdoo()
    {
        $response = $this->client->request('GET', 'https://hebdoo.fr/api/last');
        return $response->toArray();
    }
}