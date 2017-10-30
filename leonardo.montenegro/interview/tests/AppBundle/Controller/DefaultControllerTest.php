<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase {

    public function testIndex() {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                    'Content-Type', 'application/json'
            ), 'the "Content-Type" header is "application/json"'
        );
        $json = $client->getResponse()->getContent();
        $jsonDecode = json_decode($json, true);
        $this->assertArrayHasKey('hello', $jsonDecode);
        $this->assertEquals($jsonDecode['hello'], 'world!!');
    }
}
