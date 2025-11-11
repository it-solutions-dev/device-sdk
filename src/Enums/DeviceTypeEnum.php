<?php

namespace Its\DeviceSdk\Enums;

enum DeviceTypeEnum: string
{
    case Pos = 'pos';
    case Kiosk = 'self-service-kiosk';
    case Printer = 'printer';
    case Scanner = 'scanner';
    case Fiscal = 'fiscal';
    case Terminal = 'terminal';
}
