<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Fiscal\Contracts\FiscalCashContract;

class FiscalCashData implements FiscalCashContract
{
    public function __construct(
        public float $amount
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            amount: Arr::get($data, 'amount', 0),
        );
    }

    public function values(): array
    {
        return [
            $this->amount,
        ];
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
        ];
    }
}
