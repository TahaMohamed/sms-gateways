<?php

namespace TahaMohamed\SMS\Gateways;

use TahaMohamed\SMS\Contracts\BaseSMS;
use TahaMohamed\SMS\Contracts\Imessage;

class Hisms extends BaseSMS implements Imessage
{
    const APIURL = 'http://hisms.ws/api.php';
    
    public function setCredentials(array $credentials)
    {
        $this->credentials['username'] = $credentials['username'];
        $this->credentials['password'] = $credentials['password'];
        $this->credentials['sender'] = $credentials['sender'];
        return $this;
    }
    
    public function addDatetime($datetime = [])
    {
        if (!$datetime) {
            $this->datetime = ['date' => date('Y-m-d'), 'time' => date('H:i')];
        }else{
            $this->datetime = $datetime;
        }
        return $this;
    }

    private function prepareData()
    {
        return array_merge($this->credentials,['send_sms' => '1', 'numbers' => $this->numbers ,'message' => $this->message],$this->datetime);
    }

    public function send()
    {
        $response = $this->client->request(
            'GET',
            self::APIURL,
            [
                'query' => $this->prepareData()
            ],
            $this->headers
        );
        return $response->getBody()->getContents();
    }
}