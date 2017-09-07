<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fr/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Bienvenue', $crawler->filter('.container h1')->text());
    }

    public function testTranslationEnglish(){
        $client = static::createClient();

        $crawler = $client->request('GET', '/en/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome', $crawler->filter('.container h1')->text());
    }
}
