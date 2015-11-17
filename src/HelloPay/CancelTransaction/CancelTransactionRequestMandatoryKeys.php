<?php

namespace HelloPay\CancelTransaction;

/**
 * Class CancelTransactionRequestMandatoryKeys
 *
 * @package HelloPay\CancelTransaction
 */
class CancelTransactionRequestMandatoryKeys
{
    /**
     * @return array
     */
    public static function get()
    {
        return [
            'purchaseId',
            'shopConfig'
        ];
    }
}