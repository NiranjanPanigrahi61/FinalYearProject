<?php
ob_start(); // Start output buffering at the very beginning
include '../dbfunctions/dbconnect.php';
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    ob_end_flush();
    exit();
}

$userid = $_SESSION['user_id'];
$username = $email = $phone = $profile_photo = $dob = "";
$swalType = $swalMsg = "";

// Fetch user details
$q = $conn->prepare("SELECT username, email, phone, profile_photo, dob FROM user WHERE userid = ?");
$q->bind_param("i", $userid);
$q->execute();
$res = $q->get_result();

$dobReadonly = false;
if ($res && $res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
    $profile_photo = $row['profile_photo'];
    $dob = $row['dob'];
    $dobReadonly = !empty($dob); // If DOB exists, make it read-only
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveChanges'])) {
    $newUsername = trim($_POST['username']);
    $newPhone = trim($_POST['phone']);
    $newDOB = $_POST['dob'];
    $newPhoto = $profile_photo;
    $response = $profile_photo;

    // Handle profile photo upload
    if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['name']) {
        $imgTmp = $_FILES['profilePhoto']['tmp_name'];
        $imgName = time() . "-" . basename($_FILES['profilePhoto']['name']);
        require_once "../aws/upload.php";
        $response = uploadtoS3("user/", $imgTmp, $imgName);
    }

    // Prepare SQL update query based on DOB status
    if ($dobReadonly) {
        // Prevent DOB update
        $stmt = $conn->prepare("UPDATE user SET username=?, phone=?, profile_photo=? WHERE userid=?");
        $stmt->bind_param("sssi", $newUsername, $newPhone, $response, $userid);
    } else {
        // Allow DOB update only if it's not already set
        $stmt = $conn->prepare("UPDATE user SET username=?, phone=?, profile_photo=?, dob=? WHERE userid=?");
        $stmt->bind_param("ssssi", $newUsername, $newPhone, $response, $newDOB, $userid);
    }

    if ($stmt->execute()) {
        ob_end_clean(); // Clean the buffer before redirect
        header("Location: profile_section.php");
        exit();
    } else {
        $swalType = "error";
        $swalMsg = "Update failed.";
    }
}
ob_end_flush(); // Send the buffered output
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
  <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .card-custom {
      max-width: 460px;
      margin: auto;
      border-radius: 1rem;
    }
    .form-control[readonly] {
      background-color: #f8f9fa;
    }
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<div class="card card-custom shadow p-4 mt-4">
  <form method="post" enctype="multipart/form-data">
    <div class="text-center mb-3">
      <img src="<?php echo $profile_photo ?: 'default.jpg'; ?>" 
           class="rounded-circle img-thumbnail profile-img" 
           alt="Profile Photo">
      <input type="file" name="profilePhoto" class="form-control mt-2 d-none" id="profilePhoto">
    </div>
    <div class="mb-2">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" id="username">
    </div>
    <div class="mb-2">
      <label class="form-label">Email</label>
      <input type="email" class="form-control text-danger fw-bold" value="<?php echo $email; ?>" readonly>
    </div>
    <div class="mb-2">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" id="phone">
    </div>
    <div class="mb-3">
      <label class="form-label">Date of Birth</label>
      <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>" id="dob" <?php echo $dobReadonly ? 'readonly' : ''; ?> required>
      <?php if (!$dobReadonly): ?>
        <small class="text-danger">⚠️ You can set your DOB once. It cannot be changed later.</small>
      <?php else: ?>
        <small class="text-muted">📌 DOB is locked and cannot be changed.</small>
      <?php endif; ?>
    </div>
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-sm btn-warning me-2" id="editBtn">✏️ Edit</button>
      <button type="submit" name="saveChanges" class="btn btn-sm btn-success d-none" id="saveBtn">💾 Save</button>
      <button type="button" class="btn btn-sm btn-secondary d-none" id="cancelBtn">❌ Cancel</button>
    </div>
  </form>
</div>

<?php if ($swalType): ?>
<script>
Swal.fire({
  icon: "<?php echo $swalType; ?>",
  title: "<?php echo ucfirst($swalType); ?>",
  text: "<?php echo $swalMsg; ?>",
});
</script>
<?php endif; ?>

<script>
const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const cancelBtn = document.getElementById('cancelBtn');
const profilePhoto = document.getElementById('profilePhoto');
const dobInput = document.getElementById('dob');
const fields = [document.getElementById('username'), document.getElementById('phone')];

editBtn.addEventListener('click', () => {
  fields.forEach(input => input.removeAttribute('readonly'));
  if (!dobInput.hasAttribute('readonly')) dobInput.removeAttribute('readonly');
  profilePhoto.classList.remove('d-none');
  editBtn.classList.add('d-none');
  saveBtn.classList.remove('d-none');
  cancelBtn.classList.remove('d-none');
});

cancelBtn.addEventListener('click', () => {
  location.reload();
});
</script>

</body>
</html>
</html>
