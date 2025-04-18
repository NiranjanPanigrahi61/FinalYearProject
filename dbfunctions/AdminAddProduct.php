<?php
require_once "./adminfunctions.php";

$productCategory = $_POST['productname'];
$productName = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$weight = $_POST['weight'] ?? null;
$size = $_POST['size'] ?? null; 
$description = $_POST['description'];
$response;
if (isset($_FILES['productimg']) && $_FILES['productimg']['error'] === 0) {
    $tmpName = $_FILES['productimg']['tmp_name'];
    $imgName = time() . "-" . $_FILES['productimg']['name'];
    require_once "../aws/upload.php";
    $response = uploadtoS3($productCategory, $tmpName, $imgName);
}
if ($response) {
    $res = addProduct($productCategory, $productName, $price, $quantity, $weight, $size, $description, $response);
    echo $res;
} else {
    echo false;
}

?>