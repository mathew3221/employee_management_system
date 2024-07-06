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
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Employee ID</label>
                    <input type="text" class="form-control form-control-sm" id="employee_id" name="employee_id" value="<?php echo $employee[0]['employee_id']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" value="<?php echo $employee[0]['first_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" value="<?php echo $employee[0]['last_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="department_name" class="form-label">Department</label>
                    <select class="form-select" id="department_name" name="department_name" required>
                        <?php foreach ($departments as $department) : ?>
                            <option value="<?php echo $department['id']; ?>" <?php if ($employee[0]['department_name'] == $department['department_name']) echo 'selected'; ?>>
                                <?php echo $department['department_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email ID</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $employee[0]['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="mobile_no" class="form-label">Mobile No</label>
                    <input type="text" class="form-control form-control-sm" id="mobile_no" name="mobile_no" value="<?php echo $employee[0]['mobile_no']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control form-control-sm" id="city" name="city" value="<?php echo $employee[0]['city']; ?>">
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control form-control-sm" id="country" name="country" value="<?php echo $employee[0]['country']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control form-control-sm" id="photo" name="photo">
                    <?php if (!empty($employee[0]['photo'])) : ?>
                        <img src="<?php echo base_url($employee[0]['photo']); ?>" alt="Employee Photo" class="img-fluid mt-2" width="120" height="120">
                    <?php else : ?>
                        <p class="mt-2">No photo available</p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control form-control-sm" id="date_of_birth" name="date_of_birth" value="<?php echo $employee[0]['date_of_birth']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="date_of_joining" class="form-label">Date of Joining</label>
                    <input type="date" class="form-control form-control-sm" id="date_of_joining" name="date_of_joining" value="<?php echo $employee[0]['date_of_joining']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control form-control-sm" id="address" name="address" rows="3" required><?php echo $employee[0]['address']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control form-control-sm" id="state" name="state" value="<?php echo $employee[0]['state']; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" value="<?php echo $employee[0]['password']; ?>" required>
                </div>

                <!-- Uncomment this section if you want to include password confirmation -->
                <!--
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control form-control-sm" id="confirmPassword" name="confirmPassword" required>
                </div>
                -->
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
