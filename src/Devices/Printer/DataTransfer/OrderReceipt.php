<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class OrderReceipt extends Data
{
    public function __construct(
        public string $device,
        public string $receiptNumber,
        public string $datatime, // Y-m-d H:i:s
        public string $timezone,
        #[DataCollectionOf(PrintLine::class)]
        public array $companyDetails,
        #[DataCollectionOf(OrderReceiptItem::class)]
        public array $items,
        #[DataCollectionOf(OrderReceiptVat::class)]
        public array $vats,
        public float $total = 0,
        public ?float $receiptDiscount = 0,
        public ?float $totalDiscount = 0, // receipt items discounts + receiptDiscount
        public ?float $totalBeforeRounding = 0,
        public ?float $totalRounded = 0,
        public ?bool $rounddbl = false,
        public ?OrderReceiptPayment $cash = null,
        public ?OrderReceiptPayment $card = null,
        public ?OrderReceiptPayment $coupon = null,
        public ?OrderReceiptPayment $transaction = null,
    ) {}
}
