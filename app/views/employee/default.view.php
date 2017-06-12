    <?php if(isset($_SESSION['message'])) {?>
    <p class="message <?= isset($error) ? 'error' : '' ?>"><?= $_SESSION['message']?></p>
    <?php unset($_SESSION['message']); } ?>
    <div class="employees">
        <a href="/employee/add"><?=@$text_add_employee?></a>

        <table class="data">
            <thead>
            <tr>
                <th><?= $text_table_employee_name?></th>
                <th><?= $text_table_employee_age?></th>
                <th><?= $text_table_employee_address?></th>
                <th><?= $text_table_employee_salary?></th>
                <th><?= $text_table_employee_tax?> (%)</th>
                <th><?= $text_table_control?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(false !== $employees)
            {
            foreach ($employees as $employee) {

                ?>

                <tr>
                    <td><?= $employee->name ?></td>
                    <td><?= $employee->age ?></td>
                    <td><?= $employee->address ?></td>
                    <td><?= $employee->salary ?></td>
                    <td><?= $employee->tax ?></td>
                    <td><a href="/employee/edit/<?= $employee->id?>">Edit</a> | <a href="/employee/delete/<?= $employee->id?>" onclick="if(!confirm('<?=$text_delete_confirm?>')) return false;">Delete</a></td>
                </tr>
                <?php
            }
            }else{

            }
            ?>

            </tbody>
        </table>
    </div>
