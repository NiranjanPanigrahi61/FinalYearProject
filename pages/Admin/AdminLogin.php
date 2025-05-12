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

        .login-img {
            height: 400px;
            object-fit: cover;
            width: 100%;
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        @media (max-width: 768px) {
            .login-img {
                height: auto;
                border-radius: 0;
            }
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
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card overflow-hidden shadow-sm border-0 rounded-3">
                        <div class="row g-0">
                            <div class="col-md-6 d-none d-md-block">
                                <img src="../../assets/adminlogin.jpg" alt="Admin Login" class="login-img">
                            </div>
                            <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
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
                                        <a href="#" id="forgotPasswordLink" style="color: #D02964;">Forgot password?</a>
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

    <!-- OTP Verification Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">Verify OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>An OTP has been sent to your email. Please enter it below.</p>
                    <input type="text" id="otpInput" class="form-control mb-2" placeholder="Enter OTP">
                    <div class="text-danger mb-2" id="otpError"></div>
                    <button id="verifyOtpBtn" class="btn btn-primary w-100 mb-2">Verify OTP</button>
                    <div class="text-center">
                        <span id="resendTimer">Resend OTP in 30s</span>
                        <button id="resendOtpBtn" class="btn btn-link" style="display:none;">Resend OTP</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Password Modal -->
    <div class="modal fade" id="newPasswordModal" tabindex="-1" aria-labelledby="newPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPasswordModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="password" id="newPassword" class="form-control mb-2" placeholder="New Password">
                    <input type="password" id="confirmPassword" class="form-control mb-2" placeholder="Confirm Password">
                    <div class="text-danger mb-2" id="passwordError"></div>
                    <button id="resetPasswordBtn" class="btn btn-success w-100">Reset Password</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./../../JQuery/jquery-3.7.1.js"></script>

    <script>
        document.getElementById("adminLoginForm").addEventListener("submit", function(event) {
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

            if (!email.match(/^[a-zA-Z0-9_.]{3,}@[a-zA-Z.]{3,12}\.[a-zA-Z]{2,5}$/)) {
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
                        if (data) {
                            window.location.href = "./dashboard.php";
                        } else {
                            serverError.textContent = "Invalid Admin";
                        }
                    },
                    error: function(xhr, status, error) {
                        serverError.innerText = "An error occurred. Please try again later.";
                    }
                });
            }
        });

        let resendCountdown;
        let email;

        function startResendTimer() {
            let timer = 30;
            $('#resendOtpBtn').hide();
            $('#resendTimer').text(`Resend OTP in ${timer}s`);

            resendCountdown = setInterval(() => {
                timer--;
                if (timer <= 0) {
                    clearInterval(resendCountdown);
                    $('#resendTimer').hide();
                    $('#resendOtpBtn').show();
                } else {
                    $('#resendTimer').text(`Resend OTP in ${timer}s`);
                }
            }, 1000);
        }

        $('#forgotPasswordLink').on('click', function() {
            email = $('#admin-email').val();

            // Validate email before sending OTP
            if (!email) {
                $('#adminEmailError').text("Please enter your email to receive OTP.");
                return;
            }

            // Validate if the email format is correct
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailRegex.test(email)) {
                $('#adminEmailError').text("Please enter a valid email.");
                return;
            }

            // Clear any previous error messages
            $('#adminEmailError').text('');

            // Send OTP via AJAX
            $.ajax({
                url: "../../mail/sendotp.php",
                type: "POST",
                data: {
                    email: email
                },
                success: function(response) {
                    console.log('OTP Response:', response); // Log the response for debugging
                    response = JSON.parse(response);

                    // Check if the response is 'success' from the backend
                    if (response.status === 'success') {
                        $('#otpError').text('');
                        $('#otpInput').val('');
                        var otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
                        otpModal.show(); // Use Bootstrap 5's modal API
                        $('#resendTimer').show();
                        startResendTimer();
                    } else {
                        $('#otpError').text("Failed to send OTP. Please try again.");
                    }
                },
                error: function() {
                    $('#otpError').text("Failed to send OTP. Please try again.");
                }
            });
        });


        $('#resendOtpBtn').on('click', function() {
            $.ajax({
                url: "../../mail/sendotp.php",
                type: "POST",
                data: {
                    email: email
                },
                success: function(response) {
                    console.log('Resend OTP Response:', response); // Log the response for debugging
                    $('#resendOtpBtn').hide();
                    $('#resendTimer').show().text("Resend OTP in 30s");
                    startResendTimer();
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Failed to resend OTP. Please try again.',
                        confirmButtonColor: '#D02964'
                    });
                }
            });
        });

        $('#verifyOtpBtn').on('click', function() {
            const otp = $('#otpInput').val();
            if (!otp) {
                $('#otpError').text("Please enter the OTP.");
                return;
            }

            $.ajax({
                url: "../../mail/verifyotp.php",
                type: "POST",
                data: {
                    email: email,
                    otp: otp
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Password successfully reset.',
                            confirmButtonColor: '#D02964'
                        }).then(() => {
                            $('#newPasswordModal').modal('hide');
                        });
                    } else {
                        $('#otpError').text("Invalid or expired OTP.");
                    }
                },
                error: function() {
                    $('#otpError').text("OTP verification failed. Please try again.");
                }
            });
        });

        $('#resetPasswordBtn').on('click', function() {
            const newPassword = $('#newPassword').val();
            const confirmPassword = $('#confirmPassword').val();

            if (newPassword.length < 6) {
                $('#passwordError').text("Password must be at least 6 characters.");
                return;
            }

            if (newPassword !== confirmPassword) {
                $('#passwordError').text("Passwords do not match.");
                return;
            }

            $.ajax({
                url: "../../dbfunctions/forgotAdminpassword.php",
                type: "POST",
                data: {
                    email: email,
                    new_password: newPassword
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status === 'success') {
                        alert("Password successfully reset.");
                        $('#newPasswordModal').modal('hide');
                    } else {
                        $('#passwordError').text("Something went wrong. Try again.");
                    }
                },
                error: function() {
                    $('#passwordError').text("Password reset failed. Please try again.");
                }
            });
        });
    </script>

</body>

</html>