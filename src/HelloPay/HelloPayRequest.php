<?php

namespace HelloPay;

/**
 * Class HelloPayRequest
 *
 * @package HelloPay
 */
abstract class HelloPayRequest
{
    /**
     * @var string
     */
    protected $shopConfig;

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
        if (empty($shopConfig)) {
            throw new HelloPayRequestException('Empty shopConfig provided');
        }

        $this->shopConfig = $shopConfig;
    }

    /**
     * @return array
     */
    abstract public function getData();
}