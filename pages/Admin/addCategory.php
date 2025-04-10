<?php
include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .category_add_block{
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
            <form method="POST" action="../../dbfunctions/addcategoryfn.php" class="border p-4 rounded shadow">
                <h4 class="mb-4 text-center">Add New Category</h4>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Category Name" required>
                    <label for="category">Enter New Category</label>
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
</body>

</html>