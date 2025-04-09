<?php
include_once "./../config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../Bootstrap/bootstrap.min.css">
    <style>
        /* Increase size of nav items */
        .nav-item {
            font-size: 1.2rem; /* Increased font size */
            padding: 12px 16px; /* Added more padding */
        }

        /* Hover Effect Styling */
        .nav-link {
            transition: all 0.3s ease-in-out;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px; /* Increased padding */
        }

        /* Initially hide the icons */
        .nav-link i {
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease-in-out;
        }

        /* On hover, show icons */
        .nav-link:hover {
            color: #FC8F59 !important;
            transform: scale(1.08);
        }

        .nav-link:hover i {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark p-3" style="background-color: #D02964;">
        <div class="container-fluid">
            <a class="navbar-brand text-white fs-2 fw-bolder" href="#">Shop Name</a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="<?= BASE_URL ?>pages/home.php">
                            <i class="fa-solid fa-house"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="<?= BASE_URL ?>pages/Customize.php">
                            <i class="fa-solid fa-cake-candles"></i> Customized Cake
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="<?= BASE_URL ?>component/about.php">
                            <i class="fa-solid fa-circle-info"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="<?= BASE_URL ?>component/contactus.php">
                            <i class="fa-solid fa-phone"></i> Contact Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="feedback.html">
                            <i class="fa-solid fa-comment-dots"></i> Feedback
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="cart.html">
                            <i class="fa-solid fa-cart-shopping"></i> Cart
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="<?= BASE_URL ?>pages/UserLogin.php">
                            <i class="fa-solid fa-user"></i> Account
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>