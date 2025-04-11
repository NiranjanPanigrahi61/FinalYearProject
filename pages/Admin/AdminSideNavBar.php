<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link {
            transition: background 0.3s, color 0.3s;
            color: white !important;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #FC8F59;
            color: white !important;
            border-radius: 5px;
        }

        .btn {
            background-color: #D02964 !important;
            color: white !important;
        }

        .offcanvas_btn {
            top: 20px;
        }

        .nav {
            left: 0px;
            top: 86px;
        }
    </style>
</head>

<body>
    <div class="d-none d-md-block position-fixed vh-100 p-3 nav " style="width: 250px; background-color: #D02964;">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="./dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="./items.php">Items</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#inventoryCollapseDesktop" role="button"
                    aria-expanded="false" aria-controls="inventoryCollapseDesktop">
                    Inventory
                </a>
                <div class="collapse ps-3" id="inventoryCollapseDesktop">
                    <ul class="list-unstyled mb-0">
                        <li><a class="nav-link" href="./addCategory.php">Add Category</a></li>
                        <li><a class="nav-link" href="#">Remove Category</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Customize Cake</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Feedbacks</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
        </ul>
    </div>

    <!-- Offcanvas menu for mobile -->
    <button class="btn offcanvas_btn d-md-none position-fixed start-0 p-3" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        ☰
    </button>

    <div class="offcanvas offcanvas-start d-md-none" id="offcanvasNavbar" style="background-color: #D02964;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white ">Silicon Baking</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="./dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Items</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Inventory</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./addCategory.php">Add Category</a></li>
                        <li><a class="dropdown-item" href="#">Remove Category</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Customize Cake</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Feedbacks</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
            </ul>
        </div>
    </div>

    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    
</body>

</html>