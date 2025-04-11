<?php
include_once "./../component/user_nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link href="./../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        .body {
            background-color: #E33F5C;
        }
        .signup-container {
            display: flex;
            max-width: 900px;
            margin: 0px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-section {
            padding: 40px;
            width: 50%;
        }
        .form-control:focus {
            border-color: #D02964;
            box-shadow: 0 0 5px rgba(242, 11, 92, 0.5);
        }
        .info-section {
            width: 50%;
            background: #FC8F59;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 40px;
        }
        .btn-social {
            width: 100%;
            margin-bottom: 10px;
        }
        .btn:hover {
            background-color: #ED555A;
        }
        .error {
            color: red;
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    <div class="body">
        <div class="container p-5">
            <div class="signup-container">
                <div class="form-section">
                    <h2 class="text-center">Create an Account</h2>                    
                    <!-- User Signup Form -->
                    <form id="signupForm" method="POST" >
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                            <div class="error" id="usernameError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            <div class="error" id="emailError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                            <div class="error" id="phoneError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            <div class="error" id="passwordError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password">
                            <div class="error" id="confirmPasswordError"></div>
                        </div>
                        <div class="text-center mt-3 mb-3">
                            <div class="error" id="genericError"></div>    
                        </div>
                        <button type="submit" class="btn w-100 text-white" style="background-color: #E33F5C;">Create Account</button>
                        <div class="text-center mt-3">
                            <span>Already have account? </span>
                            <a href="./UserLogin.php" style="color: #D02964; text-decoration: none;">Sign In</a>
                        </div>
                    </form>
                </div>
                <div class="info-section">
                    <h2>Embark on a New Journey!</h2>
                    <p>Join us and explore new opportunities!</p>
                    <img src="" alt="User Illustration" class="img-fluid" style="max-width: 80%;">
                </div>
            </div>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            var usernameError = document.getElementById("usernameError");
            var emailError = document.getElementById("emailError");
            var phoneError = document.getElementById("phoneError");
            var passwordError = document.getElementById("passwordError");
            var confirmPasswordError = document.getElementById("confirmPasswordError");
            var genericError=document.getElementById("genericError");

            usernameError.textContent = "";
            emailError.textContent = "";
            phoneError.textContent = "";
            passwordError.textContent = "";
            confirmPasswordError.textContent = "";
            genericError.textContent="";
            
            var valid = true;
            
            if (username.trim() === "") {
                usernameError.textContent = "Username is required.";
                valid = false;
            }
            
            var emailPattern = /^[a-zA-Z0-9_.]{3,}@[a-zA-Z.]{3,12}.[a-zA-Z]{2,5}$/;
            if (!emailPattern.test(email)) {
                emailError.textContent = "Enter a valid email address.";
                valid = false;
            }
            
            var phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                phoneError.textContent = "Enter a valid 10-digit phone number.";
                valid = false;
            }
            
            if (password.length < 6) {
                passwordError.textContent = "Password must be at least 6 characters long.";
                valid = false;
            }
            
            if (confirmPassword !== password) {
                confirmPasswordError.textContent = "Passwords do not match.";
                valid = false;
            }
            
            if (!valid) return;
            
        $.ajax({
                url: "../dbfunctions/userdbfunctions.php", // PHP script to handle the request
                type: "POST",
                data:{
                    "username":username,
                    "email":email,
                    "phone":phone,
                    "password":password
                },
                success: function(data) {
                    let response=JSON.parse(data);
                    if(response['success']){
                        // Reset the form after successful submission
                        $("#signupForm")[0].reset();
                        $(location).attr("href", "./UserLogin.php");
                    }else{
                        genericError.textContent="User Already Exists";
                    }

                    
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("XHR Response:", xhr.responseText); // Show server response
                    console.log("Status:", status);
                    alert("Error: " + error + "\nResponse: " + xhr.responseText);
                }
        });
    });

    </script>
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include_once "./../component/footer.php";
?>