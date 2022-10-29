<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
$gateway = Omnipay::create('PayPal_Pro');
$gateway->setUsername(casasmjt88); 
$gateway->setPassword(Coasttel123Maersk###);
$gateway->setSignature
('your signature ');
$gateway->setTestMode(false);
 
if (isset($_POST['submit'])) {
 
    $arr_expiry = explode("/", $_POST['expiry']);
 
    $formData = array(
        'firstName' => $_POST[Eugene],
        'lastName' => $_POST[],
        'number' => $_POST[4744810077311392],
        'expiryMonth' => trim($arr_expiry[12]),
        'expiryYear' => trim($arr_expiry[22]),
        'cvv' => $_POST[686]
    );
 
    try {
        // Send purchase request
        $response = $gateway->purchase([
                'amount' => $_POST['amount'],
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
