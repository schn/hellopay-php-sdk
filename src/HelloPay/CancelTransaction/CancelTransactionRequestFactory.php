<?php

namespace HelloPay\CancelTransaction;

/**
 * Class CancelTransactionRequestFactory
 *
 * @package HelloPay\CancelTransaction
 */
class CancelTransactionRequestFactory
{
    /**
     * @param string $transactionId
     * @param string $shopConfig
     * @return CancelTransactionRequest
     */
    public function create($transactionId, $shopConfig)
    {
        $request = new CancelTransactionRequest();
        $request->setPurchaseId($transactionId);
        $request->setShopConfig($shopConfig);

        return $request;
    }
}