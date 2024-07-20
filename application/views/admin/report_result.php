<div class="container">
  <<!-- div class="page-inner">
   <div class="page-header">
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
              <h2 class="mb-4">Report Result</h2>
              <a href="<?php echo base_url('admin/report'); ?>" class="btn btn-secondary mb-3">Back to Report Form</a>
              
              <h3>Salary Data</h3>
              <?php if (empty($salary_data)): ?>
                  <div class="alert alert-info">No salary records found for the selected date range.</div>
              <?php else: ?>
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Employee Name</th>
                              <th>Department</th>
                              <th>Amount</th>
                              <th>Date</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($salary_data as $row): ?>
                              <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                  <td><?php echo $row['department_name']; ?></td>
                                  <td><?php echo $row['total_salary']; ?></td>
                                  <td><?php echo $row['added_on']; ?></td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              <?php endif; ?>
              
              <h3>Leave Data</h3>
              <?php if (empty($leave_data)): ?>
                  <div class="alert alert-info">No leave records found for the selected date range.</div>
              <?php else: ?>
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Employee Name</th>
                              <th>Leave Type</th>
                              <th>From Date</th>
                              <th>To Date</th>
                              <th>Description</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($leave_data as $row): ?>
                              <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                  <td><?php echo $row['leave_type']; ?></td>
                                  <td><?php echo $row['from_date']; ?></td>
                                  <td><?php echo $row['to_date']; ?></td>
                                  <td><?php echo $row['description']; ?></td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              <?php endif; ?>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
