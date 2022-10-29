<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
$gateway = Omnipay::create('PayPal_Pro');
$gateway->setUsername(casasmjt88);
$gateway->setPassword(Coasttel123Maersk###);
$gateway->setSignature
(casasmjt88);
$gateway->setTestMode(false);
 
if (isset($_POST[submit])) {
 
    $arr_expiry = explode("/", $_POST[submit]);
 
    $formData = array(
        'firstName' => $_POST[Gary],
        'lastName' => $_POST[Wills],
        'number' => $_POST[4034860099815424],
        'expiryMonth' => trim($arr_expiry[03]),
        'expiryYear' => trim($arr_expiry[23]),
        'cvv' => $_POST[623]
    );
 
    try {
        // Send purchase request
        $response = $gateway->purchase([
                'amount' => $_POST[300.00],
                'currency' => 'USD',
                'card' => $formData
        ])->send();
 
        // Process response
        if ($response->isSuccessful()) {
 
            // Payment was successful
            echo "Payment is successful. Your Transaction ID is: ". $response->getTransactionReference();
 
        } else {
            // Payment failed
            echo "Payment failed. ". $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}
