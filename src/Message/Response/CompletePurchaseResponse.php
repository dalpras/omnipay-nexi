<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Message\Response;

use Omnipay\OmnipayNexi\Enums\OperationResult;
use Omnipay\OmnipayNexi\Enums\OperationType;
use Omnipay\Common\Message\AbstractResponse as LeagueAbstractResponse;

class CompletePurchaseResponse extends LeagueAbstractResponse
{
    public function isRedirect()
    {
        return false;
    }

    public function isSuccessful()
    {
        return $this->getOperationResult() === OperationResult::EXECUTED; // && $this->getOperationType() === OperationType::CAPTURE;
    }

    public function getTransactionReference()
    {
        return $this->data['operations'][0]['operationId'] ?? 'unknown';
    }

    public function getOperationType(): ?OperationType
    {
        return OperationType::tryFrom($this->data['operations'][0]['operationType'] ?? 'unknown');
    }

    public function getOperationResult(): ?OperationResult
    {
        return OperationResult::tryFrom($this->data['operations'][0]['operationResult'] ?? 'unknown');
    }

    public function getPaymentCircuit()
    {
        return $this->data['operations'][0]['paymentCircuit'] ?? null;
    }

    public function getOrderId()
    {
        return $this->data['orderStatus']['order']['orderId'] ?? '';
    }

    public function getAmount()
    {
        return $this->data['orderStatus']['order']['amount'] ?? '';
    }

    public function getCurrency()
    {
        return $this->data['orderStatus']['order']['currency'] ?? '';
    }

    public function getCapturedAmount() 
    {
        return $this->data['orderStatus']['capturedAmount'] ?? '';
    }

    public function getAuthorizedAmount() 
    {
        return $this->data['orderStatus']['authorizedAmount'] ?? '';
    }
}