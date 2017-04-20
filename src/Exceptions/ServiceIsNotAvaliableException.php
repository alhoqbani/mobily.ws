<?php

namespace Alhoqbani\MobilyWs\Exceptions;

class ServiceIsNotAvaliableException extends \Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message = null, $code = 0, Exception $previous = null) {
        // some code
        $this->message = ' This Api is not avaliable right now return value ';
        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ .  $this->message . " : [{$this->code}] \n";
    }
}
