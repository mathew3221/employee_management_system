<?php if (!empty($leave)) { ?>
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Admin Remark</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leave as $le) { ?>
                        <tr>
                            <td><strong><?php echo $le['leave_type']; ?></strong></td>
                            <td><?php echo date('d/M/Y', strtotime($le['from_date'])); ?></td>
                            <td><?php echo date('d/M/Y', strtotime($le['to_date'])); ?></td>
                            <td>
                                <?php
                                if ($le['status'] == 0) {
                                    echo '<span class="badge bg-warning">Pending</span>';
                                } elseif ($le['status'] == 1) {
                                    echo '<span class="badge bg-success">Approved</span>';
                                } elseif ($le['status'] == 2) {
                                    echo '<span class="badge bg-danger">Rejected</span>';
                                }
                                ?>
                            </td>
                            <td><?php echo !empty($le['admin_remark']) ? $le['admin_remark'] : '-'; ?></td>
                            <td><?php echo $le['description']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="modal-body">
        <p>No leave applications found.</p>
    </div>
<?php } ?>
