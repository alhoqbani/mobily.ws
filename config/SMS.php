<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Account Details
    |--------------------------------------------------------------------------
    |
    | Set your mobile number and Password used to log in to
    | http://mobily.ws
    |
    */
    
    'mobile' => env('MOBILY_WS_MOBILE'),
    'password' =>  env('MOBILY_WS_PASSWORD'),
    
    // Name of Sender must be apporved by mobily.ws for GCC
    // You can override this by calling sender() on SMS
    'sender' => env('MOBILY_WS_SENDER'),

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
    
    // TODO
    'domainName' => '',
    
    // When true, var_dump(SMS) after sedning the request.
    'debug' => false,

    // Define options for the Http request. (Guzzle http Client options)
    'options' => [
        'http_errors' => false,
        'debug' => false,
    ],

];