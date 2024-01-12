<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Utils;

class FormatText
{
    static function format(string $text, array $attribs = []): string
    {
        return array_reduce(array_keys($attribs), function ($carry, $key) use ($attribs) {
            return str_replace("{{$key}}", $attribs[$key], $carry);
        }, $text);
    }
}
