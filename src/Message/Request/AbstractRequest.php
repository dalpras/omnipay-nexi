<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Message\Request;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;
use Omnipay\OmnipayNexi\Enums\ActionType;
use Omnipay\OmnipayNexi\Enums\CaptureType;
use Omnipay\OmnipayNexi\Enums\EnvDomain;
use Omnipay\OmnipayNexi\Enums\Language;
use Omnipay\OmnipayNexi\Utils\FormatText;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    /**
     * Format endpoint adding base url and replacing attribs like "{name}" with
     * corresponding values.
     */
    protected function formatEndpoint(string $text, array $attribs = []): string
    {
        $base = $this->getTestMode() ? EnvDomain::Test->value : EnvDomain::Prod->value;
        return $base . FormatText::format($text, $attribs);
    }

    public function getApiKey(): ?string
    {
        if ($this->getTestMode()) {
            return $this->getCaptureType()?->testApiKey();
        }
        return $this->getParameter('apiKey');
    }

    public function setApiKey(string $apiKey)
    {
        return $this->setParameter('apiKey', $apiKey);
    }    

    public function getCorrelationId(): string
    {
        return $this->getParameter('correlationId');
    }

    public function setCorrelationId(string $correlationId)
    {
        return $this->setParameter('correlationId', $correlationId);
    }

    public function getOrderId(): string
    {
        return $this->getParameter('orderId');
    }

    public function setOrderId(string $orderId)
    {
        return $this->setParameter('orderId', $orderId);
    }

    public function getActionType(): ActionType
    {
        return $this->getParameter('actionType');
    }

    public function setActionType(ActionType $actionType)
    {
        return $this->setParameter('actionType', $actionType);
    }

    public function getCaptureType(): ?CaptureType
    {
        return $this->getParameter('captureType');
    }

    public function setCaptureType(CaptureType $captureType)
    {
        return $this->setParameter('captureType', $captureType);
    }

    public function getAmount()
    {
        return (float) $this->getParameter('amount');
    }

    public function setAmount($value)
    {
        $value = 100 * (float) sprintf("%0.2F", $value);
        return $this->setParameter('amount', $value);
    }

    public function getLanguage(): Language
    {
        return $this->getParameter('language');
    }

    public function setLanguage(Language $language)
    {
        return $this->setParameter('language', $language);
    }    

    public function getCustomerId()
    {
        return $this->getParameter('customerId');
    }

    public function setCustomerId($customerId)
    {
        return $this->setParameter('customerId', $customerId);
    }

    public function getDescription(): string
    {
        return $this->getParameter('description');
    }

    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }

    public function getReturnUrl()
    {
        return $this->getParameter('resultUrl');
    }

    public function setReturnUrl($returnUrl)
    {
        return $this->setParameter('resultUrl', $returnUrl);
    }

    public function getCancelUrl()
    {
        return $this->getParameter('cancelUrl');
    }

    public function setCancelUrl($cancelUrl)
    {
        return $this->setParameter('cancelUrl', $cancelUrl);
    }

    public function getNotificationUrl()
    {
        return $this->getParameter('notificationUrl');
    }

    public function setNotificationUrl($notificationUrl)
    {
        return $this->setParameter('notificationUrl', $notificationUrl);
    }
}
