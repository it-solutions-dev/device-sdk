<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer;

use Spatie\LaravelData\Data;

class OrderReceiptItemDiscount extends Data
{
    public function __construct(
        public float $amount,
        public ?string $text = null,
    ) {}
}
