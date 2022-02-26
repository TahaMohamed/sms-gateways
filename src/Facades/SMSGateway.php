<?php

namespace TahaMohamed\SMSGateway\Facades;

use Illuminate\Support\Facades\Facade;

class SMSGateway extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'smsgateway';
    }
}
