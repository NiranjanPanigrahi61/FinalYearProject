<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon Bakery Admin Dashboard</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .nav-link {
            transition: background 0.3s, color 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background: #FC8F59;
            color: white;
            border-radius: 5px;
        }
        #sidebar {
            background-color: #D02964 !important;
            color: white !important;
        }
        .btn{
            background-color: #D02964;
            color: white;
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
    <div class="container-fluid">
        <div class="d-flex d-md-none justify-content-between align-items-center bg-white p-3  rounded">
            <button class="btn me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" title="Toggle Sidebar">
                <i class="fa fa-bars"></i>
            </button>
            <div class="input-group" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Search...">
                <button class="btn btn-light" title="Search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="row">
            <nav class="col-md-2 offcanvas-md offcanvas-start bg-white p-3  vh-100" id="sidebar">
                <h4 class="text-center mb-5">Silicon Baking</h4>
                <ul class="nav flex-column" >
                    <li class="nav-item"><a href="#" class="nav-link active text-white">Dashboard</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Menu</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Order</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Customize Cake Order</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Reviews</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white">Complaints</a></li>
                    <li class="nav-item my-auto"><a href="#" class="nav-link text-white">Profile</a></li>
                </ul>
            </nav>
            <main class="col-md-10 p-0">
                <div class="d-none d-md-flex justify-content-between align-items-center p-3  rounded-end w-100 " style="background-color: #D02964;">
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn btn-light" title="Search"><i class="fa fa-search"></i></button>
                    </div>
                    <button class="btn text-white" style="background-color: #FC8F59;">Add Category</button>
                </div>
            </main>
        </div>
    </div>
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>