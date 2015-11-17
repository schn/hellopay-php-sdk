<?php

/**
 * Class ClientConfig
 * 
 * some client config class. it should implement HelloPayClientConfigInterface to work with sdk
 */
class ClientConfig implements \HelloPay\Config\HelloPayClientConfigInterface
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $shopConfig;

    /**
     * @var string
     */
    private $sslEnabled;

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return string
     */
    public function getShopConfig()
    {
        return $this->shopConfig;
    }

    /**
     * @param string $shopConfig
     */
    public function setShopConfig($shopConfig)
    {
        $this->shopConfig = $shopConfig;
    }

    /**
     * @return string
     */
    public function getSslEnabled()
    {
        return $this->sslEnabled;
    }

    /**
     * @param string $sslEnabled
     */
    public function setSslEnabled($sslEnabled)
    {
        $this->sslEnabled = $sslEnabled;
    }
}