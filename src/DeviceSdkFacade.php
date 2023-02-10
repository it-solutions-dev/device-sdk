<?php

namespace Its\DeviceSdk;

use Illuminate\Support\Facades\Facade;

class DeviceSdkFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'device-sdk';
    }
}
