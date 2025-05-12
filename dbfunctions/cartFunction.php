<?php
require_once __DIR__ . '/dbconnect.php';  // Go one level up to find dbconnect.php



function cartValue()
{
    $cartCount = 0;

    if (!isset($_SESSION['user_id'])) {
        return $cartCount;
    }
    $userid = $_SESSION['user_id'];
    global $conn;
    try {
        $countQry = "SELECT COUNT(id) AS total FROM cart WHERE userid = ?";
        $countStmt = $conn->prepare($countQry);
        $countStmt->bind_param("i", $userid);
        $countStmt->execute();
        $result = $countStmt->get_result();
        $row = $result->fetch_assoc();
        $cartCount = $row['total'] ?? 0;
        return $cartCount;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function cartDetails()
{
    $userId = $_SESSION['user_id'];
    global $conn;

    try {
        $qry = "SELECT productid, product_type AS table_name FROM cart WHERE userid = ?";
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $cartResult = $stmt->get_result();

        $cartItems = [];

        while ($cartRow = $cartResult->fetch_assoc()) {
            $productId = $cartRow['productid'];
            $tableName = $cartRow['table_name']; // This is actually the table name

            // Validate table name to avoid SQL injection
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName)) {
                continue; // skip invalid table names
            }

            // Now fetch product details from the correct product table
            $productQry = "SELECT * FROM `$tableName` WHERE id = ?";
            $productStmt = $conn->prepare($productQry);
            $productStmt->bind_param("i", $productId);
            $productStmt->execute();
            $productResult = $productStmt->get_result();

            if ($productData = $productResult->fetch_assoc()) {
                $cartItems[] = array_merge($cartRow, $productData); // Combine cart and product data
            }
        }

        return $cartItems;
    } catch (Exception $e) {
        die("Error fetching cart details: " . $e->getMessage());
    }
}
?>