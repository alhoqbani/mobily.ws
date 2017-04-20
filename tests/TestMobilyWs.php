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
    
    protected function createResponse($body) {
        $mock = new MockHandler([
            new Response(200, [], 1),
            new Response(200, [], $body),
            new RequestException("Error Communicating with Server", new Request('GET', 'test'))
        ]);
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
