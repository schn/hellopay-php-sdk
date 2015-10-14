<?php

require_once __DIR__ . '/../src/HelloPay/autoload.php';

$helloPay = new \HelloPay\HelloPay([
    'shopConfig' => 'AAEAAADoKU7YItWSEhYpJRb0fV842USafymz4Vs2onKOPsMPlnU9LFrt/AAEAAAgfi0NagriqYanhi9n07WBzO97L9uLWSRpFW5Yk_yhzXuhddRfA/413974c5da819d4495d7c45ce3ef036a',
    'apiUrl' => 'https://sandbox.hellopay.com.sg'
]);

$data = array(
    'purchaseId' => 'AAEAAADoKU6421HOOB_aPVn34sGc1cwHIikItYez4BicVrRe15YHGF4f',
    'refundAmount' => '1',
    'merchantReferenceId' => '1444643320',
    'refundCurrency' => 'SGD',
    'description' => 'Test refund'
);

$response = $helloPay->refundAmount($data);

if ($response) {
    echo "Transaction has refunded successfully!";
} else {
    echo $helloPay->getLastMessage();
}
