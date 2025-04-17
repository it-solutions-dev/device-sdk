<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalReturnContract;
use Its\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalPaymentData;
use Its\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalProductData;

class FiscalReturnData implements FiscalReturnContract
{
    public function __construct(
        public float $total,
        public array $products,
        public ?FiscalPaymentData $cash = null,
        public ?FiscalPaymentData $card = null,
        public ?FiscalPaymentData $coupon = null,
        public ?FiscalPaymentData $transaction = null,
        public ?array $custom = null,
        public ?float $totalAfterRouding = null,
    ) {}

    public static function fill(array $data): self
    {
        return new static(

            total: Arr::get($data, 'total', 0),
            products: array_map(fn($product) => FiscalProductData::fill($product), Arr::get($data, 'products', [])),
            cash: Arr::get($data, 'cash') ? FiscalPaymentData::fill(Arr::get($data, 'cash')) : null,
            card: Arr::get($data, 'card') ? FiscalPaymentData::fill(Arr::get($data, 'card')) : null,
            coupon: Arr::get($data, 'coupon') ? FiscalPaymentData::fill(Arr::get($data, 'coupon')) : null,
            transaction: Arr::get($data, 'transaction') ? FiscalPaymentData::fill(Arr::get($data, 'transaction')) : null,
            custom: Arr::get($data, 'custom', null),
            totalAfterRouding: Arr::get($data, 'total_after_rouding', null),
        );
    }

    public function toArray(): array
    {
        return [
            'total' => $this->total,
            'products' => array_map(fn($product) => $product->toArray(), $this->products),
            'cash' => $this->cash?->toArray(),
            'card' => $this->card?->toArray(),
            'coupon' => $this->coupon?->toArray(),
            'transaction' => $this->transaction?->toArray(),
            'custom' => $this->custom,
            'total_after_rouding' => $this->totalAfterRouding,
        ];
    }
}
