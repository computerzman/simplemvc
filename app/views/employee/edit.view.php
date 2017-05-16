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

    div.wrapper div.empForm{
        width: 400px;
        margin:0 auto;
    }
    form.appForm{
        width: 400px;
        margin:20px 50px 0 20px;
    }
    form.appForm fieldset{
        padding:10px;
        background: #f1f1f1;
        border:solid 1px #e4e4e4;
    }

    form.appForm fieldset legend{
        padding:5px;
        background: #e4e4e4;
        font:1em Arial, Helvetica, sans-serif;
        color: #666;
    }

    div.appForm fieldset p.message{
        background: green;
        color: #fff;
        padding:5px;
        margin: 3px 0;
        -webkit-border-radius:;
        -moz-border-radius:;
        border-radius:3px;
        font: 0.35em Arial, Helvtica, sans-serif;
    }
    
    form.appForm fieldset p.message.error{
        background: #900;
    }
    form.appForm table{
        width:100%;
    }
    form.appForm label{
        font-family:Arial;
        font-size:0.85em;
        color: #666666;
    }
    form.appForm table tr td input[type=text],
    form.appForm table tr td input[type=number]{
        width:96%;
        padding:2%;
        font-family:Arial;
        font-size:0.85em;
    }

    form.appForm table tr td input[type=submit]{
        padding:8px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background: green;
        color: #fff;
        font-family:Arial;
        font-size:0.85em;
        cursor: pointer;
    }

    form.appForm table tr td{
        padding:3px 0;
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
    <div class="empForm">
    <form class="appForm" method="post" enctype="application/x-www-form-urlencoded" autocomplete="off" action="#">
        <fieldset>
            <legend> Employee Information</legend>
        <?php if (isset($_SESSION['message'])) { ?>
    <p class="message" <?= isset($error) ? 'error' : '' ?>><?= $_SESSION['message']?></p>
        <?php
            unset($_SESSION['message']);
        }
            ?>
            <table>
                <tr>
                    <td>
                        <label for="name">Employee Name:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                       <input required type="text" name="name" id="name" placeholder="Write The Employee Name" value="<?= $employees->name ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="age">Employee Age:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input required type="text" name="age" id="age" value="<?= $employees->age ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Employee Address:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input required type="text" name="address" id="address" placeholder="Write The Employee address"  value="<?= $employees->address ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="salary">Employee Salary:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input required type="text" name="salary" id="salary" value="<?= $employees->salary ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tax">Employee tax:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input required type="text" name="tax" id="tax"  value="<?= $employees->tax ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input required type="submit" name="submit" id="submit" value="Save">
                    </td>
                </tr>

            </table>

        </fieldset>


    </form>
    </div>

</div>