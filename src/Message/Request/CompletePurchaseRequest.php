<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Message\Request;

use Laminas\Json\Json;
use Omnipay\OmnipayNexi\Enums\UrlBackOffice;
use Omnipay\OmnipayNexi\Message\Response\CompletePurchaseResponse;

/**
 * When the Nexi Gateway redirect the user to the result page of the merchant,
 * this request grab the information from the gateway about the client payment.
 */
class CompletePurchaseRequest extends AbstractRequest
{
    /**
     * Get the data for this request.
     */
    public function getData()
    {
        if ($this->getTestMode() === false) {
            $this->validate('apiKey');
        }
        $this->validate('correlationId', 'orderId');
        return [];
    }

    public function getTransactionReference()
    {
        return $this->httpRequest->query->get('paymentid');
    }

    public function getEndPoint(): string
    {
        return $this->formatEndpoint(UrlBackOffice::OrdersById->value, ['orderId' => $this->getOrderId()]);
    }

    public function sendData($data)
    {
        // forcing the Laminas encoder, json_encode not working because always convert integer to float
        // in some cases add decimals causing gateway to fail ( ie: json_encode(['value' => 52743]) )
        Json::$useBuiltinEncoderDecoder = true;
        $body = Json::encode($data, false, ['enableJsonExprFinder' => false]);
        $response = $this->httpClient->request(UrlBackOffice::OrdersById->method(), $this->getEndpoint(), [
            'Content-Type'   => 'application/json',
            'X-Api-Key'      => $this->getApiKey(),
            'Correlation-Id' => $this->getCorrelationId()
        ], $body);
        $content = $response->getBody()->getContents();
        return $this->createResponse(Json::decode($content, Json::TYPE_ARRAY));
    }

    public function createResponse($data)
    {
        return new CompletePurchaseResponse($this, $data);
    }
}
