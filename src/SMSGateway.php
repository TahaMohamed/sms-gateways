<?php

namespace TahaMohamed\SMSGateway;

use TahaMohamed\SMSGateway\Contracts\Message;

class SMSGateway
{
    private $credentials;

    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    public function send(Message $gateway)
    {
        return $gateway->setCredentials($this->credentials)->send();
    }
}
