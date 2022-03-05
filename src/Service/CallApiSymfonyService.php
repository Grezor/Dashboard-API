<?php 

namespace App\Service;

use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CallApiSymfonyServvice {

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllData(): string
    {
        $cache = new FilesystemAdapter();
        $response = $cache->get('symfony_feed', function (ItemInterface $item) {
            $item->expiresAfter(3600);
            $data = $this->client->request('GET', 'https://feeds.feedburner.com/symfony/blog');
            
            return $data->getContent();
        });
        return $response;
    }
}