<?php if (empty($employees)) : ?>
                        <tr>
                            <td colspan="7" class="text-center">No employee found</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($employees as $index => $employee) : ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td class="avatar-sm">
                                    <?php if (!empty($employee['photo']) && file_exists('assets/images/'.$employee['photo'])) : ?>
                                        <img src="<?php echo base_url('assets/images/'.$employee['photo']); ?>" alt="Profile Image" class="avatar-img rounded-circle">
                                    <?php else : ?>
                                        <img src="<?php echo base_url()?>assets/img/default-avatar.jpg" alt="Profile Image" class="avatar-img rounded-circle">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $employee['employee_id']; ?></td>
                                <td><?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?></td>
                                <td><?php echo $employee['department_name']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($employee['date_of_joining'])); ?></td>
                                <td>
                                    <button class="btn btn-info btn-sm" title="info" data-bs-toggle="modal" data-bs-target="#viewemployeeModal" onclick="view_employee(<?php echo $employee['id']; ?>);"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-secondary btn-sm" title="edit" data-bs-toggle="modal" data-bs-target="#editemployeeModal" onclick="edit_employee(<?php echo $employee['id']; ?>);"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-warning btn-sm" title="salary" data-bs-toggle="modal" data-bs-target="#viewsalaryModal" onclick="view_salary(<?php echo $employee['id']; ?>);"><i class="fas fa-money-bill-alt"></i></button>
                                    <button class="btn btn-danger btn-sm" title="leave" data-bs-toggle="modal" data-bs-target="#viewleaveModal" onclick="view_leave(<?php echo $employee['id']; ?>);"><i class="fas fa-calendar-alt"></i></button>
                                    <button class="btn <?php echo ($employee['employee_status'] == 1) ? 'btn-success btn-sm' : 'btn-danger btn-sm'; ?>" onclick="toggleStatus(<?php echo $employee['id']; ?>, <?php echo $employee['employee_status']; ?>);">
                                        <?php echo ($employee['employee_status'] == 1) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>