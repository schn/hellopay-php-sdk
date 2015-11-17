<?php

namespace HelloPay\Config;

/**
 * Class HelloPayConfigValidator
 *
 * Validation of HelloPay client config
 *
 * @package HelloPay
 */
class HelloPayConfigValidator
{
    /**
     * @param HelloPayClientConfigInterface $helloPayConfig
     *
     * @return bool
     */
    public function isValidShopConfig(HelloPayClientConfigInterface $helloPayConfig)
    {
        if (!is_string($helloPayConfig->getShopConfig())) {
            return false;
        }

        if (empty($helloPayConfig->getShopConfig())) {
            return false;
        }

        return true;
    }

    /**
     * @param HelloPayClientConfigInterface $helloPayConfig
     *
     * @return bool
     */
    public function isValidApiUrl(HelloPayClientConfigInterface $helloPayConfig)
    {
        if (!is_string($helloPayConfig->getApiUrl())) {
            return false;
        }

        if (empty($helloPayConfig->getApiUrl())) {
            return false;
        }

        return true;
    }

    /**
     * @param HelloPayClientConfigInterface $helloPayConfig
     *
     * @return bool
     */
    public function isValidSslEnabled(HelloPayClientConfigInterface $helloPayConfig)
    {
        if (!is_bool($helloPayConfig->getSslEnabled())) {
            return false;
        }

        return true;
    }
}