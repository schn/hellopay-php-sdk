<?php

namespace HelloPay\CancelTransaction;
use HelloPay\ApiEndPointUrl\ApiEndPointUrlFactory;
use HelloPay\Config\HelloPayConfigManager;
use HelloPay\HelloPayResponse;

/**
 * Class CancelTransactionManager
 *
 * @package HelloPay\CancelTransaction
 */
class CancelTransactionManager
{
    /**
     * @var HelloPayConfigManager
     */
    private $helloPayConfigManager;

    /**
     * @var CancelTransactionRequestFactory
     */
    private $cancelTransactionRequestFactory;

    /**
     * @var CancelTransactionRequestValidator
     */
    private $cancelTransactionRequestValidator;

    /**
     * CancelTransactionManager constructor.
     */
    public function __construct(HelloPayConfigManager $helloPayConfigManager)
    {
        $this->helloPayConfigManager = $helloPayConfigManager;
        $this->cancelTransactionRequestFactory = new CancelTransactionRequestFactory();
        $this->cancelTransactionRequestValidator = new CancelTransactionRequestValidator();
        $this->cancelTransactionHttpClient = new CancelTransactionHttpClient(new ApiEndPointUrlFactory($this->helloPayConfigManager));
        $this->cancelTransactionResponseValidator = new CancelTransactionResponseValidator();
    }

    /**
     * @param string $transactionId
     *
     * @return HelloPayResponse
     */
    public function cancelTransaction($transactionId)
    {
        $cancelTransactionRequest = $this->cancelTransactionRequestFactory
            ->create($transactionId, $this->helloPayConfigManager->getConfig()->getShopConfig());

        if (!$this->cancelTransactionRequestValidator->isValidRequestData($cancelTransactionRequest)) {
            throw new CancelTransactionManagerException('Invalid request provided');
        }

        $cancelTransactionResponse = $this->cancelTransactionHttpClient->send($cancelTransactionRequest);
        if (!$this->cancelTransactionResponseValidator->isValid($cancelTransactionResponse)) {
            throw new CancelTransactionManagerException('Server responded with invalid response');
        }

        return $cancelTransactionResponse;
    }
}