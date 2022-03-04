# SMSGateway

<!-- [![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci] -->

Send SMS using multiple gateways like(hisms, smsGateway, netPowers, ...).

## Installation

### Via Composer

```
composer require tahamohamed/smsgateway
```

Then create config file named `smsgateway.php` in `config` directory or you can use
```
php artisan vendor:publish --tag=smsgateway.config
```
## Configuration

You need to add credentials of gateway(s) in `smsgateway.php` file that will use.

```php
return [
    /*
    |--------------------------------------------------------------------------
    | hisms App Credentials
    |--------------------------------------------------------------------------
    |
    |
    */
    'hisms' => [
        'username' => env('SMS_HISMS_USERNAME',''),
        'password' => env('SMS_HISMS_PASSWORD',''),
        'sender' => env('SMS_HISMS_SENDER','')
    ],
    /*
    |--------------------------------------------------------------------------
    | netpowers App Credentials
    |--------------------------------------------------------------------------
    |
    |
    */
    'netpowers' => [
        'username' => env('SMS_NETPOWERS_USERNAME',''),
        'password' => env('SMS_NETPOWERS_PASSWORD',''),
        'sender' => env('SMS_NETPOWERS_SENDER','')
    ],
    /*
    |--------------------------------------------------------------------------
    | smsgateway App Credentials
    |--------------------------------------------------------------------------
    |
    |
    */
    'smsgateway' => [
        'username' => env('SMS_SMSGATEWAY_USERNAME',''),
        'password' => env('SMS_SMSGATEWAY_PASSWORD',''),
        'sender' => env('SMS_SMSGATEWAY_SENDER','')
    ],
];
```
## Usage

```php
# returns 'gateway config'
$gateway_sms = AppGateway::to(96651111111111)
    // Or NetPowers::to(), Hisms::to()
    // Or Add Multiple Numbers
    ->to([96650000000,96659999999])
    ->addDatetime(['date' => date('Y-m-d'), 'time' => date('H:i')])
    ->addMessage('asd asd asd');

# returns 'response from gateway'
$response = SMSGateway::send($gateway_sms);
```
### Hisms

Please see [Hisms docs](https://www.hisms.ws/uploads/api.pdf) for more details.

```php
# returns 'gateway config'
$gateway_sms = Hisms::changePassword('new_password');
// Or Hisms::forgetPassword();
// Or Hisms::deleteScheduleSMS();
// Or Hisms::getBalance();

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
