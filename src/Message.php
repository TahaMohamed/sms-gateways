<?php

namespace TahaMohamed\SMS;
use TahaMohamed\SMS\Contracts\Imessage;

class Message
{
    
    public static function send(Imessage $gateway)
    {
        return $gateway->send();
    }
}