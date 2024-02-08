<?php


namespace Tests;


use PHPUnit\Framework\TestCase;

class HttpTest extends TestCase {

    public function testGet() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', URL.'/test');
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals((string)$response->getBody(), 'test ok');
    }

}