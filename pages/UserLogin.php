<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/FinalYearProject/FinalYearProject/config.php";
include_once "./../component/user_nav.php";
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
    .form-control:focus {
      border-color: #D02964;
      box-shadow: 0 0 5px rgba(242, 11, 92, 0.5);
    }
    .btn:hover {
      background-color: #ED555A !important;
      border-color: #b02454 !important;
    }
    .login-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
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
                                <img src="../assets/login.jpg" alt="User Login" class="img-fluid w-100 h-100" style="object-fit: cover;">
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
    
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous">
    </script>


    <script>
        document.getElementById("userLoginForm").addEventListener("submit", function(event) {
        event.preventDefault();
        
        var email = document.getElementById("user-email").value;
        var password = document.getElementById("user-password").value;
        var emailError = document.getElementById("userEmailError");
        var passwordError = document.getElementById("userPasswordError");
        var serverError = document.getElementById("serverError");
        
        emailError.textContent = "";
        passwordError.textContent = "";
        serverError.textContent = "";
        
        var valid = true;
        
        var emailPattern = /^[a-zA-Z0-9_.]{3,}@[a-zA-Z.]{3,12}.[a-zA-Z]{2,5}$/;
        if (!emailPattern.test(email)) {
            emailError.textContent = "Please enter a valid email address.";
            valid = false;
        }
        
        if (password.length < 6) {
            passwordError.textContent = "Password must be at least 6 characters long.";
            valid = false;
        }
        
        if (!valid) return;
        
        $.ajax({
            url: "../dbfunctions/userdbfunctions.php", // PHP script to handle the request
            type: "POST",
            data: {
                "email": email,
                "password": password
            },
            success: function(data) {
                console.log(`${email}`);
                
                let response = JSON.parse(data);
                if (response.success) {
                    
                    $(location).attr("href", "home.php");
                } else {
                    serverError.textContent = response.message;
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                console.log("XHR Response:", xhr.responseText);
                console.log("Status:", status);
                serverError.textContent = "An error occurred. Please try again later.";
            }
        });
    });

    </script>
    
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
    <!-- Add this line right before your closing </body> tag in UserLogin.php -->
    <script src="otp_login.js"></script>
</body>
</html>
<?php
include_once "./../component/footer.php";
?> 

