<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #D02964;
        }
        .form-control:focus {
            border-color: #D02964;
            box-shadow: 0 0 5px rgba(242, 11, 92, 0.5);
        }
        .btn:hover {
            background-color: #ED555A;
        }
        .error {
            color: red;
            font-size: 0.875em;
        }
        .info-section {
            background: url("../../assets/cake3.webp") no-repeat center center;
            background-size: cover;
            position: relative;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .info-overlay {
            padding: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center my-5" style="background-color: #D02964;">
            <div class="col-md-10 col-lg-9 bg-white rounded-3 shadow overflow-hidden p-0">
                <div class="row g-0">
                    <!-- Signup Form Section -->
                    <div class="col-md-6 p-4">
                        <h2 class="text-center">Create Admin Account</h2>                
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
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password">
                                <div class="error" id="passwordError"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password">
                                <div class="error" id="confirmPasswordError"></div>
                            </div>
                            <button type="submit" class="btn text-white w-100" style="background-color: #E33F5C;">Create Admin</button>
                            <div class="text-center mt-3">
                                <span>Already have an account? </span>
                                <a href="./AdminLogin.php" class="text-danger text-decoration-none">Sign In</a>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Info Section with Background Image -->
                    <div class="col-md-6 d-none d-md-flex info-section">
                        <div class="info-overlay w-100">
                            <h2>Embark on a Sugar-Coated Adventure!</h2>
                            <p>Your one-stop candy wonderland!</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            var usernameError = document.getElementById("usernameError");
            var emailError = document.getElementById("emailError");
            var passwordError = document.getElementById("passwordError");
            var confirmPasswordError = document.getElementById("confirmPasswordError");
            
            usernameError.textContent = "";
            emailError.textContent = "";
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
    
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>

    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            var usernameError = document.getElementById("usernameError");
            var emailError = document.getElementById("emailError");
            var passwordError = document.getElementById("passwordError");
            var confirmPasswordError = document.getElementById("confirmPasswordError");
            
            usernameError.textContent = "";
            emailError.textContent = "";
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
    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
