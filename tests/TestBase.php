<?php

namespace Tests;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Orchestra\Testbench\TestCase;


class TestBase extends TestCase
{
    
    protected $handler;
    
    protected function createResponse($responses = [])
    {
        // mcoked responses to reponse to thr requests
        // Count of responses should be equal to the requests.
        $handler_responses = [];
        foreach ($responses as $body) {
            $handler_responses[] = new Response('', [], $body);  // Deafults settings except body.
        }
        // Throw an exception when reqests exceed mocked responses.
        $handler_responses[] = new RequestException("Error Communicating with Server", new Request('GET', 'test'));
        // mock handler responds with the mocked responses
        $mock = new MockHandler($handler_responses);
        // Handler to be passed to Guzzle Client i.e. new SMS($handler);
        $handler = HandlerStack::create($mock);
        
        return $handler;
    }
    
    protected function getPackageProviders($app)
    {
        return ['Alhoqbani\MobilyWs\MobilyWsServiceProvider'];
    }
    
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('SMS.mobile', 'UserEnteredMobil');
        $app['config']->set('SMS.password', 'UserEnteredPassword');
        $app['config']->set('SMS.sender', 'UserEnteredSender');
        $app['config']->set('SMS.base_uri', 'http://mobily.ws/api/');
    }
    
}
