<?php

namespace HelloPay\Config;

/**
 * Class HelloPayConfigManager
 *
 * This entity handles client config validation decisions. May be there is a better name than "Manager" for this
 *
 * @package HelloPay\Config
 */
class HelloPayConfigManager
{
    /**
     * @var HelloPayConfigValidator
     */
    private $helloPayConfigValidator;

    /**
     * @var HelloPayClientConfigInterface
     */
    private $helloPayClientConfig;

    /**
     * HelloPayConfigManager constructor.
     */
    public function __construct(HelloPayClientConfigInterface $helloPayConfig)
    {
        $this->helloPayConfigValidator = new HelloPayConfigValidator();

        if (!$this->helloPayConfigValidator->isValidShopConfig($helloPayConfig)) {
            throw new HelloPayConfigManagerException('Required "shopConfig" property not supplied in config or invalid');
        }

        if (!$this->helloPayConfigValidator->isValidApiUrl($helloPayConfig)) {
            throw new HelloPayConfigManagerException('Required "apiUrl" property not supplied in config or invalid');
        }

        if (!$this->helloPayConfigValidator->isValidSslEnabled($helloPayConfig)) {
            throw new HelloPayConfigManagerException('Required "sslEnabled" property not supplied in config or invalid');
        }

        $this->helloPayClientConfig = $helloPayConfig;
    }

    /**
     * @return HelloPayClientConfigInterface
     */
    public function getConfig()
    {
        return $this->helloPayClientConfig;
    }
}