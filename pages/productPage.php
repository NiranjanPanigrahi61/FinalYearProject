<?php
include_once "../component/user_nav.php";
require_once "../dbfunctions/productPagefunctions.php";

$id = $_GET['id'] ?? '';
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

// Get paginated products
$data = products($id, $limit, $offset);

// Get total count of products for this category
$totalCount = productCount($id);
$totalPages = ceil($totalCount / $limit);
$categories = category();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Page</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .product-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .product-description {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Limit to 2 lines */
            -webkit-box-orient: vertical;
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-card {
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease-in-out;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .btn {
            background-color: #D02964 !important;
            color: white !important;
        }

        .btn:hover {
            background-color: #ED555A !important;
            border-color: #b02454 !important;
        }

        .prod-nav.active {
            color: #b02454 !important;
        }

        .page-item.active .page-link {
            background-color: #D02964 !important;
            border-color: #D02964 !important;
            color: white !important;
        }

        .page-link {
            color: #D02964 !important;
        }

        .page-link:hover {
            background-color: #ED555A;
            border-color: #D02964;
            color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#productNavbar"
                aria-controls="productNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="productNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($categories as $cat) { ?>
                        <li class="nav-item mx-2">
                            <a class="nav-link <?php echo ($id === $cat) ? 'active fw-bold prod-nav' : ''; ?>"
                                href="?id=<?php echo $cat; ?>">
                                <?php echo ucfirst($cat); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <a href="javascript:history.back()" class="text-decoration-none text-secondary">← Back</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row g-3">
            <?php if (is_array($data)) {
                foreach ($data as $td) {
            ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card product-card h-100">
                            <img src="<?php echo $td['image'] ?>" class="card-img-top product-img" alt="<?php echo $td['product_name'] ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $td['product_name'] ?></h5>
                                <h6 class="card-title">₹<?php echo $td['price'] ?></h6>

                                <?php if ($td['table'] == "cake") { ?>
                                    <p class="card-text">Size: <?php echo $td['size'] ?></p>
                                    <p class="card-text">Weight: <?php echo $td['weight'] ?></p>
                                <?php } ?>

                                <p class="card-text product-description"><?php echo $td['description'] ?></p>
                                <a href="./productDetailPage.php?tid=<?php echo $td['table'] ?>&id=<?php echo $td['id'] ?>" class="btn btn-warning mt-auto ms-auto">View <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                while ($row = $data->fetch_assoc()) { ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card product-card h-100">
                            <img src="<?php echo $row['image'] ?>" class="card-img-top product-img" alt="<?php echo $row['product_name'] ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $row['product_name'] ?></h5>
                                <h6 class="card-title">₹<?php echo $row['price'] ?></h6>

                                <?php if ($id == "cake") { ?>
                                    <p class="card-text">Size: <?php echo $row['size'] ?></p>
                                    <p class="card-text">Weight: <?php echo $row['weight'] ?></p>
                                <?php } ?>

                                <p class="card-text product-description"><?php echo $row['description'] ?></p>
                                <a href="./productDetailPage.php?tid=<?php echo $id ?>&id=<?php echo $row['id'] ?>" class="btn btn-warning mt-auto ms-auto">View <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            <?php if ($totalPages > 1) { ?>
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?id=<?php echo $id; ?>&page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php }; ?>
                    </ul>
                </nav>
            <?php }; ?>
        </div>
    </div>

    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbarCollapse = document.getElementById('productNavbar');
            const navLinks = navbarCollapse.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Check if the navbar is expanded (only on small screens)
                    if (window.innerWidth < 992) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>

<?php
include_once "../component/footer.php";
?>