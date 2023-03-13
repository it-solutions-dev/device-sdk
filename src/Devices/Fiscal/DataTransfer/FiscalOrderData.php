<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalOrderContract;
use Its\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalDiscountData;
use Its\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalPaymentData;
use Its\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalProductData;

class FiscalOrderData implements FiscalOrderContract
{
    public function __construct(
        public float $total,
        public FiscalDiscountData $discount,
        public array $products,
        public ?FiscalPaymentData $cash = null,
        public ?FiscalPaymentData $card = null,
        public ?FiscalPaymentData $coupon = null,
        public ?FiscalPaymentData $transaction = null,
        public ?FiscalPaymentData $points = null,
        public ?array $custom = null,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            total: Arr::get($data, 'total', 0),
            discount: FiscalDiscountData::fill(Arr::get($data, 'discount', [])),
            products: array_map(fn ($product) => FiscalProductData::fill($product), Arr::get($data, 'products', [])),
            cash: Arr::get($data, 'cash') ? FiscalPaymentData::fill(Arr::get($data, 'cash')) : null,
            card: Arr::get($data, 'card') ? FiscalPaymentData::fill(Arr::get($data, 'card')) : null,
            coupon: Arr::get($data, 'coupon') ? FiscalPaymentData::fill(Arr::get($data, 'coupon')) : null,
            transaction: Arr::get($data, 'transaction') ? FiscalPaymentData::fill(Arr::get($data, 'transaction')) : null,
            points: Arr::get($data, 'points') ? FiscalPaymentData::fill(Arr::get($data, 'points')) : null,
            custom: Arr::get($data, 'custom', null),
        );
    }

    public function toArray(): array
    {
        return [
            'total' => $this->total,
            'discount' => $this->discount->toArray(),
            'products' => array_map(fn ($product) => $product->toArray(), $this->products),
            'cash' => $this->cash?->toArray(),
            'card' => $this->card?->toArray(),
            'coupon' => $this->coupon?->toArray(),
            'transaction' => $this->transaction?->toArray(),
            'points' => $this->points?->toArray(),
            'custom' => $this->custom,
        ];
    }
}
