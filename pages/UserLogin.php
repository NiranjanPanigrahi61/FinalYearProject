<?php
// include_once $_SERVER['DOCUMENT_ROOT'] . "/FinalYearProject/FinalYearProject/config.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/FinalYearProject/FinalYearProject/component/user_nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .body {
            background-color: #E33F5C;
        }
        .login-image {
            background: url('user-image.png') no-repeat center center;
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
<body >
    <div class="body d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card overflow-hidden shadow-sm border-0 rounded-3">
                        <div class="row g-0">
                            <div class="col-md-6 d-none d-md-block login-image">
                                <!-- image -->
                            </div>
                            <div class="col-md-6 p-4">
                                <h3 class="text-center mb-4" style="color: #D02964;">User Login</h3>
                                <form id="userLoginForm" method="POST">
                                    <div class="mb-3">
                                        <label for="user-email" class="form-label">User Email</label>
                                        <input type="email" class="form-control" id="user-email" name="email" placeholder="Enter email" >
                                        <div class="text-danger" id="userEmailError"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user-password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="user-password" name="password" placeholder="Enter password" >
                                        <div class="text-danger" id="userPasswordError"></div>
                                    </div>
                                    <div class="text-end mb-3">
                                        <a href="#" style="color: #D02964;">Forgot password?</a>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn text-white" style="background-color: #D02964;">Sign in</button>
                                    </div>
                                    <div class="text-center mt-3">
                                        <span>Don't have account? </span>
                                        <a href="./UserSignUp.php" style="color: #D02964; text-decoration: none;">Sign up</a>
                                    </div>
                                </form>
                                <div class="text-danger text-center mt-3" id="serverError"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById("userLoginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let email = document.getElementById("user-email").value;
            let password = document.getElementById("user-password").value;
            let emailError = document.getElementById("userEmailError");
            let passwordError = document.getElementById("userPasswordError");
            let serverError = document.getElementById("serverError");
            let isValid = true;

            emailError.innerText = "";
            passwordError.innerText = "";
            serverError.innerText = "";

            if (!email.match(/^\S+@\S+\.\S+$/)) {
                emailError.innerText = "Please enter a valid email address.";
                isValid = false;
            }
            if (password.length < 6) {
                passwordError.innerText = "Password must be at least 6 characters long.";
                isValid = false;
            }
            
            if (isValid) {
                let formData = new FormData();
                formData.append("email", email);
                formData.append("password", password);

                fetch("user_login.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = "user_dashboard.php";
                    } else {
                        serverError.innerText = data.message;
                    }
                })
                .catch(error => {
                    serverError.innerText = "An error occurred. Please try again later.";
                });
            }
        });
    </script>
    
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include_once "./../component/footer.php";
?>
