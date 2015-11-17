<?php

namespace HelloPay\CancelTransaction;

use HelloPay\HelloPayRequest;

/**
 * Class CancelTransactionRequest
 *
 * @package HelloPay\CancelTransaction
 */
class CancelTransactionRequest extends HelloPayRequest
{
    /**
     * @var string
     */
    private $purchaseId;

    /**
     * @return string
     */
    public function getPurchaseId()
    {
        return $this->purchaseId;
    }

    /**
     * @param string $purchaseId
     */
    public function setPurchaseId($purchaseId)
    {
        $this->purchaseId = $purchaseId;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'purchaseId' => $this->getPurchaseId(),
            'shopConfig' => $this->getShopConfig()
        ];
    }
}