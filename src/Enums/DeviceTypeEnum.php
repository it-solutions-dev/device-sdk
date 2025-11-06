<?php

namespace Its\DeviceSdk\Enums;

enum DeviceTypeEnum: string
{
    case Pos = 'pos';
    case Kiosk = 'kiosk';
    case Printer = 'printer';
    case Scanner = 'scanner';
    case Fiscal = 'fiscal';
    case Terminal = 'terminal';
}
