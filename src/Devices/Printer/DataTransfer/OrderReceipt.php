<?php

namespace Devices\Printer\DataTransfer;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class OrderReceipt extends Data
{
    public function __construct(
        public string $device,
        public string $datatime, // Y-m-d H:i:s
        public string $timezone = 'UTC',
        public string $receiptNumber,
        #[DataCollectionOf(PrintLine::class)]
        public array $companyDetails,
        #[DataCollectionOf(OrderReceiptItem::class)]
        public array $items,
        public float $total = 0,
        #[DataCollectionOf(OrderReceiptVat::class)]
        public array $vats,
        public ?float $totalAfterRounding = 0,
        public ?bool $rounddbl = false,
        public ?OrderReceiptPayment $cash = null,
        public ?OrderReceiptPayment $card = null,
        public ?OrderReceiptPayment $coupon = null,
        public ?OrderReceiptPayment $transaction = null,
        // public ?array $custom = null,
    ) {}
}
