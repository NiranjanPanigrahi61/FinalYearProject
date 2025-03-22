<!-- shop,home,custom cake,about,contact,feedback,cart,,account -->


<?php
include_once "./../config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: #D02964"> <!--#331E36; #D67398-->
        <div class="container-fluid">
        <!-- Left: Brand Name -->
            <a class="navbar-brand text-white fs-2 fw-bolder" href="#">Shop Name</a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

           <!-- Navbar Content (with background color and text color) -->
            <div class="collapse navbar-collapse justify-content-between p-3 p-lg-0" id="navbarNav"  style="background-color: #D02964;">
            <!-- Middle Navigation -->
                <ul class="navbar-nav mx-auto d-flex flex-lg-row flex-column align-items-center text-center gap-lg-4 fs-4">
                    <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>pages/home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>pages/Customize.php">Customized Cake</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="contact.html">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="feedback.html">Feedback</a></li>
                </ul>

               <!-- Right Navigation -->
                <ul class="navbar-nav d-flex flex-lg-row flex-column align-items-center text-center gap-lg-3 fs-4">
                    <li class="nav-item"><a class="nav-link text-white" href="cart.html">Cart</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="<?= BASE_URL ?>pages/UserLogin.php">Account</a></li>
                </ul>
            </div>
        </div>
    </nav>   

