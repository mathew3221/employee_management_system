<div class="container">
  <div class="page-inner">
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
                        <th scope="row">Department</th>
                        <td><?php echo $employee_details['department_name']; ?></td>
                        <th scope="row">Mobile Number</th>
                        <td><?php echo $employee_details['mobile_no']; ?></td>
                        
                    </tr>
                    <tr>
                        <th scope="row">Gender</th>
                        <td><?php echo $employee_details['gender']; ?></td>
                        <th scope="row">State</th>
                        <td><?php echo $employee_details['state']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td><?php echo date('d/m/Y', strtotime($employee_details['date_of_birth'])); ?></td>
                        <th scope="row">Address</th>
                        <td><?php echo nl2br($employee_details['address']); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Joining</th>
                        <td><?php echo date('d/m/Y', strtotime($employee_details['date_of_joining'])); ?></td>
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
