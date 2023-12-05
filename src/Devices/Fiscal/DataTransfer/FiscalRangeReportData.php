<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalDataContract;


class FiscalRangeReportData implements FiscalDataContract
{
    /**
     * 
     * @param int $from - z number from
     * @param int $to - z number to 
     * @param int $mode - 0 - sum, 1 - detailed
     * @return void 
     */

    public function __construct(
        public int $from,
        public int $to,
        public int $mode = 0
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            from: Arr::get($data, 'from'),
            to: Arr::get($data, 'to'),
            mode: Arr::get($data, 'mode', 0),
        );
    }

    public function toArray(): array
    {
        return [
            'from' => $this->from,
            'to' => $this->to,
            'mode' => $this->mode
        ];
    }
}
