<?php

namespace TahaMohamed\SMS\Gateways;

use TahaMohamed\SMS\Contracts\BaseSMS;
use TahaMohamed\SMS\Contracts\Imessage;

class SMSGateway extends BaseSMS implements Imessage
{
    const APIURL = 'https://apps.gateway.sa/vendorsms/pushsms.aspx';
    
    public function setCredentials(array $credentials)
    {
        $this->credentials['user'] = $credentials['username'];
        $this->credentials['password'] = $credentials['password'];
        $this->credentials['sid'] = $credentials['sender'];
        return $this;
    }

    private function prepareData()
    {
        return array_merge($this->credentials,['msisdn' => $this->numbers ,'msg' => $this->message,"fl" => 0,"dc" => 8],$this->datetime);
    }

    public function send()
    {
        return $this->client->request(
            'POST',
            self::APIURL,
            [
                'query' => $this->prepareData()
            ],
            $this->headers
        );
    }
}