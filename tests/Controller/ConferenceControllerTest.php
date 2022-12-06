<?php

namespace App\Tests\Controller;

use App\Entity\Eleve;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConferenceControllerTest extends WebTestCase
 {
    public function testBase()
    {
        $client = static::createClient(); 
        $crawler = $client->request('GET', '/add');
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertStringContainsString(
            'Add',
            $client->getResponse()->getContent()
       );

       $crawler = $client->request('GET', '/prof');       
       $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
}