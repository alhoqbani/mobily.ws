<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Account Details
    |--------------------------------------------------------------------------
    |
    | Define Your Mobile and Password used to log in to
    | http://mobily.ws
    |
    */
    
    // Set your mobile number and password used to login into mobily.ws.
    // TODO Get these values from .env
    'mobile' => '',
    'password' => '',
    // Name of Sender must be apporved by mobily.ws for GCC
    'sender' => '',

    /*
    |--------------------------------------------------------------------------
    | Universal Settings Required by Mobily.ws
    |--------------------------------------------------------------------------
    |
    | You do not need to change any of these settings.
    |
    |
    */
    
    // The Base Uri of the Api. Don't Change this Value.
    'base_uri' => 'http://mobily.ws/api/',
    // Required by mobily.ws Don't Change.
    'applicationType' => 68,
    // 3 when using UTF-8. Don't Change
    'lang' => '3',
    
    //
    'domainName' => 'domainName',

    // Define options for the Http request.
    'options' => [
        'http_errors' => false,
        'debug' => false,
    ],

];