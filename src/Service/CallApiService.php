<?php

namespace App\Service;


use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;

class CallApiService {

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getData(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/users/grezor/repos?&type=all&direction=desc&per_page=100'
        );
        return $response->toArray();
    }

    public function getIssues(): array|Response
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/issues?state=all',
            [
                'auth_basic' => ['Grezor', $_ENV['KEY_GITHUB'] ],
            ]

        );
        return $response->toArray();
    }
}