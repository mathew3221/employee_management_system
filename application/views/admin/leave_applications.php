<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
              <h4 class="card-title">Leave Applications</h4>
              <div>
                  <select id="statusFilter" class="form-select" onchange="filterByStatus()">
                <option value="all">All</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Rejected</option>
              </select>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="basic-datatables" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (empty($leave_applications)) : ?>
                  <tr>
                    <td colspan="7" class="text-center">No leave applications found</td>
                  </tr>
                  <?php else : ?>
                  <?php foreach ($leave_applications as $index => $application) : ?>
                  <tr id="row-<?php echo $index; ?>" data-status="<?php echo $application['status']; ?>">
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $application['first_name'] . ' ' . $application['last_name']; ?></td>
                    <td><?php echo $application['leave_type']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($application['from_date'])); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($application['to_date'])); ?></td>
                    <td>
                      <?php
                      $status_label = '';
                      $status_class = '';
                      switch ($application['status']) {
                        case 0:
                          $status_label = 'Pending';
                          $status_class = 'badge bg-warning text-dark';
                          break;
                        case 1:
                          $status_label = 'Approved';
                          $status_class = 'badge bg-success';
                          break;
                        case 2:
                          $status_label = 'Rejected';
                          $status_class = 'badge bg-danger';
                          break;
                        default:
                          $status_label = 'Unknown';
                          $status_class = 'badge bg-secondary';
                          break;
                      }
                      ?>
                      <span class="<?php echo $status_class; ?>"><?php echo $status_label; ?></span>
                    </td>
                    <td>
                      <button class="btn btn-info btn-sm" title="info" data-bs-toggle="modal"
                        data-bs-target="#vieweleaveModal" onclick="view_leave_info(<?php echo $application['id']; ?>);"><i
                          class="fas fa-eye"></i></button>
                      <button class="btn btn-warning btn-sm" title="Take Action" data-bs-toggle="modal"
                        data-bs-target="#leaveactionModal" onclick="leave_action(<?php echo $application['id']; ?>);"><i
                          class="fas fa-external-link-alt"></i></button>
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

<!-- Leave Action Modal -->
<div class="modal fade" id="leaveactionModal" tabindex="-1" role="dialog" aria-labelledby="leaveactionModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="leaveactionContent"></div>
  </div>
</div>

<div class="modal fade" id="vieweleaveModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="viewModalLabel">Details</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="viewleaveinfo">
        <!-- Content loaded via AJAX -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function leave_action(id) {
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url('admin/leave_action'); ?>',
      data: { id: id },
      success: function (response) {
        $('#leaveactionContent').html(response);
      }
    });
  }

  function view_leave_info(id) {
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url() . 'admin/view_leave_info'; ?>',
      data: { id: id },
      success: function (response) {
        $('#viewleaveinfo').html(response);
      }
    });
  }

  function filterByStatus() {
    var selectedStatus = document.getElementById("statusFilter").value;
    var table = document.getElementById("basic-datatables");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var rowStatus = row.getAttribute("data-status");

      if (selectedStatus === "all" || rowStatus === selectedStatus) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }

  // Function to get URL parameters
  function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }

  // Set the filter based on URL parameter
  document.addEventListener("DOMContentLoaded", function () {
    var statusParam = getUrlParameter('status');
    if (statusParam) {
      document.getElementById("statusFilter").value = statusParam;
      filterByStatus();
    }
  });
</script>