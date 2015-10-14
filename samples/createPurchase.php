<?php

require_once __DIR__ . '/../src/HelloPay/autoload.php';

$helloPay = new \HelloPay\HelloPay([
    'shopConfig' => 'AAEAAADoKU7YItWSEhYpJRb0fV842USafymz4Vs2onKOPsMPlnU9LFrt/AAEAAAgfi0NagriqYanhi9n07WBzO97L9uLWSRpFW5Yk_yhzXuhddRfA/413974c5da819d4495d7c45ce3ef036a',
    'apiUrl' => 'https://sandbox.hellopay.com.sg'
]);

$data = [];
$data['priceAmount'] = "250";
$data['priceCurrency'] = "SGD";
$data['description'] = "Lazada purchase create";
$data['merchantReferenceId'] = time(); #this value must be unique

# after user finished the payment on helloPay side, he will be redirected to this page (merchant side)
# helloPay will pass one param with this URL like this e.g:
# http://yourdomain.com/hellopay/response?paymentStatus=Success|Failed|Pending|Cancel
$data['purchaseReturnUrl'] = "http://yourdomain.com/hellopay/response";

# item 1
$data['basket'] = [];
$data['basket']['basketItems'] = [];
$data['basket']['basketItems'][] = [
    'name' => 'Item 1',
    'quantity' => 1,
    "amount" => "250",
    "taxAmount" => "0",
    "imageUrl" => "http://yourdomain.com/img/product.png",
    "currency" => "SGD"
];

$data['basket']['shipping'] = "0.00";
$data['basket']['totalAmount'] = "250";
$data['basket']['currency'] = "SGD";

$data['shippingAddress']['name'] = 'Testint Tom';
$data['shippingAddress']['firstName'] = "Testint";
$data['shippingAddress']['lastName'] = "Tom";
$data['shippingAddress']['addressLine1'] = "Test Street 22";
$data['shippingAddress']['province'] = "DKI Jakarta";
$data['shippingAddress']['city'] = "Kab. Kepulauan Seribu";
$data['shippingAddress']['country'] = "SG";
$data['shippingAddress']['mobilePhoneNumber'] = "6563584754"; #should include country code
$data['shippingAddress']['houseNumber'] = "House Number";
$data['shippingAddress']['addressLine2'] = "Address Line2";
$data['shippingAddress']['district'] = "Kepulauan Seribu Utara";
$data['shippingAddress']['zip'] = "247964";


$data['billingAddress']['name'] = "Testint Tom";
$data['billingAddress']['firstName'] = "Testint";
$data['billingAddress']['lastName'] = "Tom";
$data['billingAddress']['addressLine1'] = "Test Street 22";
$data['billingAddress']['province'] = "DKI Jakarta";
$data['billingAddress']['city'] = "Kab. Kepulauan Seribu";
$data['billingAddress']['country'] = "SG";
$data['billingAddress']['mobilePhoneNumber'] = "6563584754"; #should include country code
$data['billingAddress']['houseNumber'] = "House Number";
$data['billingAddress']['addressLine2'] = "Address Line2";
$data['billingAddress']['district'] = "Kepulauan Seribu Utara";
$data['billingAddress']['zip'] = "247964";


$data['consumerData']['mobilePhoneNumber'] = "6563584754"; #should include country code
$data['consumerData']['emailAddress'] = "test@test.com";
$data['consumerData']['country'] = "SG";
$data['consumerData']['language'] = "en";
$data['consumerData']['dateOfBirth'] = "";
$data['consumerData']['gender'] = "";
$data['consumerData']['ipAddress'] = "127.0.0.1";
$data['consumerData']['name'] = "Testint Tom";
$data['consumerData']['firstName'] = "Testint";
$data['consumerData']['lastName'] = "Tom";

$data['additionalData']['deliveryNote'] = "Delivery Note";
$data['additionalData']['deliveryTime'] = "Delivery Time";
$data['additionalData']['deliveryTimeString'] = "Delivery Time String";
$data['additionalData']['deviceType'] = "Device Type";

$response = $helloPay->createPurchase($data);

var_dump($response->getCheckoutUrl());
var_dump($response->getPurchaseId());
