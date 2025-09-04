<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer;

use Spatie\LaravelData\Data;

class OrderReceiptVat extends Data
{
    public function __construct(
        public string $text,
        public float $totalWithoutVat,
        public float $vatAmount,
        public float $totalWithVat,
    ) {}
}
