<?php

require_once __DIR__.'/dbconnect.php';
require_once __DIR__.'/../aws/upload.php';

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
// echo $image['tmp_name'];
$response;
if (isset($_FILES['adminimage']) && $_FILES['adminimage']['error'] === 0) {
    $tmpName = $_FILES['adminimage']['tmp_name'];
    $imgName = time() . "-" . $_FILES['adminimage']['name'];
    require_once "../aws/upload.php";
    $response = uploadtoS3("admin", $tmpName, $imgName);
}
if ($response) {
    try {
        $qry="UPDATE admininfo SET username=?, email=?, password=?, adminimage=?";
        $stmt=$conn->prepare($qry);
        $stmt->bind_param("ssss",$username,$email,$password,$response);
        if($stmt->execute()){
            echo true;
        }else{
            echo false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }finally{
        $conn->close();
    }
} else {
    echo false;
}

?>