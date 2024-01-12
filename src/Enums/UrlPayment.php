<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum UrlPayment: string {
    case OrdersHpp                  = "/api/phoenix-0.0/psp/api/v1/orders/hpp";
    case OrdersPaybyLink            = "/api/phoenix-0.0/psp/api/v1/orders/paybylink";
    case PaybylinkLinkIdCancels     = "/api/phoenix-0.0/psp/api/v1/paybylink/{linkId}/cancels";
    case OrdersTwoStepsInit         = "/api/phoenix-0.0/psp/api/v1/orders/2steps/init";
    case OrdersTwoStepsPayment      = "/api/phoenix-0.0/psp/api/v1/orders/2steps/payment";
    case OrdersThreeStepsInit       = "/api/phoenix-0.0/psp/api/v1/orders/3steps/init";
    case OrdersThreeStepsValidation = "/api/phoenix-0.0/psp/api/v1/orders/3steps/validation";
    case OrdersThreeStepsPayment    = "/api/phoenix-0.0/psp/api/v1/orders/3steps/payment";
    case OrdersMit                  = "/api/phoenix-0.0/psp/api/v1/orders/mit";
    case OrdersCardVerification     = "/api/phoenix-0.0/psp/api/v1/orders/card_verification";
    case OrdersMoto                 = "/api/phoenix-0.0/psp/api/v1/orders/moto";

    public function method(): string
    {
        return match($this) {
            self::OrdersHpp                  => "POST",
            self::OrdersPaybyLink            => "POST",
            self::PaybylinkLinkIdCancels     => "POST",
            self::OrdersTwoStepsInit         => "POST",
            self::OrdersTwoStepsPayment      => "POST",
            self::OrdersThreeStepsInit       => "POST",
            self::OrdersThreeStepsValidation => "POST",
            self::OrdersThreeStepsPayment    => "POST",
            self::OrdersMit                  => "POST",
            self::OrdersCardVerification     => "POST",
            self::OrdersMoto                 => "POST",
        };
    }
}