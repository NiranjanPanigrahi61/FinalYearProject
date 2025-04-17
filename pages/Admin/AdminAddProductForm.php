<?php
require_once "../../dbfunctions/adminfunctions.php";

include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";

$data = showItems();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">

    <style>
        .product-form {
            position: fixed;
            margin-top: 110px;
            margin-left: 275px;
            height: 600px;
            width: 1200px;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .product-form {
                margin-left: 0;
                margin-top: 86px;
                width: 100%;
            }
        }

        .form-control:focus,
        select.form-control:focus,
        textarea.form-control:focus {
            box-shadow: 0 0 8px 2px rgba(0, 123, 255, 0.7);
            border-color: #80bdff;
            outline: none;
        }

        .textarea-css {
            height: 150px !important;
            resize: none;
        }
    </style>
</head>

<body>
    <div class="container product-form ">
        <div class="row">
            <div class="col">
                <h3 class="">Add Product</h3>
                <p id="msg"></p>
                <form action="" method="post" enctype="multipart/form-data" class="w-75">
                    <div class="form-floating mb-3 border-0 ">
                        <input type="file" name="productimg" placeholder="" class="form-control mb-3">
                        <label for="productimg">Add Product Image</label>
                    </div>
                    <div class="form-floating mb-3 border-0 ">
                        <select name="productname" class="form-control mb-3">
                            <option value="">__Product__</option>
                            <?php
                            if ($data) {
                                while ($res = $data->fetch_assoc()) {
                                    if ($res['status'] == "active") {
                            ?>
                                        <option value="<?php echo $res['table_name'] ?>"><?php echo $res['name']; ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3 border-0 ">
                        <input type="text" name="name" placeholder="" class="form-control mb-3">
                        <label for="name">Product Name</label>
                    </div>
                    <div class="form-floating mb-3 border-0 ">
                        <input type="text" name="price" placeholder="" class="form-control mb-3">
                        <label for="price">Price</label>
                    </div>
                    <div class="form-floating mb-3 border-0 ">
                        <input type="text" name="quantity" placeholder="" class="form-control mb-3">
                        <label for="quantity">Quantity</label>
                    </div>
                    <div id="extraFields" style="display: none;">
                        <div class="form-floating mb-3">
                            <input type="text" name="weight" class="form-control" placeholder="Weight (e.g., 500g)">
                            <label for="weight">Weight</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="size" class="form-control" placeholder="Size (e.g., Medium)">
                            <label for="size">Size</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3 border-0 ">
                        <textarea name="description" placeholder="" class="form-control textarea-css"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <input type="submit" name="addProduct" value="Addproduct"
                        class="btn btn-primary d-block mx-auto border-0  w-25">
                </form>
            </div>
        </div>
    </div>

    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('select[name="productname"]').on('change', function() {
                if ($(this).val() === 'cake') {
                    $('#extraFields').slideDown();
                } else {
                    $('#extraFields').slideUp();
                }
            });
        });

        $(document).ready(function() {
            $('select[name="productname"]').on('change', function() {
                if ($(this).val() === 'cake') {
                    $('#extraFields').slideDown();
                } else {
                    $('#extraFields').slideUp();
                }
            });

            $('form').on('submit', function(e) {
                e.preventDefault();

                let isValid = true;
                let msg = '';

                const img = $('input[name="productimg"]').val();
                const productname = $('select[name="productname"]').val();
                const name = $('input[name="name"]').val().trim();
                const price = $('input[name="price"]').val().trim();
                const quantity = $('input[name="quantity"]').val().trim();
                const weight = $('input[name="weight"]').val().trim();
                const size = $('input[name="size"]').val().trim();
                const description = $('textarea[name="description"]').val().trim();

                if (!img) {
                    msg += 'Please upload a product image.<br>';
                    isValid = false;
                }

                if (!productname) {
                    msg += 'Please select a product category.<br>';
                    isValid = false;
                }

                if (!name) {
                    msg += 'Product name is .<br>';
                    isValid = false;
                }

                if (!price || isNaN(price)) {
                    msg += 'Enter a valid numeric price.<br>';
                    isValid = false;
                }

                if (!quantity || isNaN(quantity)) {
                    msg += 'Enter a valid numeric quantity.<br>';
                    isValid = false;
                }
                
                if (productname === 'cake') {
                    if (!weight) {
                        msg += 'Weight is required for cake.<br>';
                        isValid = false;
                    }
                    if (!size) {
                        msg += 'Size is required for cake.<br>';
                        isValid = false;
                    }
                }

                if (!description) {
                    msg += 'Description is .<br>';
                    isValid = false;
                }

                if (!isValid) {
                    $('#msg').html('<div class="alert alert-danger w-75">' + msg + '</div>');
                    return;
                }
                const formData = new FormData(this); // include file and other fields

                $.ajax({
                    url: '../../dbfunctions/AdminAddProduct.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#msg').html('<div class="alert alert-info w-75">Uploading...</div>');
                    },
                    success: function(response) {
                        console.log(response);
                        
                    },
                    error: function(xhr, status, error) {
                        $('#msg').html('<div class="alert alert-danger w-75">Error: ' + xhr.responseText + '</div>');
                    }
                });
            });
        });
    </script>
</body>

</html>