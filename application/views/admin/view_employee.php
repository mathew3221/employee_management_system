<?php if (!empty($employee)) { ?>
    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <tbody>
    <?php foreach ($employee as $index => $emp) { ?>
        <tr>
            <th>Employee ID:</th>
            <td><?php echo $emp['employee_id']; ?></td>
            <th>Photo</th>
            <td style="width: 150px;" colspan="3">
                <?php if (!empty($emp['photo'])) : ?>
                    <img src="<?php echo base_url($emp['photo']); ?>" alt="Employee Photo" class="img-fluid rounded" width="80" height="80">
                <?php else : ?>
                    No photo available
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><?php echo $emp['first_name'] . ' ' . $emp['last_name']; ?></td>
            <th>Email:</th>
            <td><?php echo $emp['email']; ?></td>
        </tr>
        <tr>
            <th>Mobile Number:</th>
            <td><?php echo $emp['mobile_no']; ?></td>
            <th>Gender:</th>
            <td><?php echo $emp['gender']; ?></td>
        </tr>
        <tr>
            <th>State:</th>
            <td><?php echo $emp['state']; ?></td>
            <th>Department:</th>
            <td><?php echo $emp['department_name']; ?></td>
        </tr>
        <tr>
            <th>Date of Birth:</th>
            <td><?php echo date('d/m/Y', strtotime($emp['date_of_birth'])); ?></td>
            <th>Date of Joining:</th>
            <td><?php echo date('d/m/Y', strtotime($emp['date_of_joining'])); ?></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><?php echo nl2br($emp['address']); ?></td>
            <th>Password:</th>
            <td colspan="3" class="d-flex align-items-center">
                <span id="password-<?php echo $index; ?>" class="password flex-grow-1">********</span>
                <input type="hidden" id="hidden-password-<?php echo $index; ?>" value="<?php echo $emp['password']; ?>">
                <a href="javascript:void(0);" id="showPasswordLink-<?php echo $index; ?>" onclick="togglePassword(<?php echo $index; ?>)">
                    <i class="fas fa-eye ms-2"></i>
                </a>
            </td>
        </tr>
        <tr>
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
