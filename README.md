# SMSGateway

<!-- [![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci] -->

Send SMS using multiple gateways like(hisms, smsGateway, netPowers, ...).

## Installation

### Via Composer

``` bash
$ composer require tahamohamed/smsgateway
```

## Usage

```php
# returns 'gateway config'
$credentials = ['username' => 'taha' , 'password' => 'mohamed', 'sender' => '12345'];
$gateway_sms = Hisms::create($credentials)
    // Or NetPowers::create($credentials) , SMSGateway::create($credentials)
    // Or set like this
    // ->setCredentials($credentials)
    ->to(96651111111111)
    // Or add Multiple
    ->to([96650000000,96659999999])
    ->addDatetime(['date' => date('Y-m-d'), 'time' => date('H:i')])
    ->addMessage('asd asd asd');

# returns 'response from gateway'
$response = SMSGateway::send($gateway_sms);
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email taha.mohamed2016@gmail.com instead of using the issue tracker.

## License

MIT. Please see the [MIT](https://choosealicense.com/licenses/mit/) for more information.
<!--
[ico-version]: https://img.shields.io/packagist/v/tahamohamed/smsgateway.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tahamohamed/smsgateway.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tahamohamed/smsgateway/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/tahamohamed/smsgateway
[link-downloads]: https://packagist.org/packages/tahamohamed/smsgateway
[link-travis]: https://travis-ci.org/tahamohamed/smsgateway
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/tahamohamed
[link-contributors]: ../../contributors -->
