<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum EnvDomain: string {
    case Prod = "https://xpay.nexigroup.com";
    case Test = "https://stg-ta.nexigroup.com";
} 