<?php

namespace TahaMohamed\SMS\Contracts;

class BaseSMS
{
    protected $client;
    protected $headers;
    protected $data;

    protected $numbers;
    protected $message;
    protected $credentials;
    protected $datetime=[];
    public static $instance;

    public function __construct(array $credentials=[]) 
    {
        if ($credentials) {
            $this->setCredentials($credentials);          
        }
        $this->client = new \GuzzleHttp\Client();
        $this->headers = ['headers' => [
            'Accept' => 'application/json',
           'Content-Type' => 'application/json'
        ]];
        $this->addDatetime();
    }

    public static function create(array $credentials = [])
    {
        if (self::$instance === null) {
            self::$instance = new static($credentials);
        }
        return self::$instance;
    }

    public function setCredentials(array $credentials)
    {
        $this->credentials = $credentials; 
        return $this;
    }

    public function addNumber($number)
    {
        $this->numbers[] = $number;
        return $this;
    }

    public function addNumbers(array $numbers)
    {
        foreach ($numbers as $number) {
            $this->addNumber($number);
        }
        return $this;
    }

    public function to($numbers)
    {
        $this->numbers[] = is_array($numbers) ? $numbers : func_get_args();
        return $this;
    }

    public function addMessage($message = 'default message')
    {
        $this->message = $message;
        return $this;
    }

    public function addDatetime($datetime = [])
    {
        $this->datetime = $datetime;
        return $this;
    }

}