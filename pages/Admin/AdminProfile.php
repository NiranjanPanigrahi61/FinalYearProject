<?php
session_start();
if (!isset($_SESSION["loggedin"])){
    header("location:adminlogin.php");
    exit();
}
require_once "../../dbfunctions/adminfunctions.php";

include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";

$data = adminDetails();
?>