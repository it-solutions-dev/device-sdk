<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer;

use Spatie\LaravelData\Data;

class OrderReceiptItem extends Data
{
    public function __construct(
        public string $text,
        public float $quantity,
        public float $price,
        public float $vat,
        public float $total,
        public ?string $vatLetter = null,
        public ?float $discount = null,
    ) {}
}
