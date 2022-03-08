<?php

namespace App\Service;

use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CallApiGithubService {

    private $client;
    private $apiKeyGithub;

    public function __construct(HttpClientInterface $client, string $apiKeyGithub)
    {
        $this->client = $client;
        $this->apiKeyGithub = $apiKeyGithub;
    }

    /**
     * Displays the number of visitors on each repository
     *
     * @return array
     */
    public function getCountTrafficRepository(): array
    {   
        $count = [];
        $t = $this->getNameRepository();

        foreach ($t as $a) {
            $countRepo[$a] = $this->getApi('/repos/grezor/'. $a .'/traffic/views?&per=week');
            $count[$a] = $countRepo['count'] ?? 0 ;
        }
        return $countRepo;
    }

    /**
     * Retrieve all names repository
     *
     */
    public function getNameRepository()
    {
        $dataArray = [];
        $array = $this->getApi('/users/grezor/repos?&type=public&direction=desc&per_page=100');

        foreach(array_values($array) as $repository) {
            $dataArray[] = $repository['name'];
        }

        return $dataArray;
    }

    /**
     * All repository
     *
     * @return array
     */
    public function getAllRepository(): array
    {
        return $this->getApi('/users/grezor/repos?&type=all&direction=desc&per_page=100');
    }

    /**
     * All issues
     *
     * @return array
     */
    public function getAllIssues(): array
    {
        return $this->getApi('/issues?state=all');
    }

    /**
     * All stars github
     *
     * @return array
     */
    public function getAllStars(): array
    {
        return $this->getApi('/users/grezor/starred?&per_page=100');
    }

    /**
     * basic function to access all the apis github, 
     * with authentication
     * 
     * @param string $url
     * @return array
     */
    private function getApi(string $url): array
    {
        $response = $this->client->request('GET', 'https://api.github.com' . $url, [
                'auth_basic' => ['Grezor', $this->apiKeyGithub ],
            ]
        );
        return $response->toArray();
    }

    /**
     * All Changelog API Github
     *
     * @return string
     */
    public function getAllChangelog(): string
    {
        $cache = new FilesystemAdapter();
        $response = $cache->get('github_feed', function (ItemInterface $item) {
            $item->expiresAfter(3600);
            $data = $this->client->request('GET', 'https://github.blog/changelog/feed/');
            return $data->getContent();
        });
        return $response;
    }
}