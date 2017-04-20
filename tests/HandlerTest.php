<?php

namespace Tests;

use Alhoqbani\MobilyWs\Handler;
use Alhoqbani\MobilyWs\SMS;
use Orchestra\Testbench\TestCase;

class HandlerTest extends TestCase
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
    
    protected function getPackageProviders($app)
    {
        return ['Alhoqbani\MobilyWs\MobilyWsServiceProvider'];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('SMS.mobile', '');
        $app['config']->set('SMS.password', '');
    }
    
}
