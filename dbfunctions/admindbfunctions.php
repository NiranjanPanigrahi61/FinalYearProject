<?php
require_once "dbconnect.php";

function adminSignUp(){
    global $conn;
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
}
?>