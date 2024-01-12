<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum Gateway: string {
    case Cards       = "CARDS";
    case PagoInConto = "PAGOINCONTO";
    case GooglePay   = "GOOGLEPAY Pay";
    case ApplePay    = "APPLEPAY Pay";
    case MyBank      = "MYBANK";
    case AliPay      = "ALIPAY";
    case WeChatPay   = "WECHATPAY Pay";
    case GiroPay     = "GIROPAY";
    case IDeal       = "IDEAL";
    case Bancontact  = "BANCONTACT";
    case Eps         = "EPS";
    case Przelewy24  = "PRZELEWY24";
    case Multibanco  = "MULTIBANCO";
    case SatisPay    = "SATISPAY";
    case AmazonPay   = "AMAZONPAY";
    case PayPal      = "PAYPAL";
    case PagoPa      = "PAGOPA";

    public function toString()
    {
        return match($this) {
            self::Cards       => "Pagamento carte",
            self::PagoInConto => "Pagamento PagoinConto",
            self::GooglePay   => "Pagamento Google Pay",
            self::ApplePay    => "Pagamento Apple Pay",
            self::MyBank      => "Pagamento MyBank",
            self::AliPay      => "Pagamento Alipay",
            self::WeChatPay   => "Pagamento Wechat Pay",
            self::GiroPay     => "Pagamento Giropay",
            self::IDeal       => "Pagamento iDEAL",
            self::Bancontact  => "Pagamento Bancontact",
            self::Eps         => "Pagamento EPS",
            self::Przelewy24  => "Pagamento Przelewy24",
            self::Multibanco  => "Pagamento Multibanco",
            self::SatisPay    => "Pagamento Satispay",
            self::AmazonPay   => "Pagamento AmazonPay",
            self::PayPal      => "Pagamento PayPal",
            self::PagoPa      => "Pagamento PagoPa"
        };
    }
}