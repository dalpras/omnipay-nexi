<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi;

use Omnipay\Common\AbstractGateway;
use Omnipay\OmnipayNexi\Message\Request\PurchaseRequest;
use Omnipay\OmnipayNexi\Message\Request\CompletePurchaseRequest;

/**
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = array()) (Optional method)
 *         Receive and handle an instant payment notification (IPN)
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())               (Optional method)
 *         Authorize an amount on the customers card
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())       (Optional method)
 *         Handle return from off-site gateways after authorization
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())                 (Optional method)
 *         Capture an amount you have previously authorized
 * @method \Omnipay\Common\Message\RequestInterface purchase(array $options = array())                (Optional method)
 *         Authorize and immediately capture an amount on the customers card
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())        (Optional method)
 *         Handle return from off-site gateways after purchase
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())                  (Optional method)
 *         Refund an already processed transaction
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])             (Optional method)
 *         Fetches transaction information
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())                    (Optional method)
 *         Generally can only be called up to 24 hours after submitting a transaction
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())              (Optional method)
 *         The returned response object includes a cardReference, which can be used for future transactions
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())              (Optional method)
 *         Update a stored card
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())              (Optional method)
 *         Delete a stored card
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Nexi';
    }

    public function getDefaultParameters()
    {
        return [
            'testMode' => false
        ];
    }

    public function getApiKey(): string
    {
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

    public function getReturnUrl(): string
    {
        return $this->getParameter('returnUrl');
    }

    public function setReturnUrl(string $value)
    {
        return $this->setParameter('returnUrl', $value);
    }

    public function getNotificationUrl(): string
    {
        return $this->getParameter('notificationUrl');
    }

    public function setNotificationUrl(string $value)
    {
        return $this->setParameter('notificationUrl', $value);
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters + ['apiKey' => $this->getApiKey()]);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters + ['apiKey' => $this->getApiKey()]);
    }
}