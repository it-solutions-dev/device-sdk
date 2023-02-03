<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Contracts\FiscalDataContract;

class FiscalPaymentData implements FiscalDataContract
{
    public function __construct(
        public string $text,
        public float $amount,
        public int $option
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            text: Arr::get($data, 'text', ''),
            amount: Arr::get($data, 'amount', 0),
            option: Arr::get($data, 'option', 0),
        );
    }

    public function values(): array
    {
        return [
            $this->text,
            $this->amount,
            $this->option,
        ];
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'amount' => $this->amount,
            'option' => $this->option,
        ];
    }
}
