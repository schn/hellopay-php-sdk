<?php

namespace HelloPay\Config;

/**
 * Interface HelloPayClientConfigInterface
 *
 * Every client Config must implement this interface
 *
 * @package HelloPay
 */
interface HelloPayClientConfigInterface
{
    /**
     * @return string
     */
    public function getShopConfig();

    /**
     * @return string
     */
    public function getApiUrl();

    /**
     * @return boolean
     */
    public function getSslEnabled();
}