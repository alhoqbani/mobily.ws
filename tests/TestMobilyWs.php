<?php

namespace Tests;

use Alhoqbani\MobilyWs\SMS;
use Alhoqbani\MobilyWs\Handler;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Orchestra\Testbench\TestCase;


class TestMobilyWs extends TestCase
{
    use SMSAssertions;
    protected $handler;
    
    protected function createResponse($responses =[]) {
        $handler_responses = [];
        foreach($responses as $body) {
            $handler_responses[] = new Response('',[], $body);
        }
        $handler_responses[] = new RequestException("Error Communicating with Server", new Request('GET', 'test'));
        $mock = new MockHandler($handler_responses);
        $handler = HandlerStack::create($mock);
        return $handler;
    }
    
    protected function getPackageProviders($app)
    {
        return ['Alhoqbani\MobilyWs\MobilyWsServiceProvider'];
    }
    
    protected function getEnvironmentSetUp($app)
    {
//        $app['config']->set('SMS.mobile', '');
//        $app['config']->set('SMS.password', '');
//        $app['config']->set('SMS.base_uri', '/');
    }
    
}
