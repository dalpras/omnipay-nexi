<?php declare(strict_types=1);

namespace Omnipay\OmnipayNexi\Message\Response;

use Omnipay\Common\Message\AbstractResponse as LeagueAbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\OmnipayNexi\Utils\FormatText;

class PurchaseResponse extends LeagueAbstractResponse implements RedirectResponseInterface
{
    public function isRedirect()
    {
        return match(true) {
            isset($this->data['hostedPage']) && isset($this->data['securityToken']) => true,
            default => false
        };
    }

    public function isSuccessful()
    {
        return false;
    }

    public function getRedirectUrl()
    {
        return $this->data['hostedPage'] ?? null;
    }

    public function getTransactionReference()
    {
        return $this->data['securityToken'] ?? null;
    }

    public function getErrors() 
    {
        if (isset($this->data['errors'])) {
            return $this->data['errors'];
        }
        return [];
    }

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        $message = '';
        foreach ($this->getErrors() as $value) {
            $message .= FormatText::format("Codice {code} - {description}", [
                'code'    => $value['code'] ?? 'code unknown', 
                'description' => $value['description'] ?? 'description unknown'
            ]);
        }
        return $message;
    }
}