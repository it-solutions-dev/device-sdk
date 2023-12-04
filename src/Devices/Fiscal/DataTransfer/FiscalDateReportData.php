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
     * @return void 
     */
    public function __construct(
        public string $dateFrom,
        public string $dateTo,
    ) {
    }

    public static function fill(array $data): self
    {
        return new static(
            dateFrom: Arr::get($data, 'from'),
            dateTo: Arr::get($data, 'to'),
        );
    }

    public function toArray(): array
    {
        return [
            'from' => $this->dateFrom,
            'to' => $this->dateTo
        ];
    }
}
