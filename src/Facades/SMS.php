<?php

namespace Alhoqbani\MobilyWs\Facades;

use Illuminate\Support\Facades\Facade;

class SMS extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SMS';
    }
}
