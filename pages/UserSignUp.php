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
        .btn-success {
            background-color: #E33F5C;
            border: none;
        }
        .btn-success:hover {
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
                    <h2 class="text-center">Create User Account</h2>
                    <button class="btn btn-danger btn-social">Sign up with Google</button>
                    <button class="btn btn-primary btn-social">Sign up with Facebook</button>
                    <p class="text-center">- OR -</p>
                    
                    <!-- User Signup Form -->
                    <form id="signupForm">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                            <div class="error" id="usernameError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                            <div class="error" id="emailError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number">
                            <div class="error" id="phoneError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password">
                            <div class="error" id="passwordError"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password">
                            <div class="error" id="confirmPasswordError"></div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Create Account</button>
                        <div class="text-center mt-3">
                            <span>Already have account? </span>
                            <a href="./UserLogin.php" style="color: #D02964; text-decoration: none;">Sign In</a>
                        </div>
                    </form>
                </div>
                <div class="info-section">
                    <h2>Embark on a New Journey!</h2>
                    <p>Join us and explore new opportunities!</p>
                    <img src="user-image.png" alt="User Illustration" class="img-fluid" style="max-width: 80%;">
                </div>
            </div>
        </div>
    </div>
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
            
            usernameError.textContent = "";
            emailError.textContent = "";
            phoneError.textContent = "";
            passwordError.textContent = "";
            confirmPasswordError.textContent = "";
            
            var valid = true;
            
            if (username.trim() === "") {
                usernameError.textContent = "Username is required.";
                valid = false;
            }
            
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
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
            
            var formData = new FormData();
            formData.append("username", username);
            formData.append("email", email);
            formData.append("phone", phone);
            formData.append("password", password);
            
            fetch("signup.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
                document.getElementById("signupForm").reset();
            })
            .catch(error => console.error("Error:", error));
        });
    </script>
    <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include_once "./../component/footer.php";
?>