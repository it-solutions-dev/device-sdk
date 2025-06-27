<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer;

class OrderReceiptVat
{
    public function __construct(
        public string $text,
        public float $totalWithoutVat,
        public float $vatAmount,
        public float $totalWithVat,
    ) {}
}
