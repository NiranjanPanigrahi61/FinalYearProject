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
      margin: 0 auto;
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

    .btn:hover {
      background-color: #ED555A !important;
      border-color: #b02454 !important;
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
                    <form id="signupForm" method="POST">
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

                        <!-- ✅ Date of Birth Field -->
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                            <div class="error" id="dobError"></div>
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
                <div class="info-section d-flex flex-column justify-content-center align-items-center text-white text-center p-4"
                     style="background: url('../assets/signup.jpg') center center / cover no-repeat;">
                    <h2 class="fw-bold" style="color: #D02964;">Embark on a New Journey!</h2>
                    <p class="fw-bolder" style="color: #fc8f59;">Join us and explore new opportunities!</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        document.getElementById("signupForm").addEventListener("submit", function (event) {
            event.preventDefault();

            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var dob = document.getElementById("dob").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            var usernameError = document.getElementById("usernameError");
            var emailError = document.getElementById("emailError");
            var phoneError = document.getElementById("phoneError");
            var dobError = document.getElementById("dobError");
            var passwordError = document.getElementById("passwordError");
            var confirmPasswordError = document.getElementById("confirmPasswordError");
            var genericError = document.getElementById("genericError");

            usernameError.textContent = "";
            emailError.textContent = "";
            phoneError.textContent = "";
            dobError.textContent = "";
            passwordError.textContent = "";
            confirmPasswordError.textContent = "";
            genericError.textContent = "";

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

            if (dob === "") {
                dobError.textContent = "Date of birth is required.";
                valid = false;
            } else {
                const selectedDate = new Date(dob);
                const today = new Date();
                if (selectedDate >= today) {
                    dobError.textContent = "Date of birth must be in the past.";
                    valid = false;
                }
            }

            if (password === "") {
                passwordError.textContent = "Password is required";
                valid = false;
            }
            if (!password.match(/[a-z]/)) {
                passwordError.textContent = "Password should have at least one lowercase character";
                valid = false;
            }
            if (!password.match(/[A-Z]/)) {
                passwordError.textContent = "Password should have at least one uppercase character";
                valid = false;
            }
            if (!password.match(/[0-9]/)) {
                passwordError.textContent = "Password should have at least one number";
                valid = false;
            }
            if (!password.match(/[!@#$%^&*]/)) {
                passwordError.textContent = "Password should have at least one special character";
                valid = false;
            }
            if (password.length < 6 || password.length > 15) {
                passwordError.textContent = "Password should be 6 to 15 characters long";
                valid = false;
            }

      if (confirmPassword !== password) {
        confirmPasswordError.textContent = "Passwords do not match.";
        valid = false;
      }

      if (!valid) return;

            $.ajax({
                url: "../dbfunctions/userdbfunctions.php",
                type: "POST",
                data: {
                    "username": username,
                    "email": email,
                    "phone": phone,
                    "password": password,
                    "dob": dob // ✅ include dob in AJAX request
                },
                success: function (data) {
                    let response = JSON.parse(data);
                    if (response['success']) {
                        $("#signupForm")[0].reset();
                        $(location).attr("href", "./UserLogin.php");
                    } else {
                        genericError.textContent = response['message'];
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    console.log("XHR Response:", xhr.responseText);
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

