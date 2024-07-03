<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Take Leave Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <?php echo form_open_multipart("admin/update_leave_application", array("id" => "leaveActionForm")); ?>
    <div class="modal-body">
        <input type="hidden" name="id" value="<?php echo $application['id']; ?>">
        <div class="form-group">
            <label for="status" class="form-label">Leave Action:</label>
            <select class="form-select" id="status" name="status" required>
                <option value="0" <?php echo ($application['status'] == 0) ? 'selected' : ''; ?>>Pending</option>
                <option value="1" <?php echo ($application['status'] == 1) ? 'selected' : ''; ?>>Approve</option>
                <option value="2" <?php echo ($application['status'] == 2) ? 'selected' : ''; ?>>Rejected</option>
            </select>
        </div>
        <div class="form-group">
            <label for="admin_remark" class="form-label">Admin Remark:</label>
            <textarea class="form-control" id="admin_remark" name="admin_remark" rows="3" required><?php echo $application['admin_remark']; ?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
