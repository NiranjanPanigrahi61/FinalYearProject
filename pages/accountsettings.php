<?php
include '../dbfunctions/dbconnect.php';

if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$userid = $_SESSION['user_id'];
$email = "";
$phone = "";
$swalType = "";
$swalMsg = "";

// Fetch user details
function GetuserId($id) {
    global $conn;
    $qry = "SELECT email, phone FROM user WHERE userid = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}

$result = GetuserId($userid);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $phone = $row['phone'];
}

// Handle password update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        $swalType = "error";
        $swalMsg = "New password and confirm password do not match.";
    } elseif (strlen($newPassword) < 6) {
        $swalType = "error";
        $swalMsg = "New password must be at least 6 characters.";
    } else {
        $stmt = $conn->prepare("SELECT password FROM user WHERE userid = ?");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $row = $result->fetch_assoc()) {
            if ($currentPassword === $row['password']) {
                $update = $conn->prepare("UPDATE user SET password = ? WHERE userid = ?");
                $update->bind_param("si", $newPassword, $userid);
                if ($update->execute()) {
                    $swalType = "success";
                    $swalMsg = "Password updated successfully.";
                } else {
                    $swalType = "error";
                    $swalMsg = "Failed to update password.";
                }
            } else {
                $swalType = "error";
                $swalMsg = "Current password is incorrect.";
            }
        } else {
            $swalType = "error";
            $swalMsg = "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Settings</title>
  <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container">
  <h3 class="mb-4">⚙️ Account Settings</h3>

  <div class="card">
    <div class="card-body">
      <form method="post" action="">

        <!-- Email -->
        <div class="mb-3">
          <label for="accountEmail" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="accountEmail" value="<?php echo htmlspecialchars($email); ?>" readonly>
        </div>

        <!-- Phone -->
        <div class="mb-3">
          <label for="accountPhone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="accountPhone" value="<?php echo htmlspecialchars($phone); ?>" readonly>
        </div>

        <hr class="my-4">
        <h5 class="mb-3">🔐 Change Password</h5>

        <!-- Current Password -->
        <div class="mb-3">
          <label for="currentPassword" class="form-label">Current Password</label>
          <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>

        <!-- New Password -->
        <div class="mb-3">
          <label for="newPassword" class="form-label">New Password</label>
          <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>

        <!-- Confirm New Password -->
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm New Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">💾 Save Settings</button>
      </form>
    </div>
  </div>
</div>

<!-- JS Validation -->
<script>
document.querySelector("form").addEventListener("submit", function(e) {
  const newPassword = document.getElementById("newPassword").value.trim();
  const confirmPassword = document.getElementById("confirmPassword").value.trim();
  const pattern = /^.{6,}$/;
  document.querySelectorAll('.text-danger').forEach(el => el.remove());

  let valid = true;

  if (!pattern.test(newPassword)) {
    showError("newPassword", "New password must be at least 6 characters.");
    valid = false;
  }

  if (newPassword !== confirmPassword) {
    showError("confirmPassword", "Passwords do not match.");
    valid = false;
  }

  if (!valid) e.preventDefault();
});

function showError(fieldId, message) {
  const input = document.getElementById(fieldId);
  const div = document.createElement("div");
  div.className = "text-danger mt-1";
  div.textContent = message;
  input.parentNode.appendChild(div);
}
</script>

<?php if (!empty($swalType) && !empty($swalMsg)): ?>
<script>
Swal.fire({
  icon: "<?php echo $swalType; ?>",
  title: "<?php echo ucfirst($swalType); ?>",
  text: "<?php echo $swalMsg; ?>",
  confirmButtonColor: "#3085d6"
});
</script>
<?php endif; ?>

</body>
</html>
</html>

