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
    <title>Document</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <ul class="navbar-nav">
                <?php foreach ($categories as $cat) { ?>
                    <li class="nav-item mx-2">
                        <a class="nav-link <?php echo ($tid === $cat) ? 'active fw-bold prod-nav' : ''; ?>"
                            href="./productPage.php?id=<?php echo $cat; ?>">
                            <?php echo ucfirst($cat); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <a href="javascript:history.back()" class="text-decoration-none text-secondary ms-auto">← Back</a>
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
                            <div class="col-md-7">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title mb-2"><?php echo $row['product_name'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">₹<?php echo $row['price'] ?></h6>
                                    <p class="card-text"><?php echo $row['description'] ?></p>

                                    <?php if ($table == "cake") { ?>
                                        <p class="card-text"><strong>Size:</strong> <?php echo $row['size'] ?></p>
                                        <p class="card-text"><strong>Weight:</strong> <?php echo $row['weight'] ?></p>
                                    <?php } ?>

                                    <!-- Quantity Selector -->
                                    <div class="quantity-selector mt-3 mb-5 col-4">
                                        <label for="quantity" class="form-label">Quantity:</label>
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary" type="button" onclick="decreaseQuantity()">-</button>
                                            <input type="text" id="quantity" class="form-control text-center" value="1" min="1" onchange="updateQuantity()" />
                                            <button class="btn btn-outline-secondary" type="button" onclick="increaseQuantity()">+</button>
                                        </div>
                                    </div>

                                    <!-- Buttons Section -->
                                    <div class="mt-auto d-flex flex-column gap-2">
                                        <a href="./buyNow.php?tid=<?php echo $table; ?>&id=<?php echo $id; ?>&quantity=" class="btn btn-warning" id="buyNowBtn">Buy Now</a>
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

    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        // Update the quantity when the user changes the input value
        function updateQuantity() {
            const quantity = document.getElementById('quantity').value;
            document.getElementById('buyNowBtn').href = `./buyNow.php?tid=<?php echo $table; ?>&id=<?php echo $id; ?>&quantity=${quantity}`;
        }

        // Decrease quantity
        function decreaseQuantity() {
            let quantity = document.getElementById('quantity').value;
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').value = quantity;
                updateQuantity();
            }
        }

        // Increase quantity
        function increaseQuantity() {
            let quantity = document.getElementById('quantity').value;
            quantity++;
            document.getElementById('quantity').value = quantity;
            updateQuantity();
        }
    </script>

</body>

</html>

<?php
include_once "../component/footer.php";
?>