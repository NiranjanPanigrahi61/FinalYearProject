<?php
include_once "../component/user_nav.php";
require_once "../dbfunctions/productPagefunctions.php";
$table = $_GET['tid'];
$id = $_GET['id'];

$data = productDetail($table, $id);
$categories = category();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Detail</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .btn {
            background-color: #D02964 !important;
            color: white !important;
        }

        .btn:hover {
            background-color: #ED555A !important;
            border-color: #b02454 !important;
        }

        .quantity-selector input {
            width: 60px;
            text-align: center;
        }

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

        .product-card {
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .product-description {
            flex-grow: 1;
            /* Allows description to expand if needed */
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card h5 {
            font-size: 18px;
            font-weight: bold;
            overflow: hidden;
            white-space: nowrap;
            /* Prevents text from wrapping */
            text-overflow: ellipsis;
            /* Adds ellipsis (...) when text overflows */
            display: -webkit-box;
            /* Creates a flexible box layout */
            -webkit-box-orient: horizontal;
            /* Specifies the box's orientation to horizontal */
            -webkit-line-clamp: 1;
            /* Truncate text to one line */
            max-width: 100%;
            /* Ensures the width doesn't exceed the container */
        }

        .product-card h5 span {
            display: inline-block;
            max-width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .swiper {
            padding: 20px 0;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #ffffff;
            /* white color */
            top: 50%;
            width: 40px;
            height: 40px;
            margin-top: -20px;
            background-color: #ED555A;
            /* Optional: dark background for visibility */
            border-radius: 50%;
            z-index: 10;
        }

        .swiper-pagination-bullet-active {
            background-color: #ED555A;
            /* Active dot color */
        }

        .swiper-pagination {
            margin-top: 50px !important;
            /* Adjust the value as needed */
        }

        .swiper-button-prev {
            left: -25px;
            /* push outside left of carousel */
        }

        .swiper-button-next {
            right: -25px;
            /* push outside right of carousel */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#productNavbar"
                aria-controls="productNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="productNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($categories as $cat) { ?>
                        <li class="nav-item mx-2">
                            <a class="nav-link <?php echo ($id === $cat) ? 'active fw-bold prod-nav' : ''; ?>"
                                href="./productPage.php?id=<?php echo $cat; ?>">
                                <?php echo ucfirst($cat); ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <a href="javascript:history.back()" class="text-decoration-none text-secondary">← Back</a>
            </div>
        </div>
    </nav>

    <?php if ($data) {
        $row = $data->fetch_assoc();
    ?>
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-10 col-xxl-9">
                    <div class="card shadow mx-auto d-flex flex-column">
                        <div class="row g-0 flex-column flex-md-row">
                            <div class="col-md-5">
                                <img src="<?php echo $row['image'] ?>" class="img-fluid w-100 h-100 rounded-start object-fit-cover" alt="<?php echo $row['product_name'] ?>">
                            </div>
                            <div class="col-md-7 d-flex flex-row">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title mb-2"><?php echo $row['product_name'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">₹<?php echo $row['price'] ?></h6>
                                    <p class="card-text"><?php echo $row['description'] ?></p>

                                    <?php if ($table == "cake") { ?>
                                        <p class="card-text"><strong>Size:</strong> <?php echo $row['size'] ?></p>
                                        <p class="card-text"><strong>Weight:</strong> <?php echo $row['weight'] ?></p>
                                    <?php } ?>

                                    <div class="mt-auto d-flex flex-column gap-2">
                                        <a href="#" class="btn btn-warning" id="buyNowBtn" data-id="<?php echo $row['id']; ?>" data-table="<?php echo $table; ?>">Add to Cart</a>

                                        <?php if ($table == "cake") { ?>
                                            <a href="./customizeCake.php?id=<?php echo $id; ?>" class="btn btn-outline-warning">Customization</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <?php
    $related = relatedProduct($table);
    if ($related) {
    ?>
        <div class="container my-5">
            <h3>Related Products</h3>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper" style="margin-bottom: 12px;">
                    <?php while ($row = $related->fetch_assoc()) { ?>
                        <div class="swiper-slide">
                            <div class="card product-card h-100">
                                <img src="<?php echo $row['image'] ?>" class="product-img card-img-top" alt="<?php echo $row['product_name'] ?>">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">₹<?php echo $row['price']; ?></h6>
                                    <p class="product-description"><?php echo $row['description']; ?></p>
                                    <?php if ($table == "cake") { ?>
                                        <p class="card-text"><strong>Size:</strong> <?php echo $row['size']; ?></p>
                                        <p class="card-text"><strong>Weight:</strong> <?php echo $row['weight']; ?></p>
                                    <?php } ?>
                                    <a href="./productDetailPage.php?tid=<?php echo $table ?>&id=<?php echo $row['id'] ?>" class="btn btn-warning ms-auto mt-auto">View</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../JQuery/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Swiper init with autoplay
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 20,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000, // Slide every 3 seconds (you can adjust the timing)
                disableOnInteraction: false, // Keep autoplay even after user interaction
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                576: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 4
                },
            }
        });

        $('#buyNowBtn').on('click', function(e) {
            e.preventDefault(); // Prevent default anchor behavior

            let productId = $(this).data('id');
            let table = $(this).data('table');

            $.ajax({
                url: '../dbfunctions/addToCart.php',
                type: 'POST',
                data: {
                    id: productId,
                    tid: table,
                },
                success: function(response) {
                    response = JSON.parse(response);
                    
                    if (response.success) {
                        $('#cart-count').text(response.cart_count);
                        Swal.fire({
                            title: 'Added to Cart!',
                            text: 'Your item has been added successfully.',
                            icon: 'success',
                            confirmButtonColor: '#D02964',
                            timer: 1500,
                            showConfirmButton: false,
                            toast: true,
                            position: 'center'
                        });
                    }else{
                        
                    }
                },
                error: function() {
                    alert("Failed to add item to cart.");
                }
            });
        });
    </script>

</body>

</html>

<?php include_once "../component/footer.php"; ?>