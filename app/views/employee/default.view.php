<style type="text/css">
    *{
        margin: 0;
        padding:0;
        border:0;
        outline:none;
        line-height: 1.2;
        font-size:1em;
    }

    div.wrapper{
        overflow: hidden;
    }

    div.wrapper div.employees{
     margin: 0 auto;
     width:700px;
    }
    div.wrapper div.employees table{
        width: 780px;
        margin: 20px 20px 0 0;
        border-collapse: collapse;
    }

    div.wrapper div.employees table thead th{
        text-align: left;
        padding:5px;
        border-right:solid 1px #e4e4e4;
        border-bottom:solid 2px #e4e4e4;
        font: bold 0.9em Arial, Helvetica, sans-serif;
        color:#666;
    }
    div.wrapper div.employees table thead th:last-of-type{
        border-right:none;
    }
    div.wrapper div.employees table thead td{
        text-align: left;
        padding: 5px;
        border-bottom:solid 1px #e4e4e4;
        font: 0.8em Arial, Helvetica, sans-serif;
        color:#666;
    }
    div.wrapper div.employees table tbody tr:nth-child(2n) td{
        background: #f1f1f1;
    }
    div.wrapper div.employees table tbody td a:link,
    div.wrapper div.employees table tbody td a:visited {
        color: #0ba1ec;
    }

</style>
<div class="wrapper">
    <?php if(isset($_SESSION['message'])) {?>
    <p class="message <?= isset($error) ? 'error' : '' ?>"><?= $_SESSION['message']?></p>
    <?php unset($_SESSION['message']); } ?>
    <div class="employees">
        <a href="/employee/add">Add a new employee</a>

        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Tax (%)</th>
                <th>Control</th>
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
                    <td><a href="/employee/edit/<?= $employee->id?>">Edit</a> | <a href="/employee/delete/<?= $employee->id?>">Delete</a></td>
                </tr>
                <?php
            }
            }else{

            }
            ?>

            </tbody>
        </table>
    </div>

</div>


<?php
/*

foreach ($employees as $employee)
{
var_dump($employees);
}

*/