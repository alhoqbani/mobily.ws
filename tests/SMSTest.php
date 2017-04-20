<?php

namespace Tests;

use Alhoqbani\MobilyWs\SMS;

class SMSTest extends TestMobilyWs
{
    use SMSAssertions;
    
    /** @test */
    public function it_can_retrieve_the_avaliable_balance()
    {
        $handler = $this->createResponse('2300/6000');
        $sms = new SMS($handler);
        $balance = $sms->balance();
        
        $this->assertEquals(6000, $balance);
        $this->assertInternalType('int', $balance);
    }
    
}
