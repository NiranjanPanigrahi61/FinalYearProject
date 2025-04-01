<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #D02964;
        }

        .login-image {
            background: url('admin-image.png') no-repeat center center;
            background-size: cover;
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
    <div class="d-flex align-items-center justify-content-center vh-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card overflow-hidden shadow-sm border-0 rounded-3">
                        <div class="row g-0">
                            <div class="col-md-6 d-none d-md-block login-image">
                                <!-- image -->
                            </div>
                            <div class="col-md-6 p-4">
                                <h3 class="text-center mb-4" style="color: #D02964;">Admin Login</h3>
                                <form id="adminLoginForm" method="POST">
                                    <div class="mb-3">
                                        <label for="admin-email" class="form-label">Admin Email</label>
                                        <input type="email" class="form-control" id="admin-email" name="email"
                                            placeholder="Enter email">
                                        <div class="text-danger" id="adminEmailError"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="admin-password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="admin-password" name="password"
                                            placeholder="Enter password">
                                        <div class="text-danger" id="adminPasswordError"></div>
                                    </div>
                                    <div class="text-end mb-3">
                                        <a href="#" style="color: #D02964;">Forgot password?</a>
                                    </div>
                                    <div class="text-danger text-center mt-3" id="serverError"></div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn text-white"
                                            style="background-color: #D02964;">Sign in</button>
                                    </div>
                                    <div class="text-center mt-3 d-flex justify-content-evenly">
                                        <a href="javascript:history.back()" style="color: #D02964; text-decoration: none;">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./../../JQuery/jquery-3.7.1.js"></script>

    <script>
        document.getElementById("adminLoginForm").addEventListener("submit", function (event) {
            event.preventDefault();
            let email = document.getElementById("admin-email").value;
            let password = document.getElementById("admin-password").value;
            let emailError = document.getElementById("adminEmailError");
            let passwordError = document.getElementById("adminPasswordError");
            let serverError = document.getElementById("serverError");
            let isValid = true;

            emailError.innerText = "";
            passwordError.innerText = "";
            serverError.innerText = "";

            if (!email.match(/^[a-zA-Z0-9_.]{3,}@[a-zA-Z.]{3,12}.[a-zA-Z]{2,5}$/)) {
                emailError.innerText = "Please enter a valid email address.";
                isValid = false;
            }
            if (password.length < 6) {
                passwordError.innerText = "Password must be at least 6 characters long.";
                isValid = false;
            }

            if (isValid) {
                $.ajax({
                    url: "../../dbfunctions/adminloginfunctions.php",
                    type: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        if(data){
                            window.location.href="./AdminDashboard.php";
                        }else{
                            serverError.textContent="Invalid Admin";
                        }                     
                    },
                    error: function(xhr, status, error) {
                        serverError.innerText = "An error occurred. Please try again later.";
                    }
                });
            }
        });
    </script>

    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>