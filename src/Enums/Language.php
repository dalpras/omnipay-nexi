<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum Language: string {
    case it = "ita";
    case en = "eng";
    case es = "spa";
    case fr = "fra";
    case de = "deu";
    case ru = "rus";
    case pt = "por";
    case ja = "jpn";
    case ar = "ara";
    case zh = "zha";

    public function toString() 
    {
        return match($this) {
            self::it => "Italiano",
            self::en => "Inglese",
            self::es => "Spagnolo",
            self::fr => "Francese",
            self::de => "Tedesco",
            self::ru => "Russo",
            self::pt => "Portoghese",
            self::ja => "Giapponese",
            self::ar => "Arabo",
            self::zh => "Zhuang, Chuang",
        };
    }

}
