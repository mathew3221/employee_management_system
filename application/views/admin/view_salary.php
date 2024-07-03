<?php if (!empty($employee)) { ?>
    <div class="modal-body">
        <?php foreach ($employee as $ee) { ?>
            <div class="card mb-3">
                <div class="card-header">
                    <!-- <h5 class="card-title mb-0"><strong><?php echo $ee['first_name'] . ' ' . $ee['last_name']; ?></strong></h5> -->
                    <p class="card-text mb-1"><?php echo $ee['added_on']; ?></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted"><strong>Salary:</strong></h6>
                                <p class="card-text"><?php echo $ee['salary']; ?></p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-muted"><strong>Total Salary:</strong></h6>
                                <p class="card-text"><?php echo $ee['total_salary']; ?></p>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h6 class="text-muted"><strong>Allowance:</strong></h6>
                                <p class="card-text"><?php echo $ee['allowance']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="modal-body">
        <p class="text-muted">No employee data available.</p>
    </div>
<?php } ?>
