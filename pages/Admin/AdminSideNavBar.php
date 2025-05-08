<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link {
            transition: background 0.3s ease, color 0.3s ease;
            color: white !important;
            padding: 10px 15px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #FC8F59;
            color: white !important;
            border-radius: 8px;
            box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.2);
            font-weight: 500;
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
            <li class="nav-item"><a class="nav-link" href="./AdminProducts.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#inventoryCollapseDesktop" role="button"
                    aria-expanded="false" aria-controls="inventoryCollapseDesktop">
                    Inventory
                </a>
                <div class="collapse ps-3" id="inventoryCollapseDesktop">
                    <ul class="list-unstyled mb-0">
                        <li><a class="nav-link" href="./addCategory.php">Add Category</a></li>
                        <li><a class="nav-link" href="./AdminAddProductForm.php">Add Product</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Customize Cake</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Feedbacks</a></li>
            <li class="nav-item"><a class="nav-link" href="./AdminProfile.php">Profile</a></li>
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
                <li class="nav-item"><a class="nav-link" href="./items.php">Items</a></li>
                <li class="nav-item"><a class="nav-link" href="./AdminProducts.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#inventoryCollapseDesktop" role="button"
                        aria-expanded="false" aria-controls="inventoryCollapseDesktop">
                        Inventory
                    </a>
                    <div class="collapse ps-3" id="inventoryCollapseDesktop">
                        <ul class="list-unstyled mb-0">
                            <li><a class="nav-link" href="./addCategory.php">Add Category</a></li>
                            <li><a class="nav-link" href="./AdminAddProductForm.php">Add Product</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Customize Cake</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Feedbacks</a></li>
                <li class="nav-item"><a class="nav-link" href="./AdminProfile.php">Profile</a></li>
            </ul>
        </div>
    </div>

    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        const currentPage = window.location.pathname.split("/").pop();
        const desktopNavLinks = document.querySelectorAll(".d-md-block .nav-link");

        let inventoryShouldExpand = false;

        desktopNavLinks.forEach(link => {
            const linkPage = link.getAttribute("href");

            if (!linkPage || linkPage === "#") return;

            if (linkPage.endsWith(currentPage)) {
                link.classList.add("active");

                // Check if it's inside the inventory menu
                if (link.closest("#inventoryCollapseDesktop")) {
                    inventoryShouldExpand = true;
                }
            } else {
                link.classList.remove("active");
            }
        });

        if (inventoryShouldExpand) {
            const inventoryCollapse = document.getElementById("inventoryCollapseDesktop");
            const inventoryToggle = document.querySelector('a[href="#inventoryCollapseDesktop"]');

            inventoryCollapse.classList.add("show");
            inventoryToggle.classList.add("active");
        }
    </script>

</body>

</html>