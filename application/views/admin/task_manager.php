<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Task Manager</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                                <i class="fa fa-plus"></i>
                                Assign Task
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Task</th>
                                        <th>Created Date</th>
                                        <th>Started Date</th>
                                        <th>Finished Date</th>
                                        <th>Task Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Task</th>
                                        <th>Created Date</th>
                                        <th>Started Date</th>
                                        <th>Finished Date</th>
                                        <th>Task Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (empty($task)) : ?>
                                        <tr>
                                            <td colspan="10" class="text-center">No task found</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php foreach ($task as $i => $tk) : ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $tk['first_name'] . ' ' . $tk['last_name']; ?></td>
                                                <td><?php echo $tk['task_title']; ?></td>
                                                <td><?php echo $tk['created_date']; ?></td>
                                                <td><?php echo $tk['started_date']; ?></td>
                                                <td><?php echo $tk['finished_date']; ?></td>
                                                <td>
                                                    <?php if ($tk['task_status'] == 'Pending'): ?>
                                                        <span class="badge bg-danger">Pending</span>
                                                    <?php elseif ($tk['task_status'] == 'In Progress'): ?>
                                                        <span class="badge bg-primary">In Progress</span>
                                                    <?php elseif ($tk['task_status'] == 'On Hold'): ?>
                                                        <span class="badge bg-warning text-dark">On Hold</span>
                                                    <?php elseif ($tk['task_status'] == 'Completed'): ?>
                                                        <span class="badge bg-success">Completed</span>
                                                    <?php endif; ?>
                                                </td>
                                                 <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $tk['id']; ?>"><i class="fas fa-eye"></i></button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $tk['id']; ?>"><i class="fas fas fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" title="delete" onclick="delete_task(<?php echo $tk['id']; ?>);"><i class="fas fa-trash-alt"></i></button>
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


<!-- View Task Details Modal -->
<?php foreach ($task as $tk) : ?>
    <div class="modal fade" id="viewModal<?php echo $tk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?php echo $tk['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel<?php echo $tk['id']; ?>">View Task Details</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Task Title</th>
                            <td><?php echo $tk['task_title']; ?></td>
                        </tr>
                        <tr>
                            <th>Task Description</th>
                            <td><?php echo $tk['task_description']; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $tk['department_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Employee Name</th>
                            <td><?php echo $tk['first_name'] . ' ' . $tk['last_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Created Date</th>
                            <td><?php echo $tk['created_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Started Date</th>
                            <td><?php echo $tk['started_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Finished Date</th>
                            <td><?php echo $tk['finished_date']; ?></td>
                        </tr>
                        <tr>
                            <th>Task Status</th>
                            <td>
                                <?php if ($tk['task_status'] == 'Pending'): ?>
                                    <span class="badge bg-danger">Pending</span>
                                <?php elseif ($tk['task_status'] == 'In Progress'): ?>
                                    <span class="badge bg-primary">In Progress</span>
                                <?php elseif ($tk['task_status'] == 'On Hold'): ?>
                                    <span class="badge bg-warning text-dark">On Hold</span>
                                <?php elseif ($tk['task_status'] == 'Completed'): ?>
                                    <span class="badge bg-success">Completed</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>





<!-- Add Task Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Assign New Task</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/add_task'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="department" class="form-label">Department</label>
                                <select class="form-select" id="department" name="department" required>
                                    <option value="">Select Department</option>
                                    <?php foreach ($departments as $dt) : ?>
                                        <option value="<?php echo $dt['id']; ?>"><?php echo $dt['department_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="employee" class="form-label">Employee</label>
                                <select class="form-select" id="employee" name="employee"></select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="task_title">Task Title</label>
                        <input type="text" class="form-control" id="task_title" name="task_title" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="task_description">Task Description</label>
                        <textarea class="form-control" id="task_description" name="task_description" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="created_date">Created Date</label>
                                <input type="date" class="form-control" id="created_date" name="created_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="started_date">Started Date</label>
                                <input type="date" class="form-control" id="started_date" name="started_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="finished_date">Finished Date</label>
                                <input type="date" class="form-control" id="finished_date" name="finished_date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="task_status">Task Status</label>
                        <select class="form-select" id="task_status" name="task_status" required>
                            <option value="">Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Task Modal -->
<?php foreach ($task as $tk) : ?>
    <div class="modal fade" id="editModal<?php echo $tk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $tk['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?php echo $tk['id']; ?>"><?php echo $tk['first_name'] . ' ' . $tk['last_name']; ?> Task</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('admin/update_task'); ?>" method="post">
                    <input type="hidden" name="task_id" value="<?php echo $tk['id']; ?>">  <!-- Correct field name -->
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="edit_task_title<?php echo $tk['id']; ?>">Task Title</label>
                            <input type="text" class="form-control" id="edit_task_title<?php echo $tk['id']; ?>" name="task_title" value="<?php echo $tk['task_title']; ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_task_description<?php echo $tk['id']; ?>">Task Description</label>
                            <textarea class="form-control" id="edit_task_description<?php echo $tk['id']; ?>" name="task_description" rows="3" required><?php echo $tk['task_description']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_created_date<?php echo $tk['id']; ?>">Created Date</label>
                                    <input type="date" class="form-control" id="edit_created_date<?php echo $tk['id']; ?>" name="created_date" value="<?php echo $tk['created_date']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_started_date<?php echo $tk['id']; ?>">Started Date</label>
                                    <input type="date" class="form-control" id="edit_started_date<?php echo $tk['id']; ?>" name="started_date" value="<?php echo $tk['started_date']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="edit_finished_date<?php echo $tk['id']; ?>">Finished Date</label>
                                    <input type="date" class="form-control" id="edit_finished_date<?php echo $tk['id']; ?>" name="finished_date" value="<?php echo $tk['finished_date']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_task_status<?php echo $tk['id']; ?>">Task Status</label>
                            <select class="form-select" id="edit_task_status<?php echo $tk['id']; ?>" name="task_status" required>
                                <option value="">Select Status</option>
                                <option value="Pending" <?php echo $tk['task_status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="In Progress" <?php echo $tk['task_status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Completed" <?php echo $tk['task_status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                <option value="On Hold" <?php echo $tk['task_status'] == 'On Hold' ? 'selected' : ''; ?>>On Hold</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<script type="text/javascript">
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

    function delete_task(id) {
        if (confirm('Are you sure you want to delete this task?')) {
            $.ajax({
                url: '<?php echo base_url('admin/delete_task'); ?>/' + id,
                type: 'POST', // Change to POST for better security practice
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Task deleted successfully.');
                        // Refresh the page to reflect the changes
                        location.reload();
                    } else {
                        alert('Error deleting task: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error); // Log the error to the console for debugging
                    alert('An error occurred. Please try again.');
                }
            });
        }
    }


    
</script>
