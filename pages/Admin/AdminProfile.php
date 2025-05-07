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
                  <label class="form-label">Email:</label>
                  <div><?php echo $res['email']; ?></div>
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
                <button class="btn btn-warning" id="changePasswordBtn">
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
    let oldProfile = $("#profileImage").attr("src");
    let originalData = {};

    function startResendCountdown() {
      let seconds = 30;
      $("#resendBtn").prop("disabled", true).html(`Resend OTP (<span id="countdown">${seconds}</span>s)`);

      // Clear any existing timer before starting a new one
      clearInterval(timer);

      timer = setInterval(() => {
        seconds--;
        $("#countdown").text(seconds); // Update countdown display

        // When the timer reaches 0, enable the button again and reset the text
        if (seconds <= 0) {
          clearInterval(timer); // Clear the timer to stop it
          $("#resendBtn").prop("disabled", false).text("Resend OTP");
        }
      }, 1000); // Update every second
    }

    $(document).ready(function() {
      startResendCountdown();

      originalData = {
        username: $("#nameInput").val(),
        password: $("#passwordInput").val(),
        profileImage: $("#profileImage").attr("src"),
      };

      $("#profileImageInput").change(function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            $("#profileImage").attr("src", e.target.result);
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

        const currentData = {
          username: $("#nameInput").val(),
          profileImage: $("#profileImage").attr("src"),
        };

        // Ensure only changes to the name or profile image trigger saving
        const isChanged =
          currentData.username !== originalData.username ||
          currentData.profileImage !== originalData.profileImage;

        if (!isChanged) {
          Swal.fire("No Changes", "Nothing was updated.", "info");
          return;
        }

        const formData = new FormData();
        formData.append("username", $("#nameInput").val());
        formData.append("oldUrl", oldProfile);

        const imageInput = $("#profileImageInput")[0];
        if (imageInput.files.length > 0) {
          formData.append("adminimage", imageInput.files[0]);
        }

        $.ajax({
          url: "../../dbfunctions/adminProfileUpdate.php", // Assuming your update script
          method: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            Swal.fire("Success", "Changes saved!", "success");
            originalData = {
              ...currentData
            };
          },
          error: function() {
            Swal.fire("Error", "Server error occurred.", "error");
          },
        });
      });


      $("#logoutBtn").click(function() {
        Swal.fire({
          title: "Are you sure?",
          text: "Do you really want to logout?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, Logout",
          cancelButtonText: "Cancel",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: "Logged out!",
              icon: "info",
              timer: 1000,
              showConfirmButton: false
            }).then(() => {
              window.location.href = "../../dbfunctions/logout.php"; // Adjust path as needed
            });
          }
        });
      });

      $("#changePasswordBtn").click(function() {
        $.ajax({
          url: "../../mail/sendOTP.php",
          type: "POST",
          data: {
            email: "<?php echo $res['email']; ?>"
          },
          success: function(res) {
            console.log(res);
            const data = JSON.parse(res);
            if (data.status === "success") {
              Swal.fire("OTP Sent", "A new OTP has been sent to your email.", "info").then(() => {
                const otpModal = new bootstrap.Modal(document.getElementById("otpModal"));
                otpModal.show();
                startResendCountdown(); // Restart countdown on each send
              });
            } else {
              Swal.fire("Error", "Failed to send OTP: " + data.message, "error");
            }
          },
          error: function(xhr, status, error) {
            Swal.fire("Error", "An unexpected error occurred: " + error, "error");
          }
        });
      });



      $("#otpForm").submit(function(e) {
        e.preventDefault();
        const enteredOtp = $("#otpInput").val().trim();

        $.post("../../mail/verifyOtp.php", {
          otp: enteredOtp
        }, function(response) {
          const data = JSON.parse(response);
          if (data.status === "success") {
            $("#otpError").addClass("d-none");

            const otpModalEl = document.getElementById("otpModal");
            const otpModal = bootstrap.Modal.getOrCreateInstance(otpModalEl);
            otpModal.hide();

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

      });

      $("#resendBtn").click(function() {
        $.ajax({
          url: "../../mail/sendOTP.php",
          type: "POST",
          data: {
            email: "<?php echo $res['email']; ?>"
          },
          success: function(res) {
            const data = JSON.parse(res);
            if (data.status === "success") {
              Swal.fire("OTP Sent", "A new OTP has been sent to your email.", "info");
              startResendCountdown();
            } else {
              Swal.fire("Error", "Failed to send OTP: " + data.message, "error");
            }
          },
          error: function(xhr, status, error) {
            Swal.fire("Error", "An unexpected error occurred: " + error, "error");
          }
        });
      });

      $("#changePasswordForm").submit(function(e) {
        e.preventDefault();
        const current = $("#currentPassword").val().trim();
        const newPass = $("#newPassword").val().trim();
        const confirmPass = $("#confirmPassword").val().trim();

        // Password validation regex
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{6,16}$/;

        // Check if new password meets the criteria
        if (newPass.length < 6 || newPass.length > 16) {
          Swal.fire("Error", "Password must be between 6 and 16 characters.", "error");
          return;
        }

        if (!passwordRegex.test(newPass)) {
          $("#newPassword").addClass("is-invalid");
          Swal.fire("Error", "Password must contain at least <br> one uppercase letter(A-Z),<br> one lowercase letter(a-z), <br>one number(0-9) and <br>one special character(!@#$%^&*).", "error");
          return;
        }

        if (newPass !== confirmPass) {
          $("#confirmPassword").addClass("is-invalid");
          return;
        }

        $("#confirmPassword").removeClass("is-invalid");

        $.ajax({
          url: "../../dbfunctions/AdminChangePassword.php",
          type: "POST",
          data: {
            current: current,
            new: newPass
          },
          success: function(response) {
            console.log(response);

            // const data = JSON.parse(response);
            if (response.status === "success") {
              Swal.fire("Success", "Password changed successfully!", "success");
              $("#passwordInput").val(newPass);
              $("#passwordText").text("******");
              $("#changePasswordForm")[0].reset();
              bootstrap.Modal.getInstance($("#changePasswordModal")[0]).hide();
            } else {
              Swal.fire("Error", response.message, "error");
            }
          },
          error: function() {
            Swal.fire("Error", "Server error. Try again later.", "error");
          }
        });
      });
    });
  </script>
</body>

</html>