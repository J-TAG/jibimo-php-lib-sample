<?php

use puresoft\jibimo\Jibimo;

require_once "./vendor/autoload.php";

$baseUrl = "https://jibimo.com/api";
$token = $_POST['token']; // You should obtain this token from your Jibimo panel

$transactionId = $_POST['id']; // You should get this transaction ID from where you saved it when you were creating the request in the previous step
$mobile = $_POST['mobile'];
$amountInToman = $_POST['amount'];
$trackerId = $_POST['tracker']; // Tracker ID of main transaction


$validationResult = Jibimo::validatePay($baseUrl, $token, $transactionId,
    $mobile, $amountInToman, $trackerId);

// Validate and check status of transaction in Jibimo
if($validationResult->isAccepted()) {
    // Transaction was successful, user received money correctly
    echo "OK";
    exit();
}

// Otherwise, there is a problem
echo "INVALID" . PHP_EOL;
echo $validationResult->getRawResponse();