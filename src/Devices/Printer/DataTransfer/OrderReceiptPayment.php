<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer;

use Spatie\LaravelData\Data;

class OrderReceiptPayment extends Data
{
    public function __construct(
        public string $text,
        public float $amount,
    ) {}
}
