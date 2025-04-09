<?php
require_once "./dbconnect.php";

function dashboardStat(){
    global $conn;
    try{
        $qry1="SELECT COUNT(*) FROM user";
        // $qry2="SELECT COUNT(*) AS total_tables FROM information_schema.tables WHERE table_schema = 'bakery'";
        $qry2="SELECT COUNT(*) FROM items";
        $qry3="SELECT COUNT(*) FROM order";
        // $qry4="";
    }catch(Exception $e){
        die($e->getMessage());
    }finally{
        $conn->close();
    }
}
?>