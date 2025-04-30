<?php 
require_once "./dbconnect.php";

function adminInfo(){
    global $conn;
    try{
        $qry="SSELECT 8 FROM admininfo";
        $stmt=$conn->prepare($qry);
        $stmt->execute();
    }catch(Exception $e){
        die($e->getMessage());
    }finally{
        $conn->close();
    }
}
?>