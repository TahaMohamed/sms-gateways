<?php

namespace TahaMohamed\SMSGateway\Gateways;

use TahaMohamed\SMSGateway\Contracts\BaseSMS;
use TahaMohamed\SMSGateway\Contracts\Message;

class SMSGateway extends BaseSMS implements Message
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
        $response = $this->client->request(
            'POST',
            self::APIURL,
            [
                'query' => $this->prepareData()
            ],
            $this->headers
        );

        return $response->getBody()->getContents();
    }
}
