<?php

require_once "./vendor/autoload.php";

use puresoft\jibimo\Jibimo;
use puresoft\jibimo\payment\values\JibimoTransactionStatus;

$baseUrl = "https://jibimo.com/api";
$token = $_POST['token']; // You should obtain this token from your Jibimo panel

$mobile = $_POST['mobile'];
$amountInToman = $_POST['amount'];
$privacyLevel = $_POST['privacy'];
$trackerId = $_POST['tracker']; // Anything like a factor number or maybe a UUID, it's up to you
$description = $_POST['description']; // Optional, this will show up in Jibimo feed
//$returnUrl = "http://mywebsite.com/callback/?something=somethingelse"; // Optional, after payment, Jibimo will redirect user to this URL. If you omit it, Jibimo will redirect user to your company homepage

$response = Jibimo::request($baseUrl, $token, $mobile,
    $amountInToman, $privacyLevel, $trackerId, $description);

// Status of transaction must be `Pending`
if(JibimoTransactionStatus::PENDING === $response->getStatus()) {

    // Save Jibimo transaction ID to database or whatever to use that to verify transaction later
    // $response->getTransactionId();

    // Now, redirect user to Jibimo gateway
    $redirect = $response->getRedirectUrl();
    header("Location: $redirect");
    exit();
}

// For other problems and errors, you can see the raw response or catch exceptions
echo "Something went wrong! Jibimo result: " . $response->getRawResponse() . PHP_EOL;
