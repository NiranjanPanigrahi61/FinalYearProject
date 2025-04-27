<?php
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
            position: fixed;
            margin-top: 110px;
            margin-left: 275px;
            height: 600px;
            width: 1200px;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .product-block {
                margin-left: 0;
                margin-top: 86px;
                width: 100%;
            }
        }

        .card {
            width: 350px !important;
        }

        .glow {
            box-shadow: 0 0 15px 4px #ED555A !important;
            transition: box-shadow 0.3s ease-in-out;
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

        <div class="row g-3" id="productRow">
            <?php
            if ($data) {
                $stat = false;
                while ($res = $data->fetch_assoc()) {
                    if ($res['status'] == "active") {
                        $stat = true;
            ?>
                        <div class="col-md-4 product-card">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo $res['table_img'];?>" class="card-img-top" alt="<?php echo $res['name']."_img";?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $res['name']; ?></h5>
                                    <a href="./AdminManageProduct.php?id=<?php echo $res['table_name']?>" class="btn mx-auto d-block">Manage</a>
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