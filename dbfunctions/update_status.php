<?php
require_once __DIR__ . "/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['orderid']) && isset($_POST['status'])) {
        $orderId = $_POST['orderid'];
        $newStatus = $_POST['status'];

        // Update order status in the database
        $updateQuery = "UPDATE orders SET status = ? WHERE orderid = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ss", $newStatus, $orderId);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
        $stmt->close();
    }
}
?>