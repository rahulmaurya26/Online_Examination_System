<?php
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['amount'])) {
    echo json_encode(["error" => "Amount is missing"]);
    exit;
}

$amount = $input['amount'] * 100; // Convert to paisa

$key_id = "rzp_test_AD9TqbCPT4a9ul";
$key_secret = "YOUR_SECRET_KEY"; // Replace this with your real secret key

$api = new Api($key_id, $key_secret);

$order = $api->order->create([
    'receipt' => 'order_rcptid_11',
    'amount' => $amount,
    'currency' => 'INR',
    'payment_capture' => 1
]);

echo json_encode([
    "id" => $order['id'],
    "amount" => $order['amount'],
    "status" => "created"
]);
