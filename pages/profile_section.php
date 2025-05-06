<?php
include 'Login_nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            border-right: 1px solid #ddd;
            padding-top: 30px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin-bottom: 5px;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            background-color: #fff;
            transition: all 0.3s ease;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #fef2f2;
            color: #e53935;
            transform: translateX(2px);
            border-bottom: 4px solid #fe817e;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-3 sidebar">
            <a href="?page=myorders" class="<?= ($_GET['page'] ?? 'myprofile') === 'myorders' ? 'active' : '' ?>">📦 My Orders</a>
            <a href="?page=addressbook" class="<?= ($_GET['page'] ?? 'myprofile') === 'addressbook' ? 'active' : '' ?>">🏠 Address Book</a>
            <a href="?page=managecards" class="<?= ($_GET['page'] ?? 'myprofile') === 'managecards' ? 'active' : '' ?>">💳 Manage Saved Cards</a>
            <a href="?page=myprofile" class="<?= ($_GET['page'] ?? 'myprofile') === 'myprofile' ? 'active' : '' ?>">👤 My Profile</a>
            <a href="?page=accountsettings" class="<?= ($_GET['page'] ?? 'myprofile') === 'accountsettings' ? 'active' : '' ?>">⚙️ Account Settings</a>
            <a href="logout.php" class="text-danger">
                <img src="https://bkmedia.bakingo.com/ssr-static/logout.svg" width="24" class="me-2" alt="Logout icon"> Log Out
            </a>
        </div>

        <!-- Right Content -->
        <div class="col-md-9 p-4">
            <?php
                $page = $_GET['page'] ?? 'myprofile'; // default to 'myprofile'
                $allowed_pages = [
                    'myorders',
                    'addressbook',
                    'managecards',
                    'myprofile',
                    'accountsettings'
                ];

                if (in_array($page, $allowed_pages) && file_exists("$page.php")) {
                    include("$page.php");
                } else {
                    echo "<h4 class='text-danger'>Page not found or access denied.</h4>";
                }
            ?>
        </div>
    </div>
</div>

</body>
</html>
