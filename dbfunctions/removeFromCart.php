<?php
session_start();
require_once __DIR__ . '/dbconnect.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // DEBUGGING

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
    $productId = (int)$_POST['product_id'];
    $userId = (int)$_SESSION['user_id'];

    try {
        $qry = "DELETE FROM cart WHERE userid=? AND productid=?";
        $stmt = $conn->prepare($qry);
        if (!$stmt) {
            echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
            exit;
        }

        $stmt->bind_param("ii", $userId, $productId);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Item removed from cart']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to execute delete']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
