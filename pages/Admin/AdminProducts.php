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
        
        .glow {
            box-shadow: 0 0 15px 4px #ED555A !important;
            transition: box-shadow 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="container product-block p-3">
        <div class="form-floating mb-3 w-75">
            <input type="text" id="searchInput" class="form-control" placeholder="Search product name..." />
            <label for="searchInput">Search product name...</label>
        </div>

        <div class="row g-2" id="productRow">
            <?php
            if ($data) {
                $stat = false;
                while ($res = $data->fetch_assoc()) {
                    if ($res['status'] == "active") {
                        $stat = true;
                        ?>
                        <div class="col-md-4 product-card">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php //echo $res['table_image']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $res['name']; ?></h5>
                                    <a href="#" class="btn mx-auto d-block">Manage</a>
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
    </div>
    </div>


    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        // Live search that highlights matching cards with glow effect
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');

            cards.forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                card.querySelector('.card').classList.remove('glow');

                if (searchTerm && title.includes(searchTerm)) {
                    card.querySelector('.card').classList.add('glow');
                }
            });
        });
    </script>
</body>

</html>