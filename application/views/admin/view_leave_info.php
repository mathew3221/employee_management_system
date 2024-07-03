<?php if (!empty($leave)) { ?>
    <div class="modal-body">
        <?php foreach ($leave as $le) { ?>
            <div class="card mb-3">
                <div class="card-header">
                    <!-- <h4 class="card-title mb-0"><?php echo $le['first_name'] . ' ' . $le['last_name']; ?></h4> -->
                    <h5 class="card-subtitle mb-1"><strong><?php echo $le['leave_type']; ?></strong></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <p><strong>From:</strong> <?php echo date('M d, Y', strtotime($le['from_date'])); ?></p>
                            <p><strong>To:</strong> <?php echo date('M d, Y', strtotime($le['to_date'])); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p><strong>Status:</strong> 
                                <?php
                                if ($le['status'] == 0) {
                                    echo '<span class="badge bg-warning">Pending</span>';
                                } elseif ($le['status'] == 1) {
                                    echo '<span class="badge bg-success">Approved</span>';
                                } elseif ($le['status'] == 2) {
                                    echo '<span class="badge bg-danger">Rejected</span>';
                                }
                                ?>
                            </p>
                            <?php if (!empty($le['admin_remark'])) { ?>
                                <p><strong>Admin Remark:</strong> <?php echo $le['admin_remark']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-sm-4">
                            <p class="card-text"><strong>Description:</strong><br><?php echo $le['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="modal-body">
        <p>No leave applications found.</p>
    </div>
<?php } ?>
