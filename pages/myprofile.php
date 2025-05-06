<h3 class="mb-4">👤 My Profile</h3>

<div class="card mb-4">
  <div class="row g-0 align-items-center">
    <div class="col-md-3 text-center p-3">
      <img src="https://via.placeholder.com/120" class="rounded-circle img-fluid" alt="Profile Photo">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title mb-3">Biswabishal Senapati</h5>
        <p class="card-text"><strong>Email:</strong> biswabishal@example.com</p>
        <p class="card-text"><strong>Phone:</strong> +91-9876543210</p>
        <p class="card-text"><strong>Address:</strong> Silicon University, Bhubaneswar, Odisha</p>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">✏️ Edit Profile</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="#">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullName" name="fullName" value="Biswabishal Senapati">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" value="biswabishal@example.com">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" value="+91-9876543210">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" name="address" rows="2">Silicon University, Bhubaneswar, Odisha</textarea>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">💾 Save Changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap JS (for modal functionality) -->
<script src="./Bootstrap/bootstrap.bundle.min.js"></script>
