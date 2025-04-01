<?php
require_once "./dbconnect.php";

$email=$_POST['email'];
$password=$_POST['password'];
try{
    $qry="SELECT * FROM admininfo WHERE email=? AND password=?";
    $stmt=$conn->prepare($qry);
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows > 0){
        echo true;
    }else{
        echo false;
    }
}catch(Exception $e){
    die($e->getMessage());
}finally{
    $conn->close();
}

?>