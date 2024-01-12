<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum OperationResult: string {

    case AUTHORIZED        = "AUTHORIZED";
    case EXECUTED          = "EXECUTED";
    case DECLINED          = "DECLINED";
    case DENIED_BY_RISK    = "DENIED_BY_RISK";
    case THREEDS_VALIDATED = "THREEDS_VALIDATED";
    case THREEDS_FAILED    = "THREEDS_FAILED";
    case PENDING           = "PENDING";
    case CANCELED          = "CANCELED";
    case VOIDED            = "VOIDED";
    case REFUNDED          = "REFUNDED";
    case FAILED            = "FAILED";

    public function toString()
    {
        return match($this) {
            self::AUTHORIZED        => "Pagamento autorizzato",
            self::EXECUTED          => "Pagamento confermato, verifica effettuata con successo",
            self::DECLINED          => "Rifiutato dall'emittente durante la fase di autorizzazione",
            self::DENIED_BY_RISK    => "Negativo esito dell'analisi di rischio della transazione",
            self::THREEDS_VALIDATED => "Autenticazione 3DS OK oppure 3DS saltata (pagamento non sicuro)",
            self::THREEDS_FAILED    => "Cancellazione oppure autenticazione fallita durante il 3DS",
            self::PENDING           => "Pagamento in corso. Sono previste notifiche",
            self::CANCELED          => "Cancellato dal titolare carta",
            self::VOIDED            => "Storno online dell'intero importo autorizzato",
            self::REFUNDED          => "Importo intero o parziale rimborsato",
            self::FAILED            => "Pagamento fallito per ragioni tecniche"
        };
    }

}