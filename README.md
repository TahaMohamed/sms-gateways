# SMS Gateways

Send SMS using multiple gateways like(hisms, smsGateway, newPowers, ...)

## Installation 
You can install **sms-gateways** via composer or by downloading the source.

### Via Composer:

**sms-gateways** is available on Packagist as the
[`tahamohamed/sms-gateways`](https://packagist.org/packages/tahamohamed/sms-gateways) package:
```
 composer require tahamohamed/sms-gateways
```

## Usage
```php
use TahaMohamed\SMS\Gateways\Hisms;
use TahaMohamed\SMS\Message;

# returns 'hisms config'
$credentials = ['username' => 'taha' , 'password' => 'mohamed', 'sender' => '12345'];
$gateway_sms = Hisms::create($credentials)
    // Or set like this 
    // ->setCredentials($credentials)
    ->to(96651111111111)
    // Or add Multiple 
    ->to([96650000000,96659999999])
    ->addDatetime(['date' => date('Y-m-d'), 'time' => date('H:i')])
    ->addMessage('asd asd asd');

# returns 'response from gateway'
$response = Message::send($gateway_sms);
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)