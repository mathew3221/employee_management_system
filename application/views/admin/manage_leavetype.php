<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Leave Type</h4>
              <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addLeaveTypeModal">
                <i class="fa fa-plus"></i>
                Add Leave Type
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th class="col-1">#</th>
                    <th>Leave Type</th>
                    <th class="col-3">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="col-1">#</th>
                    <th>Leave Type</th>
                    <th class="col-3">Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (empty($leave_type)) : ?>
                    <tr>
                      <td colspan="3" class="text-center">No leave types found</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach ($leave_type as $i => $lt) : ?>
                      <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $lt['leave_type']; ?></td>
                        <td>
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editleaveModal<?php echo $lt['id']; ?>"><i class="fas fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-sm" title="delete" onclick="delete_leavetype(<?php echo $lt['id']; ?>);"><i class="fas fa-trash-alt"></i></button>
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

<!-- Edit Modals -->
<?php foreach ($leave_type as $lt) : ?>
  <div class="modal fade" id="editleaveModal<?php echo $lt['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $lt['id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel<?php echo $lt['id']; ?>">Edit Leave Type</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/update_leave_type'); ?>" method="post">
            <div class="mb-3">
              <label for="editLeavetype<?php echo $lt['id']; ?>" class="form-label">Leave Type</label>
              <input type="text" class="form-control" id="editLeavetype<?php echo $lt['id']; ?>" name="edit_leave_type" value="<?php echo $lt['leave_type']; ?>" required>
              <input type="hidden" name="leaveTypeId" value="<?php echo $lt['id']; ?>">
            </div>
            <button type="submit" class="btn btn-secondary btn-sm">Update Leave Type</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Add Leave Type Modal -->
<div class="modal fade" id="addLeaveTypeModal" tabindex="-1" role="dialog" aria-labelledby="addLeaveTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLeaveTypeModalLabel">Add Leave Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addLeaveTypeForm">
          <div class="mb-3">
            <label for="leaveType" class="form-label">Leave Type</label>
            <input type="text" class="form-control" id="leaveType" name="leave_type" required>
          </div>
          <button type="submit" class="btn btn-primary btn-sm">Add Leave Type</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#addLeaveTypeForm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        url: '<?php echo base_url('admin/save_leavetype'); ?>',
        method: 'POST',
        data: $(this).serialize(),
        success: function (response) {
          $('#addLeaveTypeModal').modal('hide');
          location.reload(); // Reload the page to see the new leave type
        },
        error: function (xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
  });

  function delete_leavetype(id) {
        var confirmDelete = confirm("Are you sure you want to delete?");
        if (confirmDelete) {
            $.ajax({
                url: '<?php echo base_url('admin/delete_leavetype'); ?>',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    location.reload();
                },
            });
        }
    }
</script>
