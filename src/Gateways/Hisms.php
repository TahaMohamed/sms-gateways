<?php

namespace TahaMohamed\SMSGateway\Gateways;

use TahaMohamed\SMSGateway\Contracts\BaseSMS;
use TahaMohamed\SMSGateway\Contracts\Message;

class Hisms extends BaseSMS implements Message
{
    const APIURL = 'http://hisms.ws/api.php';
    const SEND_SMS = ['send_sms' => 1];
    const CHANGE_PASSWORD = ['change_pass' => 1];
    const FORGET_PASSWORD = ['forgot_password' => 1];
    const GET_BALANCE = ['get_balance' => 1];
    const DELETE_SCHEDULE_SMS = ['delete_schedule_sms' => 1];
    private $method = self::SEND_SMS;
    private $new_password;

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

    public function changePassword($new_password)
    {
        $this->new_password = $new_password;
        $this->method = self::CHANGE_PASSWORD;
        return $this;
    }

    public function forgetPassword()
    {
        $this->method = self::FORGET_PASSWORD;
        return $this;
    }

    public function getBalance()
    {
        $this->method = self::GET_BALANCE;
        return $this;
    }

    public function deleteScheduleSMS()
    {
        $this->method = self::DELETE_SCHEDULE_SMS;
        return $this;
    }

    private function prepareData()
    {
        switch ($this->method) {
            case self::CHANGE_PASSWORD:
                    return array_merge($this->credentials, ['new_password' => $this->new_password],self::CHANGE_PASSWORD);
            case self::FORGET_PASSWORD:
                    return array_merge($this->credentials, self::FORGET_PASSWORD);
            case self::GET_BALANCE:
                    return array_merge($this->credentials, self::GET_BALANCE);
            case self::DELETE_SCHEDULE_SMS:
                    return array_merge($this->credentials, self::DELETE_SCHEDULE_SMS);
            default:
                return array_merge($this->credentials, self::SEND_SMS, ['numbers' => $this->numbers ,'message' => $this->message],$this->datetime);
        }
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
