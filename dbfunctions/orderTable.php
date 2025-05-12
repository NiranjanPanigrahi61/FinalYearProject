<?php
require_once __DIR__ . "/dbconnect.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userId = $_SESSION['user_id'];
$paymentId = $_POST['payment_id'];
$orderId = $_POST['order_id'];
$quantities = json_decode($_POST['quantities'], true);

// Get user's address ID
$qry = "SELECT id FROM address WHERE userid=?";
$stmt = $conn->prepare($qry);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$addressId = $data['id'];

try {
    $qry = "INSERT INTO orders (userid, orderid, productid, addressid, paymentid, quantity, total_price, category)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($qry);

    foreach ($quantities as $item) {
        $stmt->bind_param(
            "isissids",
            $userId,
            $orderId,
            $item['product_id'],
            $addressId,
            $paymentId,
            $item['quantity'],
            $item['price'],
            $item['product_type']
        );
        $stmt->execute();
    }

    // Delete items from the cart
    $deleteCartQry = "DELETE FROM cart WHERE userid = ?";
    $deleteCartStmt = $conn->prepare($deleteCartQry);
    $deleteCartStmt->bind_param("i", $userId);
    $deleteCartStmt->execute();

    echo json_encode(["status" => "success"]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}

?>
