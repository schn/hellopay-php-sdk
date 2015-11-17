<?php

namespace HelloPay\ApiEndPointUrl;

/**
 * Class HelloPayApiEndPointUrlMapper
 *
 * @package HelloPay\ApiEndPointUrl
 */
class ApiEndPointUrlMap
{
    /**
     * @const string the name of api endpoint of purchase create
     */
    const API_ENDPOINT_PURCHASE_CREATE = 'purchaseCreate';

    /**
     * @const string the name of api endpoint of getting transaction events
     */
    const API_ENDPOINT_TRANSACTION_EVENTS = 'transactionEvents';

    /**
     * @const string the name of api endpoint of cancelling transaction
     */
    const API_ENDPOINT_CANCEL = 'cancel';

    /**
     * @const string the name of api endpoint of refunding amount
     */
    const API_ENDPOINT_REFUND = 'refund';
    /**
     * @var array api endpoints mapping
     */
    private $apiEndPoints = [
        self::API_ENDPOINT_PURCHASE_CREATE    => '/merchant/create',
        self::API_ENDPOINT_TRANSACTION_EVENTS => '/merchant/transaction-events',
        self::API_ENDPOINT_CANCEL             => '/merchant/cancel',
        self::API_ENDPOINT_REFUND             => '/merchant/refund'
    ];

    /**
     * @param string $key
     * @return string
     */
    public function get($key)
    {
        if (!is_string($key)) {
            throw new ApiEndPointUrlMapException('Api end point key should be string');
        }

        if (!$this->has($key)) {
            throw new ApiEndPointUrlMapException('Api end point key: ' . $key . ' doesnt exists');
        }

        return $this->apiEndPoints[$key];
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->apiEndPoints[$key]);
    }
}