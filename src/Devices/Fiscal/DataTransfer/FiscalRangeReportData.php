<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalDataContract;


class FiscalRangeReportData extends FiscalDataContract
{
    /**
     * 
     * @param int $from - z number from
     * @param string $to - z number to 
     * @return void 
     */

    public function __construct(
        public int $from,
        public int $to,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            from: Arr::get($data, 'from'),
            to: Arr::get($data, 'to'),
        );
    }

    public function toArray(): array
    {
        return [
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}
