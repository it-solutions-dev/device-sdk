<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalDataContract;

class FiscalPaymentData implements FiscalDataContract
{
    /**
     * 
     * @param string $text 
     * @param float $amount 
     * @param null|int $option  - not implemented in SA97 (should allow set extra fiscal numerator)
     * @return void 
     */

    public function __construct(
        public string $text,
        public float $amount,
        public ?int $option = null,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            text: Arr::get($data, 'text', ''),
            amount: Arr::get($data, 'amount', 0),
            option: Arr::get($data, 'option'),
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
