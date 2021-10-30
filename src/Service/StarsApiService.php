<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Response;

class StarsApiService {

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    
    public function getReposStars(): array
    {
        $response = $this->client->request(
            'GET',
            'https://api.github.com/users/grezor/starred?&per_page=100',
        );
        return $response->toArray();
    }
}