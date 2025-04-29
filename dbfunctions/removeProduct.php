<?php
require_once "./dbconnect.php";

$id = $_POST['id'];
$tableName = $_POST['name'];
$imageUrl = $_POST['image_url'];



try {
    $qry = "DELETE FROM $tableName WHERE id=?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        if (isset($_POST['image_url'])) {
            $parsedUrl = parse_url($imageUrl);
            $path = $parsedUrl['path']; // Gives you "/cakes/choco.jpg"

            $pathParts = explode('/', trim($path, '/')); // Now split properly

            $folder = $pathParts[0]; // cakes
            $imgName = $pathParts[1];
            require_once "../aws/remove.php";
            $res=deleteFromS3($folder, $imgName);
            if ($res) {
                echo "success";
            } else {
                echo "false";
            }
        }
    } else {
        echo "false";
    }
} catch (Exception $e) {
    die($e->getMessage());
} finally {
    $conn->close();
}
