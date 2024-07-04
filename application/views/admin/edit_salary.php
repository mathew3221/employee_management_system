<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <?php echo form_open_multipart("admin/update_salary", array("id" => "editForm")); ?>
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $salary[0]['id']; ?>">

        <div class="row">
            <div class="mb-3">
                <label for="employee" class="form-label">Name</label>
                <input type="text" class="form-control" id="employee" name="employee" value="<?php echo $salary[0]['first_name'] . ' ' . $salary[0]['last_name']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="department_name" class="form-label">Department</label>
                <input type="text" class="form-control" id="department_name" name="department_name" value="<?php echo $salary[0]['department_name']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $salary[0]['salary']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="allowance" class="form-label">Allowance</label>
                <input type="number" class="form-control" id="allowance" name="allowance" value="<?php echo $salary[0]['allowance']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="total_salary" class="form-label">Total Salary</label>
                <input type="number" class="form-control" id="total_salary" name="total_salary" value="<?php echo $salary[0]['total_salary']; ?>" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>