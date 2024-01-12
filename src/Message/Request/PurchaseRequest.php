<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Message\Request;

use JsonException;
use Laminas\Json\Json;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\OmnipayNexi\Enums\UrlPayment;
use Omnipay\OmnipayNexi\Message\Response\PurchaseResponse;
use Throwable;

class PurchaseRequest extends AbstractRequest
{
    /**
     * Validation is built at Request creation.
     * Some data could be provided only by the gateway further,
     * when data is ready to be sent.
     */
    public function getData()
    {
        if ($this->getTestMode() === false) {
            $this->validate('apiKey');
        }
        $this->validate('correlationId', 'captureType', 'orderId', 'amount', 'language', 'currency', 'description', 'cancelUrl', 'resultUrl', 'notificationUrl');

        $data = [
            // 	Oggetto contenente il dettaglio dell'ordine.
            "order" => [
                "orderId"     => $this->getOrderId(),
                "amount"      => $this->getAmount(),
                "currency"    => $this->getCurrency(),
                "description" => $this->getDescription()
            ],
            // 	Oggetto contenente il dettaglio del pagamento
            "paymentSession" => [
                "actionType"      => $this->getActionType()->value,
                "amount"          => $this->getAmount(),
                "language"        => $this->getLanguage()->value,
                "recurrence"      => ["action" => "NO_RECURRING"],
                "captureType"     => $this->getCaptureType()?->value,
                "exemptions"      => "NO_PREFERENCE",
                "resultUrl"       => $this->getReturnUrl(),
                "cancelUrl"       => $this->getCancelUrl(),
                "notificationUrl" => $this->getNotificationUrl()
            ]
        ];
        return $data;
    }

    public function getTransactionReference()
    {
        return $this->httpRequest->query->get('paymentid');
    }

    public function sendData($data)
    {
        try {
            $method = UrlPayment::OrdersHpp->method();
            $endPoint = $this->getEndPoint();
            $headers = [
                'Content-Type'   => 'application/json',
                'X-Api-Key'      => $this->getApiKey(),
                'Correlation-Id' => $this->getCorrelationId()
            ];

            // forcing the Laminas encoder, json_encode not working because always convert integer to float 
            // in some cases add decimals causing gateway to fail ( ie: json_encode(['value' => 52743]) )
            Json::$useBuiltinEncoderDecoder = true;
            $body = Json::encode($data, false, ['enableJsonExprFinder' => false]);
            $response = $this->httpClient->request($method, $endPoint, $headers, $body);
            $content = $response->getBody()->getContents();

            try {
                $json = Json::decode($content, Json::TYPE_ARRAY);
            } catch (JsonException $th) {
                throw new InvalidResponseException('Invalid Json content from Gateway. "' . $content . '"', 0, $th);
            }
            return $this->createResponse($json);
        } catch (Throwable $th) {
            throw new InvalidResponseException('Error communicating with payment gateway', 0, $th);
        }
    }

    public function getEndPoint(): string
    {
        return $this->formatEndpoint(UrlPayment::OrdersHpp->value);
    }

    public function createResponse($data)
    {
        return new PurchaseResponse($this, $data);
    }
}
