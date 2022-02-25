<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService {

    private $client;
    private $apiKeyGithub;

    public function __construct(HttpClientInterface $client, string $apiKeyGithub)
    {
        $this->client = $client;
        $this->apiKeyGithub = $apiKeyGithub;
    }

    public function getCountTrafficRepository()
    {   
        $count = [];
        $t = $this->getNameRepository();

        foreach ($t as $a) {
            $countRepo[$a] = $this->getApi('/repos/grezor/'. $a .'/traffic/views?&per=week');
            $count[$a] = $countRepo['count'] ?? 0 ;
        }
        return $countRepo;
    }

    public function getNameRepository()
    {
        $dataArray = [];
        $array = $this->getApi('/users/grezor/repos?&type=public&direction=desc&per_page=100');

        foreach(array_values($array) as $t) {
            $dataArray[] = $t['name'];
        }

        return $dataArray;
    }

    public function getAllRepository(): array
    {
        return $this->getApi('/users/grezor/repos?&type=all&direction=desc&per_page=100');
    }

    public function getAllIssues(): array
    {
        return $this->getApi('/issues?state=all');
    }

    public function getAllStars(): array
    {
        return $this->getApi('/users/grezor/starred?&per_page=100');
    }

    private function getApi(string $url)
    {
        $response = $this->client->request('GET', 'https://api.github.com' . $url, [
                'auth_basic' => ['Grezor', $this->apiKeyGithub ],
            ]
        );
        return $response->toArray();
    }
}