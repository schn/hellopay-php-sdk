<?php

require_once __DIR__ . '/../src/HelloPay/autoload.php';

$helloPay = new \HelloPay\HelloPay([
    'shopConfig' => 'AAEAAADoKU7YItWSEhYpJRb0fV842USafymz4Vs2onKOPsMPlnU9LFrt/AAEAAAgfi0NagriqYanhi9n07WBzO97L9uLWSRpFW5Yk_yhzXuhddRfA/413974c5da819d4495d7c45ce3ef036a',
    'apiUrl' => 'https://sandbox.hellopay.com.sg'
]);

$purchaseId = 'AAEAAADoKU642BAQq_wQDOlqdB5nbGFlWoZMKyz5tOFWC64mbMdXZMLm';

$response = $helloPay->cancelTransaction($purchaseId);

if ($response) {
    echo "Transaction has cancelled successfully!";
} else {
    echo $helloPay->getLastMessage();
}
