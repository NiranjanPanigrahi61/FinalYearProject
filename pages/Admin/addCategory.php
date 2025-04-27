<?php
include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .category_add_block {
            margin-top: 180px;
            padding: 20px;
        }

        .form-control:focus {
            border-color: #D02964;
            box-shadow: 0 0 5px rgba(242, 11, 92, 0.5);
        }

        .btn:hover {
            background-color: #ED555A !important;
            border-color: #b02454 !important;
        }
    </style>
</head>

<body>
    <div class="container mx-auto category_add_block">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6"> <!-- 100% on mobile, 50% on desktop -->
                <!-- Add enctype="multipart/form-data" to allow file upload -->
                <form method="POST" action="../../dbfunctions/addcategoryfn.php" enctype="multipart/form-data" class="border p-4 rounded shadow" id="addCategoryForm">
                    <h4 class="mb-4 text-center">Add New Category</h4>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Category Name" required>
                        <label for="category">Enter New Category</label>
                    </div>

                    <!-- ADD THIS HIDDEN INPUT -->
                    <input type="hidden" name="addcategory" value="1">

                    <!-- New image upload field -->
                    <div class="mb-3">
                        <label for="category_image" class="form-label">Upload Category Image</label>
                        <input class="form-control" type="file" id="category_image" name="category_image" accept="image/*" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="addcategory" class="btn text-white" style="background-color: #D02964;">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./../../JQuery/jquery-3.7.1.js"></script>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Stop the form immediately

            Swal.fire({
                title: 'Uploading...',
                text: 'Please wait while we upload your image.',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading(); // Show loading spinner
                }
            });

            // After showing uploading, actually submit the form
            setTimeout(() => {
                this.submit();
            }, 500);
        });
    </script>
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Category Added Successfully.',
                icon: 'success',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear form
                    document.getElementById('addCategoryForm').reset();
                }
            });

            // Remove ?success=1 from URL after showing
            if (window.history.replaceState) {
                const url = new URL(window.location);
                url.searchParams.delete('success');
                window.history.replaceState({}, document.title, url.pathname);
            }
        </script>
    <?php endif; ?>
</body>

</html>