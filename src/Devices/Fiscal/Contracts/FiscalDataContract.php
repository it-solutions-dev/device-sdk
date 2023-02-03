<?php

namespace Itsolutions\DeviceSdk\Devices\Contracts;

use Illuminate\Contracts\Support\Arrayable;

interface FiscalDataContract extends Arrayable
{
    public static function fill(array $data): self;
}
