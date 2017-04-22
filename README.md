<p align="center">
<a href="https://packagist.org/packages/alhoqbani/mobily.ws"><img src="https://poser.pugx.org/alhoqbani/mobily.ws/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/alhoqbani/mobily.ws"><img src="https://poser.pugx.org/alhoqbani/mobily.ws/version" alt="stabel version"></a>
<a href="https://packagist.org/packages/alhoqbani/mobily.ws"><img src="https://poser.pugx.org/alhoqbani/mobily.ws/license" alt="license"></a>
<a href="https://travis-ci.org/alhoqbani/mobily.ws"><img src="https://travis-ci.org/alhoqbani/mobily.ws.svg?branch=master" alt="Build Status"></a>
</p>


## Laravel SMS Library
 Under Development, 
**Not ready for production**.

This is a Laravel package to send SMS using http://mobily.ws.

## Installation


1. Install the package using Composer:
```
Composer require alhoqhbani\mobily.ws
```


2. After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```
        Alhoqbani\MobilyWs\MobilyWsServiceProvider::class,
```


3. Publish the configuration file using:
```
php artisan vendor:publish --provider='Alhoqbani\MobilyWs\MobilyWsServiceProvider'
```


4. In your `.env` file add your mobily.ws login details
```
MOBILY_WS_MOBILE=  
MOBILY_WS_PASSWORD=
MOBILY_WS_SENDER=
```


## Usage


```
use Alhoqbani\MobilyWs\SMS;


   $sms = new SMS();
   
    $sms->text('This is an SMS from Mobily.ws')
        ->to('9665xxxxxxxx')
        ->send();
        
    echo $sms->result(); // تمت عملية الإرسال بنجاح
    
    echo $sms->balance(); // 1124
```

For now, numbers should be entered with the country code without leading zeros or +
### Multiple Recipients:
You can also pass an array of numbers to the `to()` method.
```
$sms->to(['9665xxxxxxxx', '9665xxxxxxxx']);
```


### Defered SMS
You can define the time to send the message by calling `when();`
it takes two arguments, date and time. you can pass null to either.

`Format must be: dd/mm/yyyy, hh:mm:ss`


```
    $sms->text('This is an SMS from Mobily.ws')
        ->to('9665xxxxxxxx')
        ->when('10/25/2030', 06:30:00') 
        ->send();
```


### Other Functions:
`removeDuplicate()` Will remove all duplicate numbers and send notRepeat key to mobily.ws
`domain()` Adds the domainName to the sent sms. 
