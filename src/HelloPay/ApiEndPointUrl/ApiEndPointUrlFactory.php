<?php

namespace HelloPay\ApiEndPointUrl;

use HelloPay\Config\HelloPayClientConfigInterface;
use HelloPay\Config\HelloPayConfigManager;

/**
 * Class HelloPayApiEndPointUrlFactory
 *
 * @package HelloPay\ApiEndPointUrl
 */
class ApiEndPointUrlFactory
{
    /**
     * @var HelloPayConfigManager
     */
    private $helloPayConfigManager;

    /**
     * @var ApiEndPointUrlMap
     */
    private $helloPayApiEndPointUrlMap;

    /**
     * HelloPayApiEndPointUrlFactory constructor.
     *
     * @param HelloPayClientConfigInterface $helloPayConfig
     */
    public function __construct(HelloPayConfigManager $helloPayConfigManager)
    {
        $this->helloPayConfigManager = $helloPayConfigManager;
        $this->helloPayApiEndPointUrlMap = new ApiEndPointUrlMap();
    }

    /**
     * @param string $key
     */
    public function create($key)
    {
        if (!$this->helloPayApiEndPointUrlMap->has($key)) {
            throw new ApiEndPointUrlFactoryException('The Api Endpoint URL of ' . $key . ' does not exist.');
        }

        return $this->helloPayConfigManager->getConfig()->getApiUrl() . $this->helloPayApiEndPointUrlMap->get($key);
    }
}