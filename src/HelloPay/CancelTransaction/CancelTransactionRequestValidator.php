<?php

namespace HelloPay\CancelTransaction;

/**
 * Class CancelTransactionRequestValidator
 *
 * @package HelloPay\CancelTransaction
 */
class CancelTransactionRequestValidator
{
    /**
     * @param CancelTransactionRequest $cancelTransactionRequest
     *
     * @return bool
     */
    public function isValidRequestData(CancelTransactionRequest $cancelTransactionRequest)
    {
        $cancelTransactionRequestMandatoryKeys = CancelTransactionRequestMandatoryKeys::get();

        foreach ($cancelTransactionRequestMandatoryKeys as $mandatoryKey) {
            if (empty($cancelTransactionRequest->{$mandatoryKey})) {
                return false;
            }
        }

        return true;
    }
}