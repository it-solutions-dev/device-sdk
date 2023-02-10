<?php

namespace Its\DeviceSdk\Enums;

enum DeviceTypeEnum: string
{
    case Printer = 'printer';
    case Scanner = 'scanner';
    case Fiscal = 'fiscal';
    case Terminal = 'terminal';
}
