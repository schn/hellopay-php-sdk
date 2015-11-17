<?php

require_once 'ClientConfig.php';
require_once __DIR__ . '/../src/HelloPay/autoload.php';

$clientConfig = new ClientConfig();
$clientConfig->setApiUrl('https://sandbox.hellopay.com.sg');
$clientConfig->setShopConfig('AAEAAADoKU7YItWSEhYpJRb0fV842USafymz4Vs2onKOPsMPlnU9LFrt/AAEAAAgfi0NagriqYanhi9n07WBzO97L9uLWSRpFW5Yk_yhzXuhddRfA/413974c5da819d4495d7c45ce3ef036a');
$clientConfig->setSslEnabled(false);

$helloPay = new \HelloPay\HelloPay($clientConfig);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents('php://input');

    $response = $helloPay->getNotification($postData);

    var_dump($response->getNewStatus());
    var_dump($response->getTransactionId());
    var_dump($response->getMerchantReferenceId());
}
