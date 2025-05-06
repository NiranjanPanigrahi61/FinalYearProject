<?php

$id = $_POST['id'];
$table_name = $_POST['table_name'];
$productName = $_POST['product_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$description = $_POST['description'];
$description = $_POST['description'];
$description = $_POST['description'];
$weight = $_POST['weight'] ?? null;
$size = $_POST['size'] ?? null;

require_once "./dbconnect.php";
try {
    if ($table_name == "cake") {
        $qry = "UPDATE $table_name SET product_name=?, description=?, price=?, quantity=?, weight=?, size=? WHERE id=?";
        $stmt=$conn->prepare($qry);
        $stmt->bind_param("ssdissi", $productName, $description, $price, $quantity, $weight, $size, $id);
    } else {
        $qry = "UPDATE $table_name SET product_name=?, description=?, price=?, quantity=? WHERE id=?";
        $stmt=$conn->prepare($qry);
        $stmt->bind_param("ssdii", $productName, $description, $price, $quantity, $id);
    }
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
} catch (Exception $e) {
    die($e->getMessage());
} finally {
    $conn->close();
}
