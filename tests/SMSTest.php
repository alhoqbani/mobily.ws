<?php

namespace Tests;

use Alhoqbani\MobilyWs\SMS;

class SMSTest extends HandlerTest
{
    use SMSAssertions;
    
    /** @test */
    public function it_can_retrieve_the_avaliable_balance()
    {
        $sms = new sms();
        $balance = $sms->balance();
        dump($balance);
        $this->assertInternalType('int', $balance);
    }
    
}
