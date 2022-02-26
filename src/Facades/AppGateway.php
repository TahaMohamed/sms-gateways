<?php

namespace TahaMohamed\SMSGateway\Facades;

use Illuminate\Support\Facades\Facade;

class AppGateway extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'appgateway';
    }
}
