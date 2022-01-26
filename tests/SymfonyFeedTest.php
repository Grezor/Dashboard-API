<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SymfonyFeedTest extends WebTestCase
{
    public function ToGoSymfonyPageTest(): void
    {
        $client = static::createClient();
        $client->request('GET', '/symfony');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Feed Symfony');
    }
}
