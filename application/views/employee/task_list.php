<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Task</h4>
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
                        <th>Sl. No</th>
                        <th>Task Title</th>
                        <th>Description</th>
                        <th>Create On</th>
                        <th>Started On</th>
                        <th>Finished On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Sl. No</th>
                        <th>Task Title</th>
                        <th>Description</th>
                        <th>Create On</th>
                        <th>Started On</th>
                        <th>Finished On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (empty($task)) : ?>
                        <tr>
                            <td colspan="8" class="text-center">No Task Available</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($task as $index => $tk): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $tk['task_title']; ?></td>
                                <td><?php echo $tk['task_description']; ?></td>
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
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $tk['id']; ?>"><i class="fas fas fa-edit"></i>
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


<!-- Edit Task Modal -->
<?php foreach ($task as $tk): ?>
    <div class="modal fade" id="editModal<?php echo $tk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $tk['id']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?php echo $tk['id']; ?>">Update Task</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('employee/update_task/' . $tk['id']); ?>" method="post">
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label for="task_title">Task Title</label>
                            <input type="text" class="form-control" id="task_title" name="task_title" value="<?php echo $tk['task_title']; ?>" required>
                        </div> -->
                        <div class="form-group">
                            <label for="task_description">Task Description</label>
                            <textarea class="form-control" id="task_description" name="task_description" rows="3" required><?php echo $tk['task_description']; ?></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for="created_date">Created Date</label>
                            <input type="date" class="form-control" id="created_date" name="created_date" value="<?php echo $tk['created_date']; ?>">
                        </div> -->
                        <div class="form-group">
                            <label for="started_date">Started Date</label>
                            <input type="date" class="form-control" id="started_date" name="started_date" value="<?php echo $tk['started_date']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="finished_date">Finished Date</label>
                            <input type="date" class="form-control" id="finished_date" name="finished_date" value="<?php echo $tk['finished_date']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="task_status">Task Status</label>
                            <select class="form-select" id="task_status" name="task_status" required>
                                <option value="">Select Status</option>
                                <option value="Pending" <?php echo ($tk['task_status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="In Progress" <?php echo ($tk['task_status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                <option value="Completed" <?php echo ($tk['task_status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                <option value="On Hold" <?php echo ($tk['task_status'] == 'On Hold') ? 'selected' : ''; ?>>On Hold</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
