<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Employees</h4>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#addEmployeeModal"
              >
                <i class="fa fa-plus"></i>
                Add Employee
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive container">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Emp ID</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Date of Join</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Emp ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Date of Join</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (empty($employees)) : ?>
                        <tr>
                            <td colspan="7" class="text-center">No employee found</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($employees as $index => $employee) : ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td class="avatar-sm">
                                    <?php if (!empty($employee['photo']) && file_exists('assets/images/'.$employee['photo'])) : ?>
                                        <img src="<?php echo base_url('assets/images/'.$employee['photo']); ?>" alt="Profile Image" class="avatar-img rounded-circle">
                                    <?php else : ?>
                                        <img src="<?php echo base_url()?>assets/img/default-avatar.jpg" alt="Profile Image" class="avatar-img rounded-circle">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $employee['employee_id']; ?></td>
                                <td><?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?></td>
                                <td><?php echo $employee['department_name']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($employee['date_of_joining'])); ?></td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="info" data-bs-toggle="modal" data-bs-target="#viewemployeeModal" onclick="view_employee(<?php echo $employee['id']; ?>);"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-secondary btn-sm" title="edit" data-bs-toggle="modal" data-bs-target="#editemployeeModal" onclick="edit_employee(<?php echo $employee['id']; ?>);"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-warning btn-sm" title="salary" data-bs-toggle="modal" data-bs-target="#viewsalaryModal" onclick="view_salary(<?php echo $employee['id']; ?>);"><i class="fas fa-money-bill-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" title="leave" data-bs-toggle="modal" data-bs-target="#viewleaveModal" onclick="view_leave(<?php echo $employee['id']; ?>);"><i class="fas fa-calendar-alt"></i></button>
                                    <button class="btn <?php echo ($employee['employee_status'] == 1) ? 'btn-success btn-sm' : 'btn-danger btn-sm'; ?>" onclick="toggleStatus(<?php echo $employee['id']; ?>, <?php echo $employee['employee_status']; ?>);">
                                        <?php echo ($employee['employee_status'] == 1) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm" action="<?php echo base_url('admin/save_employee'); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="employee_id" class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" id="employee_id" name="employee_id" required>
                                    <div class="invalid-feedback">Employee ID is required.</div>
                                    <small id="employeeIdError" class="form-text text-danger d-none">Employee ID already exists.</small>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    <div class="invalid-feedback">First Name is required.</div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="email" class="form-label">Email ID</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback">Valid Email ID is required.</div>
                                    <small id="emailError" class="form-text text-danger d-none">Email already exists.</small>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="department_name" class="form-label">Department</label>
                                    <select class="form-select" id="department_name" name="department_name" required>
                                        <option value="">Select Department</option>
                                        <?php foreach ($departments as $dt) : ?>
                                            <option value="<?php echo $dt['id']; ?>"><?php echo $dt['department_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Department is required.</div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="mobile_no" class="form-label">Mobile No</label>
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" required>
                                    <div class="invalid-feedback">Mobile number must be 10 digits.</div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="invalid-feedback">Gender is required.</div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" name="state">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                    <div class="invalid-feedback">Date of Birth is required.</div>
                                    <small id="dateOfBirthError" class="form-text text-danger d-none">Date of Birth cannot be in the future.</small>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="date_of_joining" class="form-label">Date of Joining</label>
                                    <input type="date" class="form-control" id="date_of_joining" name="date_of_joining" required>
                                    <div class="invalid-feedback">Date of Joining is required.</div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <div class="invalid-feedback">Password is required.</div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    <div class="invalid-feedback">Passwords do not match.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>







<div class="modal fade" id="viewemployeeModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="viewModalLabel">Details</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewemployee">
                <!-- Content loaded via AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editemployeeModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="employeeedit">
        <!-- Content loaded via AJAX -->
    </div>
</div>

<!-- View Salary Modal -->
<div class="modal fade" id="viewsalaryModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Employee Salary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewsalary">
                <!-- Content loaded via AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- View Leave Modal -->
<div class="modal fade" id="viewleaveModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Employee Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewleave">
                <!-- Content loaded via AJAX -->
            </div>
        </div>
    </div>
</div>








<script type="text/javascript">
        document.getElementById('addEmployeeForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        event.stopPropagation(); // Stop event propagation

        var form = this;
        var isValid = true;

        // Basic field validations
        var requiredFields = ['employee_id', 'first_name', 'last_name', 'email', 'department_name', 'mobile_no', 'gender', 'date_of_birth', 'date_of_joining', 'password', 'confirmPassword'];

        requiredFields.forEach(function(field) {
            var fieldValue = form[field].value.trim();
            if (fieldValue === '') {
                isValid = false;
                document.getElementById(field).classList.add('is-invalid');
            } else {
                document.getElementById(field).classList.remove('is-invalid');
            }
        });

        // Specific validations
        var mobileNo = form.mobile_no.value.trim();
        if (mobileNo.length !== 10 || !/^\d{10}$/.test(mobileNo)) {
            isValid = false;
            document.getElementById('mobile_no').classList.add('is-invalid');
        } else {
            document.getElementById('mobile_no').classList.remove('is-invalid');
        }

        var dateOfBirth = form.date_of_birth.value.trim();
        if (dateOfBirth === '') {
            isValid = false;
            document.getElementById('date_of_birth').classList.add('is-invalid');
        } else {
            var currentDate = new Date();
            var selectedDate = new Date(dateOfBirth);
            if (selectedDate > currentDate) {
                isValid = false;
                document.getElementById('dateOfBirthError').classList.remove('d-none');
            } else {
                document.getElementById('dateOfBirthError').classList.add('d-none');
            }
            document.getElementById('date_of_birth').classList.remove('is-invalid');
        }

        var dateOfJoining = form.date_of_joining.value.trim();
        if (dateOfJoining === '') {
            isValid = false;
            document.getElementById('date_of_joining').classList.add('is-invalid');
        } else {
            document.getElementById('date_of_joining').classList.remove('is-invalid');
        }

        // Password confirmation
        var password = form.password.value.trim();
        var confirmPassword = form.confirmPassword.value.trim();
        if (password === '' || password !== confirmPassword) {
            isValid = false;
            document.getElementById('password').classList.add('is-invalid');
            document.getElementById('confirmPassword').classList.add('is-invalid');
        } else {
            document.getElementById('password').classList.remove('is-invalid');
            document.getElementById('confirmPassword').classList.remove('is-invalid');
        }

        // Check uniqueness of Employee ID
        var employeeId = form.employee_id.value.trim();
        if (employeeId !== '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/check_unique_employee_id'); ?>',
                data: {employee_id: employeeId},
                dataType: 'json',
                async: false, // Ensure synchronous execution
                success: function(response) {
                    if (!response.is_unique) {
                        isValid = false;
                        document.getElementById('employeeIdError').classList.remove('d-none');
                        document.getElementById('employee_id').classList.add('is-invalid');
                    } else {
                        document.getElementById('employeeIdError').classList.add('d-none');
                        document.getElementById('employee_id').classList.remove('is-invalid');
                    }
                }
            });
        }

        // Check uniqueness of Email ID
        var email = form.email.value.trim();
        if (email !== '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/check_unique_email'); ?>',
                data: {email: email},
                dataType: 'json',
                async: false, // Ensure synchronous execution
                success: function(response) {
                    if (!response.is_unique) {
                        isValid = false;
                        document.getElementById('emailError').classList.remove('d-none');
                        document.getElementById('email').classList.add('is-invalid');
                    } else {
                        document.getElementById('emailError').classList.add('d-none');
                        document.getElementById('email').classList.remove('is-invalid');
                    }
                }
            });
        }

        if (isValid) {
            // If all validations pass, submit the form
            form.submit();
        }
    });






    
        function view_employee(id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . 'admin/view_employee'; ?>',
                data: {id: id},
                success: function(response) {
                    $('#viewemployee').html(response);
                }
            });
        }




        function edit_employee(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url().'admin/edit_employee';?>',
                data:{id:id},
                success:function(response){
                    $('#employeeedit').html(response);
                    
                }
            });
        }



        function delete_employee(id)
        {
            var a = confirm("Are you sure !.");
            if(a == true){
                $.ajax({
                    url:'<?php echo base_url().'admin/delete_employee';?>',
                    method:'POST',
                    data:{id:id},
                    success: function (response) {
                        // Reload the page after successful deletion
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            }
        }



        function view_salary(id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . 'admin/view_employee_salary'; ?>',
                data: {id: id},
                success: function(response) {
                    $('#viewsalary').html(response);
                }
            });
        }





        function view_leave(id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() . 'admin/employee_leave_info'; ?>',
                data: {id: id},
                success: function(response) {
                    $('#viewleave').html(response);
                }
            });
        }




        // JavaScript function using jQuery for Ajax
        function toggleStatus(id, currentStatus) {
            var newStatus = (currentStatus == 1) ? 0 : 1;
            var confirmation = confirm("Are you sure you want to change the status?");

            if (confirmation) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('admin/toggle_status'); ?>',
                    data: {
                        id: id,
                        employee_status: newStatus // Ensure this matches the parameter name expected by the controller
                    },
                    success: function(response) {
                        alert(response); // Show response message
                        location.reload(); // Refresh the page or update UI as needed
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log errors to console
                        // Handle error scenario if needed
                    }
                });
            }
        }








</script>

