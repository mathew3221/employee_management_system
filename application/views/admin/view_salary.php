<?php if (!empty($employee)) { ?>
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Added On</th>
                        <th>Salary</th>
                        <th>Allowance</th>
                        <th>Total Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employee as $ee) { ?>
                        <tr>
                            <td><?php echo date('d/M/Y', strtotime($ee['added_on'])); ?></td>
                            <td>&#8377; <?php echo number_format($ee['salary'], 2); ?></td>
                            <td>&#8377; <?php echo number_format($ee['allowance'], 2); ?></td>
                            <td>&#8377; <?php echo number_format($ee['total_salary'], 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="modal-body">
        <p class="text-muted">No salary data available.</p>
    </div>
<?php } ?>
