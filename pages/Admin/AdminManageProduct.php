<?php
session_start();
if (!isset($_SESSION["loggedin"])){
    header("location:AdminLogin.php");
    exit();
}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.3/dist/sweetalert2.all.min.js"></script>

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

        .modal-backdrop {
            z-index: 1040 !important;
            /* Ensure backdrop stays behind modal content */
        }

        .modal-content {
            position: relative;
            z-index: 1050 !important;
            /* Ensure modal content stays in front */
        }
    </style>
</head>

<body>
    <div class="container product-manage-block ps-3 pe-3">
        <h1>Hello</h1>

        <!-- Search Box and a -->
        <div class="d-flex mb-3 justify-content-between align-items-center">
            <!-- Search Section -->
            <div class="d-flex w-75">
                <!-- Search input field -->
                <input type="text" id="liveSearch" class="form-control" placeholder="Search for product..." />

                <!-- Search button with icon -->
                <a class="btn btn-primary d-flex align-items-center ms-2" id="btnSearch">
                    <i class="fas fa-search me-2"></i> Search
                </a>
            </div>

            <!-- Back Button -->
            <a href="javascript:history.back()" class="btn btn-secondary ms-2">
                Back
            </a>
        </div>

        <!-- Message for no results -->
        <div id="noResultsMessage" class="no-results" style="display:none;">No results found.</div>

        <?php
        if ($data) {
        ?>
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
                                    <button class="btn btn-update" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="fillUpdateModal(
                                            '<?php echo $result['id']; ?>',
                                            '<?php echo $result['product_name']; ?>',
                                            '<?php echo $result['price']; ?>',
                                            '<?php echo $result['quantity']; ?>',
                                            '<?php echo htmlspecialchars($result['description'], ENT_QUOTES); ?>',
                                            '<?php echo isset($result['weight']) ? $result['weight'] : ''; ?>',
                                            '<?php echo isset($result['size']) ? $result['size'] : ''; ?>'
                                        )">
                                        Update
                                    </button>

                                    <a href="../../dbfunctions/removeProduct.php?id=<?php echo $result['id']; ?>&name=<?php echo $id; ?>"
                                        class="btn btn-remove">Remove</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h1 class="text-danger">There is NO Product avilable.</h1>
        <?php
        }
        ?>
    </div>
    <!-- Modal For Update -->
    <div id="updateModal" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="updateForm">
                        <input type="hidden" name="id" id="updateProductId">

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="updateProductName">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="updatePrice">
                        </div>

                        <?php if ($id == "cake") { ?>
                            <div class="mb-3" id="weightField">
                                <label class="form-label">Weight</label>
                                <input type="text" class="form-control" name="weight" id="updateWeight">
                            </div>

                            <div class="mb-3" id="sizeField">
                                <label class="form-label">Size</label>
                                <input type="text" class="form-control" name="size" id="updateSize">
                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="updateQuantity">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="updateDescription" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>

    <script>
        function fillUpdateModal(id, productName, price, quantity, description, weight = '', size = '') {
            $('#updateProductId').val(id);
            $('#updateProductName').val(productName);
            $('#updatePrice').val(price);
            $('#updateQuantity').val(quantity);
            $('#updateDescription').val(description);

            // Only fill weight and size if the fields exist
            if ($('#updateWeight').length) {
                $('#updateWeight').val(weight);
            }
            if ($('#updateSize').length) {
                $('#updateSize').val(size);
            }

            originalData = {
                product_name: productName,
                price: price,
                quantity: quantity,
                description: description,
                weight: weight,
                size: size
            };
        }

        // Function to filter the table rows based on the search term
        function filterTable(searchValue) {
            let rowsFound = false;
            $('#productTableBody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
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
            let value = $(this).val().toLowerCase();
            filterTable(value); // Call the function to filter rows based on input
        });

        // a search functionality
        $('#btnSearch').on('click', function() {
            let value = $('#liveSearch').val().toLowerCase();
            filterTable(value); // Call the function to filter rows based on a search
        });
        // search End

        // Handle form submit with AJAX
        $('#updateForm').submit(function(e) {
            e.preventDefault(); // Prevent normal form submission

            let currentData = {
                product_name: $('#updateProductName').val(),
                price: $('#updatePrice').val(),
                quantity: $('#updateQuantity').val(),
                description: $('#updateDescription').val(),
                weight: $('#updateWeight').length ? $('#updateWeight').val() : '',
                size: $('#updateSize').length ? $('#updateSize').val() : ''
            };

            // Compare originalData with currentData
            let changesMade = false;
            for (let key in currentData) {
                if (currentData[key] != originalData[key]) {
                    changesMade = true;
                    break;
                }
            }

            if (!changesMade) {
                // No changes made, show a SweetAlert
                Swal.fire({
                    title: 'No Changes',
                    text: 'You have not made any changes.',
                    icon: 'info',
                    confirmButtonColor: '#D02964',
                    background: '#f0f0f0',
                    color: '#333'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#updateModal').modal('hide');
                        $('#liveSearch').val('');
                        location.reload(); // Reload only after user clicks OK
                    }
                });
                return; // Stop form submission
            }

            // If changes detected, then proceed to submit
            let urlParams = new URLSearchParams(window.location.search);
            let tableName = urlParams.get('id');

            let formData = {
                id: $('#updateProductId').val(),
                table_name: tableName,
                ...currentData // Spread operator to include all fields
            };

            $.ajax({
                url: '../../dbfunctions/updateProduct.php', // New PHP file
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.trim() === "success") {
                        // Close Modal
                        $('#updateModal').modal('hide');

                        // Show a modern sweet alert instead of old alert()
                        Swal.fire({
                                title: 'Success!',
                                text: 'Your product has been updated!',
                                icon: 'success',
                                iconColor: '#00a65a', // nice green color for tick
                                confirmButtonColor: '#D02964',
                                background: '#f0f0f0',
                                color: '#333'
                            })
                            .then(function() {
                                location.reload(); // Reload after user clicks OK
                            });
                    } else {
                        Swal.fire('Error', 'Failed to update product. Please try again.', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while updating.');
                }
            });
            Swal.fire({
                title: 'Success!',
                text: 'Your product has been updated!',
                icon: 'success',
                iconColor: '#000', // custom tick color (green)
                confirmButtonColor: '#3085d6', // button color (blue)
                cancelButtonColor: '#d33', // if you have a cancel button
                background: '#f0f0f0', // background color (optional)
                color: '#333', // text color
            })
        });
    </script>
</body>

</html>