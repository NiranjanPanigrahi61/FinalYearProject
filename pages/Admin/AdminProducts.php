<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:AdminLogin.php");
    exit();
}
require_once "../../dbfunctions/adminfunctions.php";

include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";

$data = showproduct();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Grid</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-block {
            width: 1200px;
            position: fixed;
            top: 110px;
            left: 275px;
            right: 0;
            bottom: 0;
            overflow: hidden;
            padding: 20px;
            background-color: #f8f9fa;
            max-height: calc(100vh - 150px);
            /* adjust height as needed */
            overflow-y: auto;
            padding-right: 10px;
        }

        @media (max-width: 768px) {
            .product-block {
                top: 86px;
                left: 0;
            }
        }

        .card {
            width: 350px !important;
        }

        .glow {
            box-shadow: 0 0 15px 4px #ED555A !important;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card.fixed-card {
            width: 100%;
            max-width: 320px;
            height: 420px;
            margin: auto;
        }

        .card-img-top.fixed-img {
            height: 200px;
            object-fit: cover;
        }

        .glow {
            box-shadow: 0 0 15px 4px #ED555A !important;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card-img-top.fixed-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container product-block p-5">
        <div class="input-group mb-3 w-75 ms-0">
            <div class="form-floating flex-grow-1">
                <input type="text" id="searchInput" class="form-control" placeholder="Search product name...">
                <label for="searchInput">Search product name...</label>
            </div>
            <button class="btn btn-danger" id="searchBtn" type="button">Search</button>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="productRow">
            <?php
            if ($data) {
                $stat = false;
                while ($res = $data->fetch_assoc()) {
                    if ($res['status'] == "active") {
                        $stat = true;
            ?>
                        <div class="col product-card">
                            <div class="card h-100 d-flex flex-column">
                                <img src="<?php echo $res['table_img']; ?>" class="card-img-top fixed-img" alt="<?php echo $res['name'] . "_img"; ?>">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title"><?php echo $res['name']; ?></h5>
                                    <a href="./AdminManageProduct.php?id=<?php echo $res['table_name'] ?>" class="btn btn-danger mt-auto">Manage</a>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
                if (!$stat) {
                    echo '<h3 class="text-danger">OOPS !...There Is no products Available.</h3>';
                }
            } else {
                echo '<h3 class="text-danger">OOPS !...There Is no products Available.</h3>';
            }
            ?>
        </div>

        <div id="noResultsMsg" class="text-danger h5 mt-3" style="display: none;">
            No products matched your search.
        </div>
    </div>
    </div>


    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        function filterProducts() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');
            const noResultsMsg = document.getElementById('noResultsMsg');
            let found = false;

            cards.forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                const cardElement = card.querySelector('.card');

                if (searchTerm && title.includes(searchTerm)) {
                    card.style.display = 'block';
                    cardElement.classList.add('glow');
                    found = true;
                } else if (searchTerm) {
                    card.style.display = 'none';
                    cardElement.classList.remove('glow');
                } else {
                    // If search is empty, show all
                    card.style.display = 'block';
                    cardElement.classList.remove('glow');
                    found = true;
                }
            });

            // Show or hide the "no results" message
            if (!found && searchTerm) {
                noResultsMsg.style.display = 'block';
            } else {
                noResultsMsg.style.display = 'none';
            }
        }

        // Live search on input
        document.getElementById('searchInput').addEventListener('input', filterProducts);

        // Trigger search when button is clicked
        document.getElementById('searchBtn').addEventListener('click', filterProducts);
    </script>
</body>

</html>