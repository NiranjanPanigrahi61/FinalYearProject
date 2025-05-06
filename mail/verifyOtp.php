<?php
session_start();

$entered_otp = $_POST['otp'] ?? '';
$actual_otp = $_SESSION['generated_otp'] ?? '';

if ($entered_otp == $actual_otp) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>