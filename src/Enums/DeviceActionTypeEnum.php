<?php

namespace Its\DeviceSdk\Enums;

use Its\DeviceSdk\Enums\Traits\ToArray;

enum DeviceActionTypeEnum: string
{
    use ToArray;

    case PrintTicket = 'print_ticket';
    case PrintVoucher = 'print_voucher';
    case PrintReceipt = 'print_receipt';

    case FiscalAddCash = 'fiscal_add_cash';
    case FiscalRemoveCash = 'fiscal_remove_cash';
    case FiscalOpenDrawer = 'fiscal_open_drawer';
    case FiscalOrder = 'fiscal_order';
    case FiscalReturn = 'fiscal_return';
    case FiscalReportX = 'fiscal_report_x';
    case FiscalReportZ = 'fiscal_report_z';
    case FiscalCancel = 'fiscal_cancel';
    case FiscalReprintReceipt = 'fiscal_reprint_receipt';

    case ScannerScan = 'scanner_scan';
}
