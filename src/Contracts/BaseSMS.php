<?php

namespace TahaMohamed\SMSGateway\Contracts;

class BaseSMS
{
    protected $client;
    protected $headers;
    /**
     * The numbers which gateway send to.
     *
     * @var array
     */
    protected $numbers = [];
    /**
     * The message will send to numbers.
     *
     * @var string
     */
    protected $message;
    /**
     * The credentials to send sms.
     *
     * @var array
     */
    protected $credentials;
    protected $datetime = [];
    public static $instance;
    /**
     * Create a new gateway instance and set credentials if pass.
     *
     * @return void
     */
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

    /**
     * Create instance if not exists and set credentials.
     *
     * @param  array
     * @return $this
     */
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

    public function to($numbers)
    {
        $this->numbers = array_merge($this->numbers , is_array($numbers) ? $numbers : func_get_args());
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
