<?php

namespace Itsolutions\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Itsolutions\DeviceSdk\Devices\Contracts\FiscalDataContract;

class FiscalReceiptReprint implements FiscalDataContract
{
    public function __construct(
        public string $receiptNumber,
        public string $zReportNumber
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            receiptNumber: Arr::get($data, 'receipt_number', ''),
            zReportNumber: Arr::get($data, 'z_report_number', ''),
        );
    }

    public function values(): array
    {
        return [
            $this->receiptNumber,
            $this->zReportNumber,
        ];
    }

    public function toArray(): array
    {
        return [
            'receipt_number' => $this->receiptNumber,
            'z_report_number' => $this->zReportNumber,
        ];
    }
}
