<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Contracts\FiscalReturnContract;
use Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalPaymentData;
use Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalProductData;

class FiscalReturnData implements FiscalReturnContract
{
    public function __construct(
        public FiscalPaymentData $cash,
        public FiscalPaymentData $card,
        public FiscalPaymentData $coupon,
        public float $total,
        public array $products
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            cash: FiscalPaymentData::fill(Arr::get($data, 'cash', [])),
            card: FiscalPaymentData::fill(Arr::get($data, 'card', [])),
            coupon: FiscalPaymentData::fill(Arr::get($data, 'coupon', [])),
            total: Arr::get($data, 'total', 0),
            products: array_map(fn ($product) => FiscalProductData::fill($product), Arr::get($data, 'products', [])),
        );
    }

    public function toArray(): array
    {
        return [
            'cash' => $this->cash->toArray(),
            'card' => $this->card->toArray(),
            'coupon' => $this->coupon->toArray(),
            'total' => $this->total,
            'products' => array_map(fn ($product) => $product->toArray(), $this->products),
        ];
    }
}
