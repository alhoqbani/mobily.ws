<?php

namespace Tests\Unit;

use Tests\TestBase;
use Alhoqbani\MobilyWs\SMS;

class SMSTest extends TestBase
{
    
    /** @test */
    public function it_can_retrieve_the_avaliable_balance()
    {
        $handler = $this->createResponse([1,'2300/6000']);
        $sms = new SMS($handler);
        $balance = $sms->balance();

        $this->assertEquals(6000, $balance);
        $this->assertInternalType('int', $balance);
    }
    
    /** @test */
    public function it_accepts_single_multiple_phone_numbers() {
        $sms =new SMS();
        $sms->to('966000000001');
        $sms->to(['966000000002', '966000000003']);
        
        $this->assertCount(3,
            $sms->to(),
        'The registered phone numbers by to() should be 3'
        );
    }
    
    /** @test */
    public function it_delete_postponed_message()
    {
        // it makes three requests (status, delete, balance)
        $handler = $this->createResponse([1,1,1]); // Needs three responses.
        $sms = new SMS($handler);
        $sms->delete('somecode');
        
        $this->assertContains('بنجاح', $sms->result());
    }
    
    
}
