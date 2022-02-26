<?php

namespace TahaMohamed\SMSGateway;

use TahaMohamed\SMSGateway\Contracts\Message;

class SMSGateway
{
    public function send(Message $gateway)
    {
        return $gateway->send();
    }
}
