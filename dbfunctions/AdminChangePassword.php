<?php
session_start();
require_once "./dbconnect.php"; // adjust path as needed

header('Content-Type: application/json');

// Replace this with your session key or logic for fetching admin ID
if (!isset($_SESSION['admin'])) {
    echo json_encode(['status' => 'error', 'message' => 'Not logged in.']);
    exit;
}

$admin = $_SESSION['admin'];
$current = trim($_POST['current'] ?? '');
$new = trim($_POST['new'] ?? '');

if ($current === '' || $new === '') {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}
try{
    // 1. Fetch the current password from DB
    $qry = "SELECT password FROM admininfo WHERE email = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("s", $admin);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Admin not found.']);
        exit;
    }
    
    $row = $result->fetch_assoc();
    $dbPassword = $row['password'];
    
    // 2. Check if current password matches
    if ($current !== $dbPassword) {
        echo json_encode(['status' => 'error', 'message' => 'Current password is incorrect.']);
        exit;
    }
    
    // 3. Check if new password is same as current
    if ($new === $current) {
        echo json_encode(['status' => 'error', 'message' => 'New password cannot be the same as the old password.']);
        exit;
    }
    
    // 4. Update the password
    $updateqry = "UPDATE admininfo SET password = ? WHERE email = ?";
    $updateStmt = $conn->prepare($updateqry);
    $updateStmt->bind_param("ss", $new, $admin);
    
    if ($updateStmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
    }
}catch(Exception $e){
    die($e->getMessage());
}finally{
    $conn->close();
}
?>