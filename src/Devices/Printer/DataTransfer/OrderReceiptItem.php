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
        public string $vatLetter,
        public ?float $discount = null,
    ) {}
}
