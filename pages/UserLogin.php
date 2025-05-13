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

    .login-img {
      height: 400px;
      object-fit: cover;
      width: 100%;
      border-top-left-radius: 0.375rem;
      border-bottom-left-radius: 0.375rem;
    }
  </style>
</head>

<body>
  <div class="body d-flex align-items-center justify-content-center vh-100">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
          <div class="card overflow-hidden shadow-sm border-0 rounded-3">
            <div class="row g-0">
              <div class="col-md-6 d-none d-md-block">
                <img src="../assets/login.jpg" alt="User Login" class="login-img">
              </div>
              <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                <h3 class="text-center mb-4" style="color: #D02964;">User Login</h3>
                <form id="userLoginForm" method="POST">
                  <div class="mb-3">
                    <label for="user-email" class="form-label">User Email</label>
                    <input type="email" class="form-control" id="user-email" name="email" placeholder="Enter email">
                    <div class="text-danger" id="userEmailError"></div>
                  </div>
                  <div class="mb-3">
                    <label for="user-password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="user-password" name="password" placeholder="Enter password">
                    <div class="text-danger" id="userPasswordError"></div>
                  </div>
                  <div class="text-end mb-3">
                    <a href="#" id="forgotPasswordLink" style="color: #D02964;">Forgot password?</a>
                  </div>
                  <div class="d-grid">
                    <button type="submit" class="btn btn-danger">Sign in</button>
                  </div>
                  <div class="text-center mt-3">
                    <span>Don't have an account? </span>
                    <a href="./UserSignUp.php" style="color: #D02964; text-decoration: none;">Create Account</a>
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

  <!-- OTP Modal -->
  <div class="modal fade" id="otpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title">Verify OTP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>OTP sent to your email. Please verify.</p>
          <input type="text" id="otpInput" class="form-control mb-2" placeholder="Enter OTP">
          <div id="otpError" class="text-danger mb-2"></div>
          <div id="timer" class="mb-2 text-muted">Resend in <span id="countdown">30</span>s</div>
          <button id="resendOtpBtn" class="btn btn-link p-0" disabled>Resend OTP</button>
        </div>
        <div class="modal-footer">
          <button id="verifyOtpBtn" class="btn btn-primary">Verify</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Reset Password Modal -->
  <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title">Reset Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="password" id="newPassword" class="form-control mb-2" placeholder="New Password">
          <input type="password" id="confirmPassword" class="form-control mb-2" placeholder="Confirm Password">
          <div id="resetError" class="text-danger mb-2"></div>
        </div>
        <div class="modal-footer">
          <button id="resetPasswordBtn" class="btn btn-success">Reset Password</button>
        </div>
      </div>
    </div>
  </div>

  <script src="./../Bootstrap/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script src="https://code.jquery.com/jquery-3.7.1.js"
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

      var emailPattern = /^[a-zA-Z0-9_.]{3,}@[a-zA-Z.]{3,12}\.[a-zA-Z]{2,5}$/;
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
        url: "../dbfunctions/userdbfunctions.php",
        type: "POST",
        data: {
          "email": email,
          "password": password
        },
        success: function(data) {
          let response = JSON.parse(data);
          if (response.success) {
            $(location).attr("href", "home.php");
          } else {
            serverError.textContent = response.message;
          }
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", error);
          serverError.textContent = "An error occurred. Please try again later.";
        }
      });
    });

    let countdownInterval;

    $("#forgotPasswordLink").on("click", function(e) {
      e.preventDefault();
      const email = $("#user-email").val();

      if (!email) {
        $("#userEmailError").text("Please enter your email first.");
        return;
      }

      $.ajax({
        url: "../mail/sendOtp.php",
        method: "POST",
        data: {
          email: email
        },
        success: function(response) {
          let res = JSON.parse(response);
          console.log(res);

          if (res.status === "success") {
            let otpModal = new bootstrap.Modal(document.getElementById('otpModal'));
            otpModal.show();
            startCountdown();
          } else {
            $("#userEmailError").text(res.message);
          }
        }
      });
    });

    function startCountdown() {
      let timeLeft = 30;
      $("#timer").html(`Resend in <span id="countdown">${timeLeft}</span>s`);
      $("#resendOtpBtn").prop("disabled", true);

      countdownInterval = setInterval(() => {
        timeLeft--;
        $("#countdown").text(timeLeft);
        if (timeLeft <= 0) {
          clearInterval(countdownInterval);
          $("#resendOtpBtn").prop("disabled", false);
          $("#timer").text("You can resend the OTP now.");
        }
      }, 1000);
    }

    $("#resendOtpBtn").on("click", function() {
      const email = $("#user-email").val().trim();

      $.ajax({
        url: "../mail/sendOtp.php",
        type: "POST",
        data: {
          email: email
        },
        success: function(data) {
          let res = JSON.parse(data);
          if (res.status === "success") {
            $("#otpError").text("");
            startCountdown();
          } else {
            $("#otpError").text(res.message);
          }
        },
        error: function() {
          $("#otpError").text("Failed to resend OTP. Try again.");
        }
      });
    });


    $("#verifyOtpBtn").on("click", function() {
      const otp = $("#otpInput").val().trim();
      const email = $("#user-email").val().trim();

      if (!otp) {
        $("#otpError").text("Please enter the OTP.");
        return;
      }

      $.ajax({
        url: "../mail/verifyOtp.php",
        type: "POST",
        data: {
          email: email,
          otp: otp
        },
        success: function(data) {
          let res = JSON.parse(data);
          if (res.status === "success") {
            $("#otpModal").modal("hide");
            $("#resetPasswordModal").modal("show");
            $("#otpError").text("");
          } else {
            $("#otpError").text(res.message);
          }
        },
        error: function() {
          $("#otpError").text("OTP verification failed. Try again.");
        }
      });
    });


    $("#resetPasswordBtn").on("click", function() {
      const newPassword = $("#newPassword").val().trim();
      const confirmPassword = $("#confirmPassword").val().trim();
      const email = $("#user-email").val().trim();

      $("#resetError").text("");

      if (newPassword.length < 6) {
        $("#resetError").text("Password must be at least 6 characters.");
        return;
      }

      if (newPassword !== confirmPassword) {
        $("#resetError").text("Passwords do not match.");
        return;
      }

      $.ajax({
        url: "../dbfunctions/userResetPassword.php",
        type: "POST",
        data: {
          email: email,
          password: newPassword
        },
        success: function(data) {
          let res = JSON.parse(data);
          if (res.status === "success") {
            Swal.fire({
              icon: 'success',
              title: 'Password Reset Successful!',
              text: 'Your password has been successfully reset.',
              confirmButtonText: 'OK',
            }).then(() => {
              // Hide the reset password modal after the success message
              $("#resetPasswordModal").modal("hide");
            });
          } else {
            // Show error message in the resetError element
            $("#resetError").addClass("text-danger").text(res.message);
          }
        }
      });
    });
  </script>

</body>

</html>

<?php
include_once "./../component/footer.php";
?>