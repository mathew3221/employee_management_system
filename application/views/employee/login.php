<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Employee</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>
<body>
    <section class="vh-100" style="background-color: #D6D6D6;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>

                            <form id="loginForm" action="<?php echo base_url('employee/login'); ?>" method="post">
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" required>
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" required>
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg btn-block" type="submit">Login</button>
                            </form>

                        </div>
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
