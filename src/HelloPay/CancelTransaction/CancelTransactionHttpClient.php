<?php

namespace HelloPay\CancelTransaction;

use HelloPay\ApiEndPointUrl\ApiEndPointUrlFactory;
use HelloPay\ApiEndPointUrl\ApiEndPointUrlMap;
use HelloPay\HelloPayHttpClient;
use HelloPay\HelloPayRequest;

/**
 * Class CancelTransactionHttpClient
 *
 * @package HelloPay\CancelTransaction
 */
class CancelTransactionHttpClient extends HelloPayHttpClient
{
    /**
     * @var ApiEndPointUrlFactory
     */
    private $apiEndPointUrlFactory;

    /**
     * @param ApiEndPointUrlFactory $apiEndPointUrlFactory
     */
    public function __construct(ApiEndPointUrlFactory $apiEndPointUrlFactory)
    {
        $this->endPointUrlKey = ApiEndPointUrlMap::API_ENDPOINT_CANCEL;
        $this->apiEndPointUrlFactory = $apiEndPointUrlFactory;

        // todo: here goes basic init of low level http client. we need HttpClientFactory for common init
        $this->httpClient = new SomeLowLevelHttpClient();
        $this->httpClient->setUrl($this->apiEndPointUrlFactory->create($this->endPointUrlKey));
        $this->httpClient->setMethod('POST');
    }

    /**
     * @param CancelTransactionRequest $cancelTransactionRequest
     *
     * @return CancelTransactionResponse
     */
    public function send(HelloPayRequest $helloPayRequest)
    {
        $rawResponse = $this->httpClient->send($helloPayRequest->getData());
        return new CancelTransactionResponse($rawResponse);
    }
}