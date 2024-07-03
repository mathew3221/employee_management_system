<div class="container">
  <div class="page-inner">
<!--     <div class="page-header">
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/dashboard'); ?>">Admin</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Department</a>
        </li>
      </ul>
    </div> -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Department</h4>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#addDepartmentModal"
              >
                <i class="fa fa-plus"></i>
                Add Department
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th class="col-md-3">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th class="col-md-3">Action</th>
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
                                    <button type="button" class="btn btn-danger btn-sm" data-department-id="<?php echo $dt['id']; ?>"><i class="fas fa-trash-alt"></i></button>
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



<!-- Edit Modals (moved outside the table to correct HTML structure) -->
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
                        <button type="submit" class="btn btn-primary">Update Department</button>
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
                    <button type="submit" class="btn btn-success">Submit</button>
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

        $('.delete-department').click(function () {
            var departmentId = $(this).data('department-id');

            if (confirm("Are you sure you want to delete this department?")) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin/delete_department'); ?>",
                    data: {
                        department_id: departmentId
                    },
                    success: function (response) {
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });



        document.getElementById('searchBar').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                let departmentName = row.cells[1].innerText.toLowerCase();
                if (departmentName.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });




    });
</script>
