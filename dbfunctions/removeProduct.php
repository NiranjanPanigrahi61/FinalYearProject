<?php 
require_once "./dbconnect.php";

$id=$_GET['id'];
try{
    $qry="";

}catch(Exception $e){
    die($e->getMessage());
}finally{
    $conn->close();
}
?>