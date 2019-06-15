<?php

use puresoft\jibimo\Jibimo;
use puresoft\jibimo\payment\values\JibimoTransactionStatus;

require_once "./vendor/autoload.php";

$baseUrl = "https://jibimo.com/api";
$token = $_POST['token']; // You should obtain this token from your Jibimo panel

$mobile = $_POST['mobile'];
$amountInToman = $_POST['amount'];
$privacyLevel = $_POST['privacy'];
$trackerId = $_POST['tracker']; // Anything like a factor number or maybe a UUID, it's up to you
$description = $_POST['description']; // Optional, this will show up in Jibimo feed


$response = Jibimo::pay($baseUrl, $token, $mobile,
    $amountInToman, $privacyLevel, $trackerId, $description);

// Here you should save transaction ID to verify it later
// $response->getTransactionId();

if(JibimoTransactionStatus::ACCEPTED === $response->getStatus()) {
    // Money was paid immediately
    echo "Paid immediately." . PHP_EOL;
    echo "Transaction ID: " . $response->getTransactionId() . PHP_EOL;
    echo "Amount: " . $response->getAmount() . ' (Toman)' . PHP_EOL;
    echo "Status: " . $response->getStatus() . PHP_EOL;
    echo "Mobile: " . $response->getPayee() . PHP_EOL;
    echo "Tracker ID: " . $response->getTrackerId() . PHP_EOL;
    exit();
} else if(JibimoTransactionStatus::PENDING === $response->getStatus()) {
    // The user was not registered in Jibimo, so it will be pending until user being registered in Jibimo
    echo "Pending registration. The user was not registered in Jibimo, so it will be pending until user being registered in Jibimo" . PHP_EOL;
    exit();
}

// For other problems and errors, you can see the raw response or catch exceptions
echo "Something went wrong! Jibimo result: " . $response->getRawResponse() . PHP_EOL;