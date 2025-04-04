<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon Bakery Admin Dashboard</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-control:focus{
            border-color: #D02964 !important;
            box-shadow: 0 0 5px rgba(242, 11, 92, 0.5) !important;
        }
        .btn:hover {
            background-color: #ED555A !important;
            border-color: #b02454 !important;
        }
        .input-group{
            margin-left: 80px;
        }
        .navbar{
            top: 0px;
        }
    </style>
</head>

<body>
    <nav class="navbar p-4 position-fixed w-100" style="background-color: #D02964;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center ms-3 ms-md-0 flex-grow-1">
                <h4 class="text-center text-white">Silicon Baking</h4>
                <div class="input-group" style="max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-light" title="Search"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <button class="btn text-white d-none d-md-block" style="background-color: #FC8F59 !important;">Add New Items</button>
        </div>
    </nav>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>