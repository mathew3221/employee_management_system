<div class="container">
  <div class="page-inner">
    <!-- <div class="page-header">
      <h3 class="fw-bold mb-3">DataTables.Net</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Tables</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Datatables</a>
        </li>
      </ul>
    </div> -->
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
                <div class="main-content">
                    <h2 class="mb-4">Change Password</h2>
                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label for="password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                        </div>
                        <small id="error-message" class="text-danger"></small>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const errorMessage = document.getElementById('error-message');
        errorMessage.textContent = '';

        if (newPassword !== confirmPassword) {
            errorMessage.textContent = 'New Password and Confirm New Password do not match.';
            return;
        }

        const formData = new FormData(this);

        fetch('<?php echo site_url("employee/update_password"); ?>', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Password changed successfully!');
                location.reload();
            } else {
                errorMessage.textContent = 'Failed to change password: ' + data.message;
            }
        })
        .catch(() => {
            errorMessage.textContent = 'An error occurred. Please try again.';
        });
    });
});
</script>
