<?php

namespace HelloPay;

/**
 * Class HelloPayHttpClient
 *
 * @package HelloPay
 */
abstract class HelloPayHttpClient
{
    /**
     * todo: here goes some low level http client (ex. curl or HTTP_Request2)
     * @var
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $endPointUrlKey;

    /**
     * @param HelloPayRequest $helloPayRequest
     *
     * @return HelloPayResponse
     */
    abstract public function send(HelloPayRequest $helloPayRequest);
}