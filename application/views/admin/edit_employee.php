<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <?php echo form_open_multipart("admin/update_employee", array("id" => "editForm")); ?>
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $employee[0]['id']; ?>">

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <label for="employee_id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control form-control-sm" id="employee_id" name="employee_id" value="<?php echo $employee[0]['employee_id']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" value="<?php echo $employee[0]['first_name']; ?>" required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" value="<?php echo $employee[0]['last_name']; ?>" required>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label for="email" class="form-label">Email ID</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $employee[0]['email']; ?>" required>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label for="department_name" class="form-label">Department</label>
                        <select class="form-select form-select-sm" id="department_name" name="department_name" required>
                            <?php foreach ($departments as $department) : ?>
                                <option value="<?php echo $department['id']; ?>" <?php if ($employee[0]['department_name'] == $department['department_name']) echo 'selected'; ?>>
                                    <?php echo $department['department_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="mobile_no" class="form-label">Mobile No</label>
                        <input type="text" class="form-control form-control-sm" id="mobile_no" name="mobile_no" value="<?php echo $employee[0]['mobile_no']; ?>" required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select form-select-sm" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php if ($employee[0]['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($employee[0]['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if ($employee[0]['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control form-control-sm" id="state" name="state" value="<?php echo $employee[0]['state']; ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control form-control-sm" id="photo" name="photo">
                        <?php if (!empty($employee[0]['photo'])) : ?>
                            <img src="<?php echo base_url($employee[0]['photo']); ?>" alt="Employee Photo" class="img-fluid mt-2 rounded-circle" width="80" height="80">
                        <?php else : ?>
                            <p class="mt-2">No photo available</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth" value="<?php echo $employee[0]['date_of_birth']; ?>" required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="date_of_joining" class="form-label">Date of Joining</label>
                        <input type="date" class="form-control form-control-sm" id="date_of_joining" name="date_of_joining" value="<?php echo $employee[0]['date_of_joining']; ?>" required>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control form-control-sm" id="address" name="address" rows="4"><?php echo $employee[0]['address']; ?></textarea>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" name="password" value="<?php echo $employee[0]['password']; ?>" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
