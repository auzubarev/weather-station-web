<?php


namespace Tests;


use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class HttpTest extends TestCase {

    public function testGet() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', URL.'/test');
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertEquals((string)$response->getBody(), 'test ok');
    }

    public function testApiAuth() {
        $client = new \GuzzleHttp\Client();
        try{
            $client->request('POST', URL.'/api/v1/');
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $this->assertEquals($response->getStatusCode(), 403);
            $this->assertEquals(json_decode($response->getBody(), true)['error'], 'Forbidden');
        }
        $client = new \GuzzleHttp\Client([
            'headers' => [
            "Content-Type" => "application/json",
            "Authorization" => 'Base: '.base64_encode(ADMIN_TOKEN),
            "Cookie" => "XDEBUG_SESSION=PHPSTORM",
        ]]);
        $response = $client->request('POST', URL.'/api/v1/', );
        $this->assertEquals($response->getStatusCode(), 200);
        $this->assertArrayNotHasKey('error', json_decode($response->getBody(), true));
    }

}