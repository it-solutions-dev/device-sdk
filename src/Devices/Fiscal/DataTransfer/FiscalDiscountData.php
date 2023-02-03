<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Contracts\FiscalDataContract;

class FiscalDiscountData implements FiscalDataContract
{
    public function __construct(
        public string $text,
        public float $amount,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            text: Arr::get($data, 'text', ''),
            amount: Arr::get($data, 'amount', 0),
        );
    }

    public function values(): array
    {
        return [
            $this->text,
            $this->amount,
        ];
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'amount' => $this->amount,
        ];
    }
}
