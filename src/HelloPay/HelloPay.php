<?php
/**
 * Copyright 2015 HELLOPAY SINGAPORE PTE. LTD.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * helloPay.
 *
 * As with any software that integrates with the helloPay platform, your use
 * of this software is subject to the helloPay Developer Principles and
 * Policies [https://www.hellopay.com.sg/privacy-policy.html]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace HelloPay;

use HelloPay\CancelTransaction\CancelTransactionManager;
use HelloPay\Config\HelloPayClientConfigInterface;
use HelloPay\Config\HelloPayConfigManager;
use HelloPay\HttpClients\HelloPayCurlHttpClient;
use HelloPay\Notification\NotificationFactory;

/**
 * Class HelloPay
 *
 * todo: all classes constructor properties should be injected by DI Container
 * todo: ( for example we could use https://github.com/PHP-DI/PHP-DI )
 *
 * @package HelloPay
 */
class HelloPay
{
    /**
     * todo: should be removed
     * todo: are we really need this param in code? i suppose such things should be solved by git tags
     * @const string Version number of the helloPay PHP SDK.
     */
    const VERSION = '1.0.0';

    /**
     * todo: should be removed
     * todo: i think its not a good idea to delegate such config param to environment variables
     * todo: lets use HelloPayConfigInterface instead
     * @const string The name of the environment variable that contains the shopConfig.
     */
    const HELLOPAY_SHOP_CONFIG = 'HELLOPAY_SHOP_CONFIG';

    /**
     * todo: should be removed
     * todo: i think its not a good idea to delegate such config param to environment variables
     * todo: lets use HelloPayConfigInterface instead
     * @const string the name of the environment variable that contains the apiUrl
     */
    const HELLOPAY_API_URL = 'HELLOPAY_API_URL';

    /**
     * todo: should be removed
     * todo: May be write logs instead?
     */
    protected $lastMessage = '';

    /**
     * @var HelloPayConfigManager
     */
    private $helloPayConfigManager;

    /**
     * @var NotificationFactory
     */
    private $notificationFactory;

    /**
     * @var CancelTransactionManager
     */
    private $cancelTransactionManager;

    /**
     * Instantiates a new helloPay main object
     *
     * @param HelloPayClientConfigInterface $helloPayConfig
     *
     * @throws HelloPaySDKException
     */
    public function __construct(HelloPayClientConfigInterface $helloPayConfig)
    {
        $this->helloPayConfigManager = new HelloPayConfigManager($helloPayConfig);

        $this->notificationFactory = new NotificationFactory();
        $this->cancelTransactionManager = new CancelTransactionManager($this->helloPayConfigManager);
    }

    /**
     * todo: in this submodule we would have more large abstractions on the input data. we need to make several objects
     * todo: such as CreatePurchaseBasketRequestParams, CreatePurchaseBasketMainRequestParams etc
     * todo: that would be part (composition relations) of CreatePurchaseRequestParams object
     * todo: another part of submodule would stay the same as in cancelTransaction submodule example
     *
     * @param array $purchaseData
     * @return HelloPayResponse
     */
    public function createPurchase(array $purchaseData = [])
    {
        // todo: return $this->helloPayCreatePurchaseManager->createPurchase($purchaseData);
    }

    /**
     * todo: here we do same as in CancelTransaction: make submodule with all entities
     *
     * @param array $requestParams
     * @return HelloPayResponse
     */
    public function getTransactionEvents(array $requestParams = [])
    {
        //todo: return $this->transactionEventsManager->getTransactionEvents($requestParams);
    }

    /**
     * @param string $transactionId
     * @return HelloPayResponse
     */
    public function cancelTransaction($transactionId)
    {
        return $this->cancelTransactionManager->cancelTransaction($transactionId);
    }

    /**
     * todo: here we do same as in CancelTransaction: make submodule RefundAmount with all entities
     *
     * @param array $requestParams
     * @return HelloPayResponse
     */
    public function refundAmount(array $requestParams)
    {
        //todo: return $this->refundAmountManager->refundAmount($requestParams);
    }

    /**
     * @param string $payload
     * @return HelloPayResponse
     */
    public function getNotification($payload)
    {
        return $this->notificationFactory->createFromPayload($payload);
    }
}
