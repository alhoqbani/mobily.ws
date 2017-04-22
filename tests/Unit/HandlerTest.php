<?php

namespace Tests\Unit;

use Tests\TestBase;
use Alhoqbani\MobilyWs\Handler;
use Alhoqbani\MobilyWs\SMS;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;


class HandlerTest extends TestBase
{
    
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
        $handler = $this->createResponse([1]);
        $client = Handler::getClient($handler);
        $this->assertInstanceOf('GuzzleHttp\Client',
            $client, 'Handler::getClient() Should return an anstance
                of GuzzzleHttp to pefrom Http requests');
    }
    
    /** @test */
    public function it_makes_only_one_rquest_to_check_the_balance()
    {
        $this->markTestIncomplete('Should this request service status or no.');
        // Create a container to collect request and respose data.
        $container = [];
        // history middleware maintains a history of the requests that were sent by a client
        $history = Middleware::history($container);
        
        $handler_stack = $this->createResponse([1,1]); //HandlerStack::create();
        $handler_stack->push($history);
        
        $client = new SMS($handler_stack);
        $client->balance(); // This will perform the reqests. (check status and check balance?);
        // Count the number of transactions
        
        $this->assertCount(
            1,
            $container,
            'it expects the container to have 1 one request to check the balance,
                       but it got ' . count($container)
        );
    }
    
    /** @test */
    public function it_sends_requests_using_post_method_when_requesting_balance()
    {
        $this->markTestSkipped('Until u decide how sendStatus request should be sent..');
    
        // Create a container to collect request and respose data.
        $container = [];
        // history middleware maintains a history of the requests that were sent by a client
        $history = Middleware::history($container);
    
        $handler_stack = $this->createResponse([1,1]); //HandlerStack::create();
        $handler_stack->push($history);
    
        $client = new SMS($handler_stack);
        $client->balance();
        
        $expected_method = 'POST';
        $method = $container[0]['request']->getMethod();
        
        $this->assertEquals(
            $method,
            $expected_method,
            "it expects the reqest to be send using {$expected_method},
                    but the requested mehthod was $method"
        );
        
    }
    
    /** @test */
    public function it_sends_all_required_data_with_balance_request()
    {
        $container = [];
        $history = Middleware::history($container);
        $handler_stack = $this->createResponse([1,1,1,1]);
        $handler_stack->push($history);
    
        $client = new SMS($handler_stack);
        $client->balance();
        
        $expected_request_body = 'mobile=UserEnteredMobil&password=UserEnteredPassword';
        $request_body = $container[1]['request']->getBody()->getContents();
        
        $this->assertEquals(
            $expected_request_body,
            $request_body,
            'The request should include all required params for balance endpoint'
        );
    }
    
}
