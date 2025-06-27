<?php

namespace Its\DeviceSdk\Devices\Printer\DataTransfer\Collections;

use Illuminate\Support\Collection;

/**
 * @template TKey of array-key
 * @template TData of \Its\DeviceSdk\Devices\Printer\DataTransfer\OrderReceiptItem
 *
 * @extends \Illuminate\Support\Collection<TKey, TData>
 */
class OrderReceiptItemCollection extends Collection {}
