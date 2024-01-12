<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum ActionType: string {
    case Pay     = "PAY";
    case Verify  = "VERIFY";
    case PreAuth = "PREAUTH";
} 