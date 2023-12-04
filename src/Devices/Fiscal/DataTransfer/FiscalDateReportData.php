<?php

namespace Its\DeviceSdk\Devices\Fiscal\DataTransfer;

use Illuminate\Support\Arr;
use Its\DeviceSdk\Devices\Fiscal\Contracts\FiscalDataContract;


class FiscalDateReportData extends FiscalDataContract
{
    /**
     * Date formatted based on device regional settings
     * LT: YYYY-MM-DD
     * 
     * @param string $dateFrom 
     * @param string $dateTo 
     * @param int $mode - 0 - sum, 1 - detailed
     * @return void 
     */
    public function __construct(
        public string $dateFrom,
        public string $dateTo,
        public int $mode = 0
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            dateFrom: Arr::get($data, 'date_from'),
            dateTo: Arr::get($data, 'date_to'),
            mode: Arr::get($data, 'mode', 0),
        );
    }

    public function toArray(): array
    {
        return [
            'date_from' => $this->dateFrom,
            'date_to' => $this->dateTo,
            'mode' => $this->mode
        ];
    }
}
