<?php
require_once "./dbconnect.php";

function dashboardStat(){
    global $conn;
    try{
        $qry1="";
        $qry2="";
        $qry3="";
        $qry4="";
    }catch(Exception $e){
        die($e->getMessage());
    }finally{
        $conn->close();
    }
}
?>