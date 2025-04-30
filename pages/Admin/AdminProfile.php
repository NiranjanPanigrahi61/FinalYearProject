<?php
require_once "../../dbfunctions/adminfunctions.php";
include_once "./AdminTopNavBar.php";
include_once "./AdminSideNavBar.php";

$data = adminInfo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Profile</title>
  <link href="../../Bootstrap/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background-color: #f8f9fa;
    }

    .admin-profile-block {
      margin-left: 250px;
      padding: 130px 15px 30px 15px;
      min-height: 100vh;
      transition: margin 0.3s ease;
    }

    @media (max-width: 768px) {
      .admin-profile-block {
        margin-left: 0;
        padding-top: 96px;
      }
    }

    .card {
      border-radius: 15px;
    }

    .btn-group {
      gap: 5px;
    }

    h2.editable {
      cursor: pointer;
    }

    h2.editable:hover {
      text-decoration: underline;
    }

    .d-none {
      display: none;
    }

    .w-48 {
      width: 48%;
    }

    #profileImage {
      transition: 0.3s ease;
    }

    #profileImage:hover {
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <?php if ($data) {
    $res = $data->fetch_assoc();
  ?>
    <div class="admin-profile-block">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-lg p-4">
              <form id="profileForm" enctype="multipart/form-data">
                <div class="text-center mb-4">
                  <input type="file" id="profileImageInput" name="adminimage" accept="image/*" class="d-none" />
                  <label for="profileImageInput" style="cursor: pointer;">
                    <img src="<?php echo $res['adminimage'] ?: 'https://cdn-icons-png.flaticon.com/512/149/149071.png'; ?>"
                      id="profileImage" alt="Profile Picture" name="image"
                      class="rounded-circle mb-3 img-fluid object-fit-cover"
                      width="120" height="120" />
                  </label>
                  <h2 id="adminName" class="editable"><?php echo $res['username']; ?> <i class="bi bi-pencil-fill"></i></h2>
                  <input type="text" id="nameInput" name="username" class="form-control d-none" value="<?php echo $res['username']; ?>" />
                </div>

                <div class="mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label mb-0">Email:</label>
                    <button class="btn btn-sm btn-outline-primary" type="button" id="editEmailBtn">
                      <i class="bi bi-pencil-fill"></i>
                    </button>
                  </div>
                  <span id="emailText"><?php echo $res['email']; ?></span>
                  <input type="email" id="emailInput" name="email" class="form-control d-none" value="<?php echo $res['email']; ?>" />
                </div>

                <div class="mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label mb-0">Password:</label>
                    <button class="btn btn-sm btn-outline-secondary" type="button" id="togglePasswordBtn">
                      <i class="bi bi-eye-slash-fill"></i>
                    </button>
                  </div>
                  <span id="passwordText">******</span>
                  <input type="password" id="passwordInput" name="password" class="form-control d-none" value="<?php echo $res['password']; ?>" readonly />
                </div>

                <div class="d-flex justify-content-between mb-3">
                  <button class="btn btn-success w-48" type="submit" id="saveBtn">Save Changes</button>
                  <button class="btn btn-danger w-48" type="button" id="logoutBtn">Logout</button>
                </div>
              </form>


              <div class="text-center">
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#otpModal">
                  Change Password
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- OTP Modal -->
  <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">

    <div class="modal-dialog">
      <div class="modal-content">
        <form id="otpForm">
          <div class="modal-header">
            <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>An OTP has been sent to your registered email.</p>
            <input type="text" id="otpInput" class="form-control mb-2" placeholder="Enter OTP" required />
            <div id="otpError" class="text-danger d-none">Invalid OTP. Try again.</div>
            <button type="button" class="btn btn-link p-0" id="resendBtn" disabled>
              Resend OTP (<span id="countdown">30</span>s)
            </button>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Verify</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Change Password Modal -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="changePasswordForm">
          <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="currentPassword" class="form-label">Current Password</label>
              <input type="password" class="form-control" id="currentPassword" required />
            </div>
            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="newPassword" required />
            </div>
            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="confirmPassword" required />
              <div class="invalid-feedback">Passwords do not match.</div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Password</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="../../JQuery/jquery-3.7.1.js"></script>
  <script src="../../Bootstrap/bootstrap.bundle.min.js"></script>
  <script>
    let generatedOTP = "123456";
    let actualPassword = $("#passwordInput").val();
    let isPasswordVisible = false;
    let timer;
    let profileImageData = "";

    function startResendCountdown() {
      let seconds = 30;
      $("#resendBtn").prop("disabled", true).html(`Resend OTP (<span id="countdown">${seconds}</span>s)`);
      timer = setInterval(() => {
        seconds--;
        $("#countdown").text(seconds);
        if (seconds <= 0) {
          clearInterval(timer);
          $("#resendBtn").prop("disabled", false).text("Resend OTP");
        }
      }, 1000);
    }

    $(document).ready(function() {
      startResendCountdown();

      const savedImage = localStorage.getItem("adminProfileImage");
      if (savedImage) {
        $("#profileImage").attr("src", savedImage);
        profileImageData = savedImage;
      }

      $("#profileImageInput").change(function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            $("#profileImage").attr("src", e.target.result);
            profileImageData = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });

      $("#adminName").click(function() {
        $(this).addClass("d-none");
        $("#nameInput").removeClass("d-none").focus().blur(function() {
          const name = $(this).val();
          $("#adminName").html(name + ' <i class="bi bi-pencil-fill"></i>').removeClass("d-none");
          $(this).addClass("d-none");
        });
      });

      $("#editEmailBtn").click(function() {
        $("#emailText, #emailInput").toggleClass("d-none");
      });

      $("#togglePasswordBtn").click(function() {
        const icon = $(this).find("i");
        if (!$("#passwordInput").hasClass("d-none")) {
          const input = $("#passwordInput");
          input.attr("type", input.attr("type") === "password" ? "text" : "password");
        } else {
          isPasswordVisible = !isPasswordVisible;
          $("#passwordText").text(isPasswordVisible ? actualPassword : "******");
        }
        icon.toggleClass("bi-eye-fill bi-eye-slash-fill");
      });

      $("#profileForm").submit(function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
          url: "../../dbfunctions/adminProfileUpdate.php",
          method: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            console.log(response);
            Swal.fire("Success", "Changes saved!", "success");
          },
          error: function() {
            Swal.fire("Error", "Server error occurred.", "error");
          },
        });
      });


      $("#logoutBtn").click(function() {
        Swal.fire({
          title: "Logged out!",
          icon: "info",
          confirmButtonText: "OK"
        }).then(() => {
          window.location.href = "/login";
        });
      });

      //  FIXED MODAL TRANSITION HERE
      $("#otpForm").submit(function(e) {
        e.preventDefault();
        const enteredOtp = $("#otpInput").val().trim();

        if (enteredOtp === generatedOTP) {
          $("#otpError").addClass("d-none");

          const otpModalEl = document.getElementById("otpModal");
          const otpModal = bootstrap.Modal.getOrCreateInstance(otpModalEl);
          otpModal.hide();

          // Attach the event only once — directly in submit handler
          otpModalEl.addEventListener("hidden.bs.modal", function onOtpModalHidden() {
            otpModalEl.removeEventListener("hidden.bs.modal", onOtpModalHidden);

            const changePasswordModal = bootstrap.Modal.getOrCreateInstance(document.getElementById("changePasswordModal"));
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open");
            changePasswordModal.show();
          });

        } else {
          $("#otpError").removeClass("d-none");
          startResendCountdown();
        }
      });

      $("#resendBtn").click(function() {
        generatedOTP = "654321";
        Swal.fire("OTP Resent", "New OTP is: " + generatedOTP, "info");
        startResendCountdown();
      });

      $("#changePasswordForm").submit(function(e) {
        e.preventDefault();
        const current = $("#currentPassword").val().trim();
        const newPass = $("#newPassword").val().trim();
        const confirmPass = $("#confirmPassword").val().trim();

        if (newPass.length < 6) {
          Swal.fire("Error", "New password must be at least 6 characters.", "error");
          return;
        }

        if (newPass !== confirmPass) {
          $("#confirmPassword").addClass("is-invalid");
          return;
        }

        $("#confirmPassword").removeClass("is-invalid");

        actualPassword = newPass;
        $("#passwordInput").val(newPass);
        $("#passwordText").text("******");
        isPasswordVisible = false;

        Swal.fire("Success", "Password changed successfully!", "success");
        $(this)[0].reset();
        bootstrap.Modal.getInstance($("#changePasswordModal")[0]).hide();
      });
    });
  </script>
</body>

</html>