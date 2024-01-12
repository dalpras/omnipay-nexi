<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Enums;

enum ErrorCode: string {
    case PS0000 = "Generic API error";
    case PS0001 = "Cancel Operation not allowed for PAYPAL APM";
    case PS0002 = "Can cancel the operation only in the same day it's performed";
    case PS0004 = "Error during card-verification";
    case PS0005 = "Invalid installment amount. The sum must be lower or equals to order amount";
    case PS0006 = "Invalid installment date. The date must be in ISO8601 format and should not be on the past";
    case PS0007 = "PaymentSession amount must be lower or equal to order amount";
    case PS0008 = "Invalid requested %s date. The date must be in ISO8601 format";
    case PS0009 = "Invalid requested currency";
    case PS0010 = "Invalid requested %s date. The date must be in ISO8601 format";
    case PS0011 = "Invalid provided time. Its format must be 'HH:mm'. EXAMPLE: 10:22";
    case PS0012 = "Invalid provided time. Dates from/to are incorrect.";
    case PS0013 = "Invalid provided date %s. Dates from/to are incorrect.";
    case PS0017 = "Invalid contractid";
    case PS0018 = "Error occured during retrieve contract by customer";
    case PS0022 = "An already voided operation can't be captured";
    case PS0023 = "An already executed operation can't be captured";
    case PS0024 = "An already refunded operation can't be captured";
    case PS0025 = "The idempotency key is wrong or missing in the request.";
    case PS0026 = "Invalid %s parameter";
    case PS0027 = "Operation already refunded";
    case PS0028 = "Operation already voided";
    case PS0029 = "The refundable amount must be equal or lower than the captured amount";
    case PS0032 = "Generic Paypal Void Error";
    case PS0033 = "Generic Paypal Refund Error";
    case PS0034 = "Generic Paypal Capture Error";
    case PS0035 = "Generic Json Processing Error";
    case PS0036 = "Invalid provided order amount. It must be numeric";
    case PS0040 = "TenantId, MerchantId and TerminalId not found in JWT or Header Parameter";
    case PS0041 = "Embedded javascript is forbidden!";
    case PS0042 = "Error during paybylink validation";
    case PS0043 = "Error occurred during MIT invocation";
    case PS0044 = "Error while the link is being deleted";
    case PS0045 = "PaymentLink cannot be deleted because it has already been used";
    case PS0051 = "Error during payment_method invocation. Terminal not found";
    case PS0052 = "Invalid terminal id. Terminal not found";
}
