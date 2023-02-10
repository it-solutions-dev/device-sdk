<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalDiscountContract;

class FiscalDiscountData implements FiscalDiscountContract
{
    public function __construct(
        public string $text,
        public float $amount,
        public array $extra
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            text: Arr::get($data, 'text', ''),
            amount: Arr::get($data, 'amount', 0),
            extra: Arr::get($data, 'extra', []),
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
