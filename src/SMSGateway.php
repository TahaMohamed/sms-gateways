<?php

namespace TahaMohamed\SMSGateway;

use TahaMohamed\SMSGateway\Contracts\Message;

class SMSGateway
{
    public static function send(Message $gateway)
    {
        return $gateway->send();
    }
}
