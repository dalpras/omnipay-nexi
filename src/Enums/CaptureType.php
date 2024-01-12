<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum CaptureType: string {
    case Implicit = "IMPLICIT";
    case Explicit = "EXPLICIT";

    public function testApiKey(): string
    {
        return match($this) {
            self::Implicit => "5d952446-9004-4023-9eae-a527a152846b",
            self::Explicit => "2d708950-50a1-434e-9a93-5d3ae2f1dd9f",
        };
    }
} 