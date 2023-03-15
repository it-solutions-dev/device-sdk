<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalDataContract;
use Its\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalDiscountData;

class FiscalProductData implements FiscalDataContract
{
    /**
     * 
     * @param string $text 
     * @param float $quantity 
     * @param float $price 
     * @param int $vat 
     * @param null|FiscalDiscountData $discount 
     * @param null|int $option - custom fiscal numerator without VAT
     * @return void 
     */
    public function __construct(
        public string $text,
        public float $quantity,
        public float $price,
        public int $vat,
        public ?FiscalDiscountData $discount = null,
        public ?int $option = null
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            text: Arr::get($data, 'text', ''),
            quantity: Arr::get($data, 'quantity', 0),
            price: Arr::get($data, 'price', 0),
            vat: Arr::get($data, 'vat', 0),
            discount: Arr::get($data, 'discount') ? FiscalDiscountData::fill(Arr::get($data, 'discount')) : null,
            option: Arr::get($data, 'option'),
        );
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'vat' => $this->vat,
            'discount' => $this->discount?->toArray(),
            'option' => $this->option,
        ];
    }
}
