<?php
require_once __DIR__ . "/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['productid']) && isset($_POST['status'])) {
        $productId = (int)$_POST['productid'];
        $newStatus = $_POST['status'];

        // Update order status in the database using productid
        $updateQuery = "UPDATE orders SET status = ? WHERE productid = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("si", $newStatus, $productId);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }
        $stmt->close();
    }
}
?>