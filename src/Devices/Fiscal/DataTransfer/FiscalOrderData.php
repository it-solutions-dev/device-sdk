<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Fiscal\Contracts\FiscalOrderContract;
use Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalDiscountData;
use Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalPaymentData;
use Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer\FiscalProductData;

class FiscalOrderData implements FiscalOrderContract
{
    public function __construct(
        public FiscalPaymentData $cash,
        public FiscalPaymentData $card,
        public FiscalPaymentData $coupon,
        public FiscalPaymentData $points,
        public float $total,
        public FiscalDiscountData $orderDiscount,
        public array $products,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            cash: FiscalPaymentData::fill(Arr::get($data, 'cash', [])),
            card: FiscalPaymentData::fill(Arr::get($data, 'card', [])),
            coupon: FiscalPaymentData::fill(Arr::get($data, 'coupon', [])),
            points: FiscalPaymentData::fill(Arr::get($data, 'points', [])),
            total: Arr::get($data, 'total', 0),
            orderDiscount: FiscalDiscountData::fill(Arr::get($data, 'orderDiscount', [])),
            products: array_map(fn ($product) => FiscalProductData::fill($product), Arr::get($data, 'products', [])),
        );
    }

    public function toArray(): array
    {
        return [
            'cash' => $this->cash->toArray(),
            'card' => $this->card->toArray(),
            'coupon' => $this->coupon->toArray(),
            'points' => $this->points->toArray(),
            'total' => $this->total,
            'orderDiscount' => $this->orderDiscount->toArray(),
            'products' => array_map(fn ($product) => $product->toArray(), $this->products),
        ];
    }
}
