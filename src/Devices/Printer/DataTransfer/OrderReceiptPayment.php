<?php

namespace Devices\Printer\DataTransfer;

class OrderReceiptPayment
{
    public function __construct(
        public string $text,
        public float $amount,
    ) {}
}
