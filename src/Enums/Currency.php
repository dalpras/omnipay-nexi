<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum Currency: string {
    case Eur = "EUR";
    case Bgn = "BGN";
    case Hrk = "HRK";
    case Dkk = "DKK";
    case Gbp = "GBP";
    case Nok = "NOK";
    case Pln = "PLN";
    case Czk = "CZK";
    case Ron = "RON";
    case Sek = "SEK";
    case Chf = "CHF";
    case Huf = "HUF";

    public function toString() 
    {
        return match($this) {
            self::Eur => "Euro",
            self::Bgn => "Lev bulgaro",
            self::Hrk => "Kuna croata",
            self::Dkk => "Corona danese",
            self::Gbp => "Sterlina",
            self::Nok => "Corona norvegese",
            self::Pln => "Zloty polacco",
            self::Czk => "Corona ceca",
            self::Ron => "Leu rumeno",
            self::Sek => "Corona svedese",
            self::Chf => "Franco svizzero",
            self::Huf => "Fiorino ungherese",
        };
    }

    public function multiplier(): int
    {
        return 100;
    }
} 