<div class="container">
  <div class="page-inner">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Leave Applications</h4>
              
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
                        <th>Employee Name</th>
                        <th>Leave Type</th>
                        <th>From Date</th>
                        <th>To Date</th>
                        <th>Description</th>
                        <th>Status</th>
                        <!-- <th>Admin Remark</th> -->
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
                        <th>Description</th>
                        <th>Status</th>
                        <!-- <th>Admin Remark</th> -->
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (empty($leave_applications)) : ?>
                        <tr>
                            <td colspan="9" class="text-center">No leave applications found</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($leave_applications as $index => $application) : ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $application['first_name'] . ' ' . $application['last_name']; ?></td>
                                <td><?php echo $application['leave_type']; ?></td>
                                <td><?php echo $application['from_date']; ?></td>
                                <td><?php echo $application['to_date']; ?></td>
                                <td><?php echo $application['description']; ?></td>
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
                                <!-- <td><?php echo $application['admin_remark']; ?></td> -->
                                <td>
                                    <button class="btn btn-info btn-sm" title="Take Action" data-bs-toggle="modal" data-bs-target="#leaveactionModal" onclick="leave_action(<?php echo $application['id']; ?>);"><i class="fas fa-external-link-alt"></i></button>
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
<div class="modal fade" id="leaveactionModal" tabindex="-1" role="dialog" aria-labelledby="leaveactionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="leaveactionContent"></div>
    </div>
</div>

<script type="text/javascript">
    function leave_action(id){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/leave_action'); ?>',
            data: {id: id},
            success: function(response){
                $('#leaveactionContent').html(response);
            }
        });
    }




</script>
