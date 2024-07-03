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
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
                <tbody>
                    <tr>
                        <th scope="row">Employee ID</th>
                        <td><?php echo $employee_details['employee_id']; ?></td>
                        <th colspan="3">
                            <?php if (!empty($employee_details['photo'])) : ?>
                                <img src="<?php echo base_url($employee_details['photo']); ?>" alt="Employee Photo" class="img-fluid" width="150" height="150">
                            <?php else : ?>
                                No photo available
                            <?php endif; ?>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?php echo $employee_details['first_name'] . ' ' . $employee_details['last_name']; ?></td>
                        <th scope="row">Email</th>
                        <td><?php echo $employee_details['email']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Mobile Number</th>
                        <td><?php echo $employee_details['mobile_no']; ?></td>
                        <th scope="row">Country</th>
                        <td><?php echo $employee_details['country']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Department</th>
                        <td><?php echo $employee_details['department_name']; ?></td>
                        <th scope="row">Date of Birth</th>
                        <td><?php echo $employee_details['date_of_birth']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Joining</th>
                        <td><?php echo $employee_details['date_of_joining']; ?></td>
                        <th scope="row">Address</th>
                        <td colspan="3"><?php echo $employee_details['address']; ?></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
