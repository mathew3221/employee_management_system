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
                                    <?php if (!empty($employee['photo'])) : ?>
                                        <img src="<?php echo base_url($employee['photo']); ?>" alt="Profile Image" class="avatar-img rounded-circle">
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


<div class="modal fade" id="addEmployeeModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Changed to modal-md -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm" action="<?php echo base_url('admin/save_employee'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control form-control-sm" id="employee_id" name="employee_id" required>
                        <small id="employeeIdError" class="form-text text-danger d-none">Employee ID already exists.</small>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control form-control-sm" id="first_name" name="first_name">
                            <small id="firstNameError" class="form-text text-danger d-none">First Name is required.</small>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control form-control-sm" id="last_name" name="last_name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="department_name" class="form-label">Department</label>
                            <select class="form-select form-select-sm" id="department_name" name="department_name">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $dt) : ?>
                                    <option value="<?php echo $dt['id']; ?>"><?php echo $dt['department_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small id="departmentError" class="form-text text-danger d-none">Department is required.</small>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email ID</label>
                            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                            <small id="emailError" class="form-text text-danger d-none">Email already exists.</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mobile_no" class="form-label">Mobile No</label>
                            <input type="text" class="form-control form-control-sm" id="mobile_no" name="mobile_no" required>
                            <small id="mobileNoError" class="form-text text-danger d-none">Mobile number must be 10 digits.</small>
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control form-control-sm" id="country" name="country">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control form-control-sm" id="state" name="state">
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control form-control-sm" id="city" name="city">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth">
                            <small id="dateOfBirthError" class="form-text text-danger d-none">Date of Birth is required.</small>
                        </div>
                        <div class="col-md-6">
                            <label for="date_of_joining" class="form-label">Date of Joining</label>
                            <input type="date" class="form-control form-control-sm" id="date_of_joining" name="date_of_joining">
                            <small id="dateOfJoiningError" class="form-text text-danger d-none">Date of Joining is required.</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control form-control-sm" id="photo" name="photo">
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control form-control-sm" id="address" name="address" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                            <small id="passwordError" class="form-text text-danger d-none">Password is required.</small>
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-sm" id="confirmPassword" name="confirmPassword" required>
                            <small id="confirmPasswordError" class="form-text text-danger d-none">Passwords do not match.</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
                <h5 class="modal-title" id="viewModalLabel">View Employee Salary</h5>
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
                <h5 class="modal-title" id="viewModalLabel">View Employee Leave</h5>
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
            var isValid = true;
            var form = this;


            var firstName = form.first_name.value.trim();
            if (firstName === '') {
                isValid = false;
                document.getElementById('firstNameError').classList.remove('d-none');
            } else {
                document.getElementById('firstNameError').classList.add('d-none');
            }

            var mobileNo = form.mobile_no.value.trim();
            if (mobileNo.length !== 10 || !/^\d{10}$/.test(mobileNo)) {
                isValid = false;
                document.getElementById('mobileNoError').classList.remove('d-none');
            } else {
                document.getElementById('mobileNoError').classList.add('d-none');
            }

            var department = form.department_name.value.trim();
            if (department === '') {
                isValid = false;
                document.getElementById('departmentError').classList.remove('d-none');
            } else {
                document.getElementById('departmentError').classList.add('d-none');
            }


            var dateOfBirth = form.date_of_birth.value.trim();
            if (dateOfBirth === '') {
                isValid = false;
                document.getElementById('dateOfBirthError').textContent = 'Date of Birth is required.';
                document.getElementById('dateOfBirthError').classList.remove('d-none');
            } else {
                var currentDate = new Date();
                var selectedDate = new Date(dateOfBirth);
                if (selectedDate > currentDate) {
                    isValid = false;
                    document.getElementById('dateOfBirthError').textContent = 'Date of Birth cannot be in the future.';
                    document.getElementById('dateOfBirthError').classList.remove('d-none');
                } else {
                    document.getElementById('dateOfBirthError').classList.add('d-none');
                }
            }


            var dateOfJoining = form.date_of_joining.value.trim();
            if (dateOfJoining === '') {
                isValid = false;
                document.getElementById('dateOfJoiningError').classList.remove('d-none');
            } else {
                document.getElementById('dateOfJoiningError').classList.add('d-none');
            }



            

            if (!isValid) {
                event.preventDefault();
            }
        });



        document.getElementById('addEmployeeForm').addEventListener('input', function(event) {
            var isValid = true;
            var form = this;

            var password = form.password.value.trim();
            var confirmPassword = form.confirmPassword.value.trim();
            if (password === '' || password !== confirmPassword) {
                isValid = false;
                document.getElementById('passwordError').classList.remove('d-none');
                document.getElementById('confirmPasswordError').classList.remove('d-none');
            } else {
                document.getElementById('passwordError').classList.add('d-none');
                document.getElementById('confirmPasswordError').classList.add('d-none');
            }


            if (!isValid) {
                event.preventDefault();
            }
        });


        // Check uniqueness of Employee ID
        document.getElementById('employee_id').addEventListener('input', function() {
            var employeeId = this.value.trim();
            if (employeeId !== '') {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('admin/check_unique_employee_id'); ?>',
                    data: {employee_id: employeeId},
                    dataType: 'json',
                    success: function(response) {
                        if (!response.is_unique) {
                            document.getElementById('employeeIdError').classList.remove('d-none');
                            document.getElementById('addEmployeeForm').querySelector('button[type="submit"]').disabled = true;
                        } else {
                            document.getElementById('employeeIdError').classList.add('d-none');
                            document.getElementById('addEmployeeForm').querySelector('button[type="submit"]').disabled = false;
                        }
                    }
                });
            }
        });

        document.getElementById('email').addEventListener('input', function() {
            var email = this.value.trim();
            if (email !== '') {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('admin/check_unique_email'); ?>',
                    data: {email: email},
                    dataType: 'json',
                    success: function(response) {
                        if (!response.is_unique) {
                            document.getElementById('emailError').classList.remove('d-none');
                            document.getElementById('addEmployeeForm').querySelector('button[type="submit"]').disabled = true;
                        } else {
                            document.getElementById('emailError').classList.add('d-none');
                            document.getElementById('addEmployeeForm').querySelector('button[type="submit"]').disabled = false;
                        }
                    }
                });
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

