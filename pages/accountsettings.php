<h3 class="mb-4">⚙️ Account Settings</h3>

<div class="card">
  <div class="card-body">
    <form method="post" action="#">
      <div class="mb-3">
        <label for="accountEmail" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="accountEmail" name="accountEmail" value="biswabishal@example.com" required>
      </div>
      
      <div class="mb-3">
        <label for="accountPhone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="accountPhone" name="accountPhone" value="+91-9876543210" required>
      </div>

      <hr class="my-4">

      <h5 class="mb-3">🔐 Change Password</h5>
      <div class="mb-3">
        <label for="currentPassword" class="form-label">Current Password</label>
        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
      </div>

      <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
      </div>

      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
      </div>

      <button type="submit" class="btn btn-success mt-3">💾 Save Settings</button>
    </form>
  </div>
</div>

<!-- Optional Bootstrap JS if not already loaded -->

