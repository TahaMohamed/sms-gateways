<?php
 
return [
    'hisms' => [
        'username' => env('SMS_HISMS_USERNAME',''),
        'password' => env('SMS_HISMS_PASSWORD',''),
        'sender' => env('SMS_HISMS_SENDER','')
    ],
    'netpowers' => [
        'username' => env('SMS_NETPOWERS_USERNAME',''),
        'password' => env('SMS_NETPOWERS_PASSWORD',''),
        'sender' => env('SMS_NETPOWERS_SENDER','')
    ],
    'smsgateway' => [
        'username' => env('SMS_SMSGATEWAY_USERNAME',''),
        'password' => env('SMS_SMSGATEWAY_PASSWORD',''),
        'sender' => env('SMS_SMSGATEWAY_SENDER','')
    ],
];
