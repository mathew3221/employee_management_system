<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Department</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                                <i class="fa fa-plus"></i>
                                Add Department
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-1">#</th>
                                        <th>Department Name</th>
                                        <th class="col-3">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="col-1">#</th>
                                        <th>Department Name</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (empty($departments)) : ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No departments found</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php foreach ($departments as $i => $dt) : ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $dt['department_name']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $dt['id']; ?>"><i class="fas fas fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" title="delete" onclick="delete_department(<?php echo $dt['id']; ?>);"><i class="fas fa-trash-alt"></i></button>
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
<?php foreach ($departments as $dt) : ?>
    <div class="modal fade" id="editModal<?php echo $dt['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $dt['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?php echo $dt['id']; ?>">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/update_department'); ?>" method="post">
                        <div class="mb-3">
                            <label for="editDepartmentName<?php echo $dt['id']; ?>" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="editDepartmentName<?php echo $dt['id']; ?>" name="edit_department_name" value="<?php echo $dt['department_name']; ?>" required>
                            <input type="hidden" name="department_id" value="<?php echo $dt['id']; ?>">
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm">Update Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addDepartmentForm" action="<?php echo base_url('admin/save_department'); ?>" method="post">
                    <div class="mb-3">
                        <label for="department_name" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name" placeholder="Enter department name" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Add Department</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#addDepartmentForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url('admin/save_department'); ?>',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    $('#addDepartmentModal').modal('hide');
                    location.reload(); // Reload the page to see the new department
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    function delete_department(id) {
        var confirmDelete = confirm("Are you sure you want to delete?");
        if (confirmDelete) {
            $.ajax({
                url: '<?php echo base_url('admin/delete_department'); ?>',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    location.reload();
                },
            });
        }
    }
</script>
