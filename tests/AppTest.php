<?php 

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {

    public function testHomepage()
    {
        $client = $this->client->request('GET', '');
        $client->request('GET', '/');
        
        echo $client->getResponse()->getContent();
    }
}