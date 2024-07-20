<div class="container">
  <div class="page-inner">
   <!-- <div class="page-header">
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Tables</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Datatables</a>
        </li>
      </ul>
    </div> -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="container mt-5">
                <h2 class="mb-4">Generate Report</h2>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form id="reportForm" action="<?php echo base_url('admin/generate_report'); ?>" method="post" novalidate>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="from_date" class="form-label">From Date</label>
                            <input type="date" class="form-control" id="from_date" name="from_date" required>
                            <div class="invalid-feedback" id="fromDateError">Please select a valid From Date.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="to_date" class="form-label">To Date</label>
                            <input type="date" class="form-control" id="to_date" name="to_date" required>
                            <div class="invalid-feedback" id="toDateError">Please select a valid To Date.</div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>


