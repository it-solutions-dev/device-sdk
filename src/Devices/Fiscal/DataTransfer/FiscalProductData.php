<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Fiscal\Contracts\FiscalDataContract;
use Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalDiscountData;

class FiscalProductData implements FiscalDataContract
{
    public function __construct(
        public string $text,
        public int $quantity,
        public float $price,
        public int $option,
        public FiscalDiscountData $discount,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            text: Arr::get($data, 'text', ''),
            quantity: Arr::get($data, 'quantity', 0),
            price: Arr::get($data, 'price', 0),
            option: Arr::get($data, 'option', 0),
            discount: FiscalDiscountData::fill(Arr::get($data, 'discount', [])),
        );
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'option' => $this->option,
            'discount' => $this->discount->toArray(),
        ];
    }
}
