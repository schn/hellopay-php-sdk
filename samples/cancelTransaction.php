<?php

require_once 'ClientConfig.php';
require_once __DIR__ . '/../src/HelloPay/autoload.php';

$clientConfig = new ClientConfig();
$clientConfig->setApiUrl('https://sandbox.hellopay.com.sg');
$clientConfig->setShopConfig('AAEAAADoKU7YItWSEhYpJRb0fV842USafymz4Vs2onKOPsMPlnU9LFrt/AAEAAAgfi0NagriqYanhi9n07WBzO97L9uLWSRpFW5Yk_yhzXuhddRfA/413974c5da819d4495d7c45ce3ef036a');
$clientConfig->setSslEnabled(false);

$helloPay = new \HelloPay\HelloPay($clientConfig);

$purchaseId = 'AAEAAADoKU642BAQq_wQDOlqdB5nbGFlWoZMKyz5tOFWC64mbMdXZMLm';

$response = $helloPay->cancelTransaction($purchaseId);

if ($response->getSuccess()) {
    echo "Transaction has cancelled successfully!";
} else {
    echo $response->getMessage();
}
