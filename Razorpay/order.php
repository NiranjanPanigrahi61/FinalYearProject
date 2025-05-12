<?php
require('vendor/autoload.php'); // use Razorpay PHP SDK via Composer
require_once __DIR__ . '/../dbfunctions/userdbfunctions.php';


use Razorpay\Api\Api;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ ,'.env.razorpay');
$dotenv->load();

$keyId = $_ENV['RAZORPAY_KEY'];
$keySecret = $_ENV['RAZORPAY_SECRET'];

$api = new Api($keyId, $keySecret);

$amount=intval($_POST['total_price']) * 100;

// Amount in paise (e.g. 50000 paise = ₹500)

$orderData = [
    'receipt'         => uniqid('Vc_' ),
    'amount'          => $amount,
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$order = $api->order->create($orderData);

$userid=$_SESSION['user_id'];

$data=userDetails($userid);
$userData=$data->fetch_assoc();

$response = [
    'key'=>$keyId,
    'id' => $order['id'],
    'amount' => $order['amount'],
    'name'=>$userData['username'],
    'email'=>$userData['email'],
    'phone'=>$userData['phone']
];

echo json_encode($response);
