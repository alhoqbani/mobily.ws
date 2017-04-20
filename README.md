[![Latest Stable Version](https://poser.pugx.org/alhoqbani/mobily.ws/v/stable)](https://packagist.org/packages/alhoqbani/mobily.ws)

[![Total Downloads](https://poser.pugx.org/alhoqbani/mobily.ws/downloads)](https://packagist.org/packages/alhoqbani/mobily.ws)

[![Latest Unstable Version](https://poser.pugx.org/alhoqbani/mobily.ws/v/unstable)](https://packagist.org/packages/alhoqbani/mobily.ws)

[![License](https://poser.pugx.org/alhoqbani/mobily.ws/license)](https://packagist.org/packages/alhoqbani/mobily.ws)

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

