<?php 
require_once __DIR__."/dbconnect.php";

$email=$_POST['email'];
$password=$_POST['new_password'];

try{
    $qry="UPDATE admininfo SET password = ? WHERE email = ?";
    $stmt=$conn->prepare($qry);
    $stmt->bind_param("ss",$password, $email);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
    }
}catch(Exception $e){
    die($e->getMessage());
}finally{
    $conn->close();
}
?>