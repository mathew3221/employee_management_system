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
            <div class="d-flex align-items-center">
              <h4 class="card-title">Salary</h4>
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
                        <th>salary</th>
                        <th>allowance</th>
                        <th>total_salary</th>
                        <th>Added on</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>sl.no</th>
                        <th>salary</th>
                        <th>allowance</th>
                        <th>total_salary</th>
                        <th>Added on</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (empty($salary)) : ?>
                        <tr>
                            <td colspan="5" class="text-center">No salary records found</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($salary as $index => $sy): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td>&#8377; <?php echo number_format($sy['salary'], 2); ?></td>
                                <td>&#8377; <?php echo number_format($sy['allowance'], 2); ?></td>
                                <td>&#8377; <?php echo number_format($sy['total_salary'], 2); ?></td>
                                <td><?php echo date('d-M-Y', strtotime($sy['added_on'])); ?></td>
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
