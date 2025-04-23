<?php
require_once "../../dbfunctions/adminfunctions.php";

include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";

$id = $_GET['id'];
$data = manageProduct($id);
?>

<!DOCTYPE html>
<html lang="en">
<!--  -->

<head>
    <title>Document</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-manage-block {
            position: fixed;
            margin-top: 110px;
            margin-left: 275px;
            height: 600px;
            width: 1150px;
            overflow-y: auto;
        }

        @media (max-width: 768px) {
            .product-manage-block {
                margin-left: 0;
                margin-top: 86px;
                width: 100%;
            }
        }

        .product-image {
            width: 90px;
            height: 60px;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .highlight {
            background-color: yellow !important;
        }

        .no-results {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container product-manage-block ps-3 pe-3">
        <h1>Hello</h1>

        <!-- Search Box and a -->
        <div class="d-flex mb-3">
            <!-- Search input field -->
            <input type="text" id="liveSearch" class="form-control w-75" placeholder="Search for product..." />

            <!-- Search a with icon -->
            <a class="btn btn-primary d-flex align-items-center ms-2" id="btnSearch">
                <i class="fas fa-search me-2"></i>
            </a>
        </div>

        <!-- Message for no results -->
        <div id="noResultsMessage" class="no-results" style="display:none;">No results found.</div>

        <table class="table table-bordered">
            <thead>
                <?php if ($id == "cake") { ?>
                    <tr>
                        <th>N.o.</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th>N.o.</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Added On</th>
                        <th>Action</th>
                    </tr>
                <?php } ?>
            </thead>
            <tbody id="productTableBody">
                <?php
                $slNo = 1;
                while ($result = $data->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $slNo++; ?></td>
                        <td><img src="<?php echo $result['image']; ?>" alt="<?php echo $result['product_name']; ?>"
                                class="rounded-circle img-fluid product-image"></td>
                        <td><?php echo $result['product_name']; ?></td>
                        <td><?php echo $result['price']; ?></td>
                        <?php if ($id == "cake") {
                        ?>
                            <td><?php echo $result['weight']; ?></td>
                            <td><?php echo $result['size']; ?></td>
                        <?php } ?>
                        <td><?php echo $result['quantity']; ?></td>
                        <td><?php echo $result['description']; ?></td>
                        <td><?php echo $result['created_at']; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="../../dbfunctions/updateProduct.php?id=<?php echo $result['id']; ?>" class="btn btn-update">Update</a>
                                <a href="../../dbfunctions/removeProduct.php?id=<?php echo $result['id']; ?>" class="btn btn-remove">Remove</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {

            // Function to filter the table rows based on the search term
            function filterTable(searchValue) {
                let rowsFound = false;
                $('#productTableBody tr').each(function() {
                    var rowText = $(this).text().toLowerCase();
                    if (rowText.indexOf(searchValue) > -1) {
                        $(this).show(); // Show matching rows
                        rowsFound = true;
                    } else {
                        $(this).hide(); // Hide non-matching rows
                    }
                });

                // Show no results message if no matches
                if (!rowsFound) {
                    $('#noResultsMessage').show();
                } else {
                    $('#noResultsMessage').hide();
                }
            }

            // Live search functionality
            $('#liveSearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                filterTable(value); // Call the function to filter rows based on input
            });

            // a search functionality
            $('#btnSearch').on('click', function() {
                var value = $('#liveSearch').val().toLowerCase();
                filterTable(value); // Call the function to filter rows based on a search
            });

            $('.btn-update').on('click', function(e) {
                e.preventDefault(); // Prevent default anchor behavior
                var url = $(this).data('url');

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        alert("Product updated: " + response);
                        // Optional: reload or update the UI
                    },
                    error: function() {
                        alert("Error while updating.");
                    }
                });
            });

            // Intercept Remove click
            $('.btn-remove').on('click', function(e) {
                e.preventDefault();
                var url = $(this).data('url');

                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            alert("Product removed: " + response);
                            // Optional: remove the row from the DOM
                            // $(e.target).closest('tr').remove();
                        },
                        error: function() {
                            alert("Error while removing.");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>