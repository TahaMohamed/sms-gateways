<?php

use TahaMohamed\SMS\Gateways\Hisms;
use TahaMohamed\SMS\Message;

require_once 'vendor/autoload.php';

$credentials = ['username' => 'taha' , 'password' => 'mohamed', 'sender' => '12345'];
$gateway_sms = Hisms::create($credentials) 
    // Or NewPowers::create($credentials) , SMSGateway::create($credentials)
    // Or set like this 
    // ->setCredentials($credentials)
    ->to(96651111111111)
    // // Or add Multiple 
    ->to([96650000000,96659999999])
    ->addDatetime(['date' => date('Y-m-d'), 'time' => date('H:i')])
    ->addMessage('asd asd asd');
    
$response = Message::send($gateway_sms);

var_dump($response);