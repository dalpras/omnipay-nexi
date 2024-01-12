<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum OperationType: string {
    case AUTHORIZATION = "AUTHORIZATION";
    case CAPTURE       = "CAPTURE";
    case VOID          = "VOID";
    case REFUND        = "REFUND";
    case CANCEL        = "CANCEL";

    public function toString()
    {
        return match($this) {
            self::AUTHORIZATION => "qualsiasi autorizzazione con contabilizzazione esplicita",
            self::CAPTURE => "autorizzazione contabilizzazione oppure un pagamento con contabilizzazione implicita",
            self::VOID    => "revoca di un'autorizzazione",
            self::REFUND  => "rimborso di una capture",
            self::CANCEL  => "il rollback di una capture, rimborso"
        };
    }

}