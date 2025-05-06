<?php
session_start();
if (!isset($_SESSION["loggedin"])){
    header("location:AdminLogin.php");
    exit();
}
include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .dashboard {
            margin-left: 275px;
            margin-top: 106px;
            padding: 20px;
        }
        @media (max-width: 768px) {
            .dashboard {
                margin-left: 0;
                margin-top: 86px;
            }
        }
        .dashboard .card {
            text-align: center;
            padding: 20px;
            background-color: #ED555A !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="dashboard">
            <h3>Dashboard</h3>
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">1,234</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Items</h5>
                            <p class="card-text">256</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text">789</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="card text-white">
                        <div class="card-body">
                            <h5 class="card-title">Revenue</h5>
                            <p class="card-text">$12,345</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script> 
</body>
</html>