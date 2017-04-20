<?php

namespace Tests;

use Alhoqbani\MobilyWs\SMS;
use PHPUnit_Framework_Assert as PHPUnit;

trait SMSAssertions
{
    
    /**
     * Assert that the cart contains the given number of items.
     *
     * @param     $result
     * @param SMS $SMS
     */
    public function assertSuccessResult($result, SMS $SMS)
    {
        $actual = $SMS->result();
        
        PHPUnit::assertEquals($result, $actual, "Expected message {$result}, but got {$actual}.");
    }
    
}