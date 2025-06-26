<?php

namespace Devices\Printer\DataTransfer;

use Spatie\LaravelData\Data;

class PrintLine extends Data
{
    public function __construct(
        public string $text,
    ) {}
}
