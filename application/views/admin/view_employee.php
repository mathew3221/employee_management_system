<?php if (!empty($employee)) { ?>
    <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
                <?php foreach ($employee as $index => $emp) { ?>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <?php if (!empty($emp['photo'])) : ?>
                                <img src="<?php echo base_url($emp['photo']); ?>" alt="Employee Photo" class="img-fluid" width="150" height="150">
                            <?php else : ?>
                                No photo available
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Employee ID:</th>
                        <td><?php echo $emp['employee_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $emp['first_name'] . ' ' . $emp['last_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $emp['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Mobile Number:</th>
                        <td><?php echo $emp['mobile_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Country:</th>
                        <td><?php echo $emp['country']; ?></td>
                    </tr>
                    <tr>
                        <th>State:</th>
                        <td><?php echo $emp['state']; ?></td>
                    </tr>
                    <tr>
                        <th>City:</th>
                        <td><?php echo $emp['city']; ?></td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td><?php echo $emp['department_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo $emp['date_of_birth']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Joining:</th>
                        <td><?php echo $emp['date_of_joining']; ?></td>
                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td><?php echo nl2br($emp['address']); ?></td>
                    </tr>
                    <tr>
                        <th>Password:</th>
                        <td class="d-flex align-items-center">
                            <span id="password-<?php echo $index; ?>" class="password flex-grow-1">********</span>
                            <input type="hidden" id="hidden-password-<?php echo $index; ?>" value="<?php echo $emp['password']; ?>">
                            <a href="javascript:void(0);" id="showPasswordLink-<?php echo $index; ?>" onclick="togglePassword(<?php echo $index; ?>)">
                                <i class="fas fa-eye ms-2"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <p>No employee data available.</p>
<?php } ?>

<script>
    function togglePassword(index) {
        const passwordField = document.getElementById(`password-${index}`);
        const hiddenPassword = document.getElementById(`hidden-password-${index}`);
        const showPasswordLink = document.getElementById(`showPasswordLink-${index}`);
        const icon = showPasswordLink.querySelector('i');
        
        if (passwordField.textContent === '********') {
            passwordField.textContent = hiddenPassword.value;
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            passwordField.textContent = '********';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
