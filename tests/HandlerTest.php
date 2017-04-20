<?php

namespace Tests;

use Alhoqbani\MobilyWs\Handler;

class HandlerTest extends TestMobilyWs
{
    
    protected function setUp()
    {
        parent::setUp(); //
    }
    
    protected function tearDown()
    {
        parent::tearDown();
    }
    
    /** @test */
    public function it_gets_its_base_uri_from_config_file()
    {
        $handler = new Handler();
        $this->assertAttributeEquals(
            'http://mobily.ws/api/',
            'base_uri',
            $handler);
    }
    
    /** @test */
    public function it_can_create_a_new_http_client()
    {
        $client = Handler::getClient();
        $this->assertInstanceOf('GuzzleHttp\Client',
            $client, 'Handler::getClient() Should return an anstance
                of GuzzzleHttp to pefrom Http requests');
    }
    
}
