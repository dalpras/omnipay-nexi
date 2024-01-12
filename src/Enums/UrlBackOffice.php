<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum UrlBackOffice: string {
    case Orders                  = "/api/phoenix-0.0/psp/api/v1/orders";
    case OrdersById              = "/api/phoenix-0.0/psp/api/v1/orders/{orderId}";
    case Operations              = "/api/phoenix-0.0/psp/api/v1/operations";
    case OperationsById          = "/api/phoenix-0.0/psp/api/v1/operations/{operationId}";
    case OperationRefunds        = "/api/phoenix-0.0/psp/api/v1/operations/{operationId}/refunds";
    case OperationCaptures       = "/api/phoenix-0.0/psp/api/v1/operations/{operationId}/captures";
    case OperationCancels        = "/api/phoenix-0.0/psp/api/v1/operations/{operationId}/cancels";
    case CustomerById            = "/api/phoenix-0.0/psp/api/v1/contracts/customers/{customerId}";
    case ContractDeactivation    = "/api/phoenix-0.0/psp/api/v1/contracts/{contractId}/deactivation";

    public function method(): string
    {
        return match($this) {
            self::Orders               => "GET",
            self::OrdersById           => "GET",
            self::Operations           => "GET",
            self::OperationsById       => "GET",
            self::OperationRefunds     => "POST",
            self::OperationCaptures    => "POST",
            self::OperationCancels     => "POST",
            self::CustomerById         => "GET",
            self::ContractDeactivation => "POST",
        };
    }
}