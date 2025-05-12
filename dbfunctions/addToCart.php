<?php

session_start();
require_once __DIR__.'/dbconnect.php';

if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];
    $table = $_POST['tid'];
    $prodId = $_POST['id'];
    try {
        // Check if the product already exists in the cart
        $checkQry = "SELECT productid FROM cart WHERE userid = ? AND productid = ? AND product_type = ?";
        $checkStmt = $conn->prepare($checkQry);
        $checkStmt->bind_param("iis", $userid, $prodId, $table);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // If exists, update the quantity
            echo json_encode([
                "Success"=>"available",
            ]);
            exit(0);
        } else {
            // If not exists, insert new row
            $insertQry = "INSERT INTO cart (userid, productid, product_type) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertQry);
            $insertStmt->bind_param("iis", $userid, $prodId, $table);
            $insertStmt->execute();
        }

        // Recalculate total items in cart
        $countQry = "SELECT COUNT(id) AS total FROM cart WHERE userid = ?";
        $countStmt = $conn->prepare($countQry);
        $countStmt->bind_param("i", $userid);
        $countStmt->execute();
        $result = $countStmt->get_result();
        $row = $result->fetch_assoc();
        $cartCount = $row['total'] ?? 0;

        echo json_encode([
            "success" => true,
            "message" => "Cart updated successfully.",
            "cart_count" => $cartCount
        ]);
    } catch (Exception $e) {
        die(json_encode([
            "success" => false,
            "error" => $e->getMessage()
        ]));
    } finally {
        $conn->close();
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "User not logged in."
    ]);
}
?>
