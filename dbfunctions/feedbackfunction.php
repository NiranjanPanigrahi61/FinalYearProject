<?php
session_start();
include_once "dbconnect.php";  // Ensure this file contains a working DB connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        'success' => false,
        'notLoggedIn' => true,
        'message' => 'You must be logged in to submit feedback.'
    ]);
    exit;
}

// Get and trim input data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate inputs
if ($name === "" || $email === "" || strlen($message) < 10) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid input. Please fill all fields correctly.'
    ]);
    exit;
}

// Check if the user exists with the provided email
$stmt = $conn->prepare("SELECT userid FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $user_id = $row['userid'];

    // Insert feedback (now including name)
    $stmt = $conn->prepare("INSERT INTO feedback (userid, name, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $name, $message);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Feedback submitted successfully.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Database error while submitting feedback.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'emailNotFound' => true,
        'message' => 'The provided email does not match any account.'
    ]);
}
?>
