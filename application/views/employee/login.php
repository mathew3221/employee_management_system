<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Employee</title>
    <link
      rel="icon"
      href="<?php echo base_url()?>assets/img/mjlogo.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>
<body>
    <section class="bg-light py-3 py-md-5 py-xl-8">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="mb-5">
              <h4 class="text-center mb-4">Welcome back you've been missed!</h4>
              
            </div>
            <div class="card border border-light-subtle rounded-4">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <form id="loginForm" action="<?php echo base_url('employee/login'); ?>" method="post">
                  <p class="text-center mb-4">sign in using email</p>
                  <div class="row gy-3 overflow-hidden">
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                        <label for="email" class="form-label">Email</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                        <label class="form-check-label text-secondary" for="remember_me">
                          Keep me logged in
                        </label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Log in</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-4">
              <a href="#!" class="link-secondary text-decoration-none">Create new account</a>
              <a href="<?php echo base_url('home'); ?>" class="link-secondary text-decoration-none">Home</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Get form data
                var formData = {
                    'email': $('input[name=email]').val(),
                    'password': $('input[name=password]').val()
                };

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('employee/login'); ?>',
                    data: formData,
                    dataType: 'json',
                    encode: true
                })
                .done(function(data) {
                    if (data.status == 'success') {
                        // Redirect to dashboard
                        window.location.href = '<?php echo base_url('employee/dashboard'); ?>';
                    } else {
                        // Show alert for incorrect login details
                        alert(data.message);
                    }
                })
                .fail(function(data) {
                    console.log(data);
                    alert('An error occurred. Please try again.');
                });
            });
        });
    </script>

</body>
</html>
