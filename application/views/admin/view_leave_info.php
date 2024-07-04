<?php if (!empty($leave)) { ?>
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <tbody>
                <?php foreach ($leave as $index => $le) { ?>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $le['first_name'] . ' ' . $le['last_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Leave Type:</th>
                        <td><strong><?php echo $le['leave_type']; ?></strong></td>
                    </tr>
                    <tr>
                        <th>From:</th>
                        <td><?php echo date('d/M/Y', strtotime($le['from_date'])); ?></td>
                    </tr>
                    <tr>
                        <th>To:</th>
                        <td><?php echo date('d/M/Y', strtotime($le['to_date'])); ?></td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td><?php echo $le['description']; ?></td>
                    </tr>
                    <tr>
                        <th>Status:</th>
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
                    </tr>
                    <tr>
                        <th>Admin Remark:</th>
                        <td><?php echo !empty($le['admin_remark']) ? $le['admin_remark'] : '-'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <p>No employee data available.</p>
<?php } ?>