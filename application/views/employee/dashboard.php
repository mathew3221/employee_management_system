<div class="container">
    <div class="page-inner">
        <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
              </div>
            </div>
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <a href="<?php echo base_url('employee/salary'); ?>">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-wallet text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total salary</p>
                                    <h4 class="card-title">
                                        <?php echo '&#8377 ' . number_format($total_salary_given, 2); ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                       </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <a href="<?php echo base_url('employee/leave_history'); ?>">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-pie-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Applied Leave</p>
                                    <h4 class="card-title"><?php echo $applied_leave; ?></h4>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <a href="<?php echo base_url('employee/leave_history'); ?>">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-close text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Approved Leave</p>
                                    <h4 class="card-title"><?php echo $approved_leave; ?></h4>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
