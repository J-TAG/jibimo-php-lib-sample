<?php

use puresoft\jibimo\Jibimo;
use puresoft\jibimo\payment\values\JibimoPrivacyLevel;
use puresoft\jibimo\payment\values\JibimoTransactionStatus;

require_once "./vendor/autoload.php";

$baseUrl = "https://jibimo.com/api";
$token = $_POST['token']; // You should obtain this token from your Jibimo panel

$mobile = $_POST['mobile'];
$amountInToman = $_POST['amount'];
$iban = $_POST['iban'];
$privacyLevel = $_POST['privacy'];
$trackerId = $_POST['tracker']; // Anything like a factor number or maybe a UUID, it's up to you
$description = $_POST['description']; // Optional, this will show up in Jibimo feed
$name = $_POST['name']; // Optional, The first name of IBAN(Sheba) owner
$family = $_POST['family']; // Optional, The last name of IBAN(Sheba) owner

$response = Jibimo::extendedPay($baseUrl, $token, $mobile,
    $amountInToman, $privacyLevel, $iban, $trackerId,
    $description, $name, $family);

// Here you should save transaction ID to verify it later
// $response->getTransactionId();

if(JibimoTransactionStatus::ACCEPTED === $response->getStatus()) {
    // Money was paid successfully
    echo "Paid successfully." . PHP_EOL;
}

// For other problems and errors, you can see the raw response or catch exceptions
echo "Something went wrong! Jibimo result: " . $response->getRawResponse() . PHP_EOL;