<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Leave</h4>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#applyLeaveModal"
              >
                <i class="fa fa-plus"></i>
                Apply Leave
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
                        <th>sl.no</th>
                        <th>Leave Type</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Description</th>
                        <th>Applied Date</th>
                        <th>Admin Remark</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>sl.no</th>
                        <th>Leave Type</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Description</th>
                        <th>Applied Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (empty($leave_history)) : ?>
                        <tr>
                            <td colspan="8" class="text-center">No leave history found</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($leave_history as $index => $leave): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $leave['leave_type']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($leave['from_date'])); ?></td>
                                <td><?php echo date('d-M-Y', strtotime($leave['to_date'])); ?></td>
                                <td><?php echo $leave['description']; ?></td>
                                <td><?php echo date('d-M-Y, h:i A', strtotime($leave['created_at'])); ?></td>
                                <td><?php echo $leave['admin_remark']; ?></td>
                                <td>
                                    <?php if ($leave['status'] == 0): ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php elseif ($leave['status'] == 1): ?>
                                        <span class="badge bg-success">Approved</span>
                                    <?php elseif ($leave['status'] == 2): ?>
                                        <span class="badge bg-danger">Rejected</span>
                                    <?php endif; ?>
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

<!-- Apply Leave Modal -->
<div class="modal fade" id="applyLeaveModal" tabindex="-1" aria-labelledby="applyLeaveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyLeaveModalLabel">Apply Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applyLeaveForm" action="<?php echo base_url('employee/apply_leave'); ?>" method="post" enctype="multipart/form-data" novalidate>
                    <div class="mb-3">
                        <label for="leave_type" class="form-label">Leave Type</label>
                        <select class="form-control" id="leave_type" name="leave_type" required>
                            <option value="" disabled selected>Select Leave Type</option>
                            <?php foreach ($leave_types as $leave_type): ?>
                                <option value="<?php echo $leave_type['id']; ?>"><?php echo $leave_type['leave_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Please select a leave type.</div>
                    </div>
                    <div class="mb-3">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="from_date" name="from_date" required>
                        <div class="invalid-feedback">Please select a start date.</div>
                    </div>
                    <div class="mb-3">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" class="form-control" id="to_date" name="to_date" required>
                        <div class="invalid-feedback">Please select an end date.</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        <div class="invalid-feedback">Please provide a description.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
  })();

  // Custom validation for date fields
  document.getElementById('applyLeaveForm').addEventListener('submit', function(event) {
    var fromDate = document.getElementById('from_date');
    var toDate = document.getElementById('to_date');
    var today = new Date().toISOString().split('T')[0];

    if (fromDate.value < today) {
      fromDate.setCustomValidity('From Date cannot be before today');
    } else {
      fromDate.setCustomValidity('');
    }

    if (toDate.value < today) {
      toDate.setCustomValidity('To Date cannot be before today');
    } else {
      toDate.setCustomValidity('');
    }

    if (fromDate.value > toDate.value) {
      toDate.setCustomValidity('To Date cannot be before From Date');
    } else {
      toDate.setCustomValidity('');
    }

    if (!this.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    this.classList.add('was-validated');
  });
</script>
