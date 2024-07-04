<div class="container">
  <div class="page-inner">
    <!-- <div class="page-header">
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
          <a href="#">Salary</a>
        </li>
      </ul>
    </div> -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Salary</h4>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#addEmployeeModal"
              >
                <i class="fa fa-plus"></i>
                Add Salary
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
                        <th>#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Allowance</th>
                        <th>Total Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Allowance</th>
                        <th>Total Salary</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (empty($employees)) : ?>
                        <tr>
                            <td colspan="7" class="text-center">No salary found</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($employees as $i => $es) : ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $es['first_name'] . ' ' . $es['last_name']; ?></td>
                                <td><?php echo $es['department_name']; ?></td>
                                <td><?php echo $es['salary']; ?></td>
                                <td><?php echo $es['allowance']; ?></td>
                                <td><?php echo $es['total_salary']; ?></td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="View" data-bs-toggle="modal" data-bs-target="#viewsalaryModal" onclick="view_salary(<?php echo $es['employee']; ?>);">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-secondary btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#editsalaryModal" onclick="edit_salary(<?php echo $es['id']; ?>);">
                                        <i class="fas fa-edit"></i>
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

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm" action="<?php echo base_url('admin/save_salary'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="department_name" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department" required>
                            <option value="">Select Department</option>
                            <?php foreach ($departments as $dt) : ?>
                                <option value="<?php echo $dt['id']; ?>"><?php echo $dt['department_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="employee" class="form-label">Employee</label>
                        <select class="form-select" id="employee" name="employee"></select>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary">
                    </div>
                    <div class="mb-3">
                        <label for="allowance" class="form-label">Allowance</label>
                        <input type="number" class="form-control" id="allowance" name="allowance">
                    </div>
                    <div class="mb-3">
                        <label for="total_salary" class="form-label">Total Salary</label>
                        <input type="text" class="form-control" id="total_salary" name="total_salary" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Salary Modal -->
<div class="modal fade" id="viewsalaryModal" tabindex="-1" aria-labelledby="viewsalaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewsalaryModalLabel">View Employee Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewsalary">
                <!-- Salary details will be loaded dynamically here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="editsalaryModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" id="editsalary">
        <!-- Content loaded via AJAX -->
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#salary, #allowance').on('input', function () {
            var salary = parseFloat($('#salary').val()) || 0;
            var allowance = parseFloat($('#allowance').val()) || 0;
            var totalSalary = salary + allowance;
            $('#total_salary').val(totalSalary.toFixed(2));
        });

        $('#department').change(function() {
            var departmentId = $(this).val();
            if (departmentId) {
                $.ajax({
                    url: '<?php echo base_url('admin/get_employees_by_department'); ?>',
                    type: 'POST',
                    data: {department_id: departmentId},
                    success: function(response) {
                        $('#employee').html(response);
                    }
                });
            } else {
                $('#employee').html('<option value="">Select Employee</option>');
            }
        });
    });

    function view_salary(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() . 'admin/view_employee'; ?>',
            data: {id: id},
            success: function(response) {
                $('#viewsalary').html(response);
            }
        });
    }



    function edit_salary(id){
        $.ajax({
            type:'POST',
            url:'<?php echo base_url().'admin/edit_salary';?>',
            data:{id:id},
            success:function(response){
                $('#editsalary').html(response);
                
            }
        });
    }



    document.getElementById('searchBar').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            let name = row.cells[1].innerText.toLowerCase();
            let department = row.cells[2].innerText.toLowerCase();
            if (name.includes(filter) || department.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });




</script>
