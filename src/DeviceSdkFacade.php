<?php

namespace Itsolutions\DeviceSdk;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Itsolutions\DeviceSdk\Skeleton\SkeletonClass
 */
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
