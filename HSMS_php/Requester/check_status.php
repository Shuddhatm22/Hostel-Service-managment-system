<?php
    define('TITLE' ,"Status");
    define('PAGE' ,"check_status");
    include('includes/header.php');
    include('../dbconnection.php');

    session_start();

if(isset($_SESSION['is_login'])){

    $rEmail=$_SESSION['rEmail'];

}
else{

    echo "<script>location.href='Requester_login.php'</script>";
}
?>

<!-- Start 2nd col form -->
<div class="col-sm-6 mt-5 mx-5 ">
    <form action="" method="post" class="form-inline d-print-none">
        <div class="form-group mr-3 ">
            <label for="checkid">Enter Request ID: </label>
            <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
        </div>

        <button class="btn btn-danger" type="submit" name="submit">Search</button>
    </form>
    <?php 

    if(isset($_REQUEST['checkid'])){

        if($_REQUEST['checkid']==""){

            $msg= '<div class="alert alert-warning mt-4">Fill All Fields</div>';
        }
        else{

            $sql="SELECT * FROM assignwork_tb WHERE request_id={$_REQUEST['checkid']}";

    $result=$conn->query($sql);

    $row=$result->fetch_assoc();

    if(($row['request_id']==$_REQUEST['checkid'])){?>

    <h3 class="text-center mt-5">Assigned Work Details</h3>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php  if(isset($row['request_id'])) echo $row['request_id'] ?></td>
            </tr>
            <tr>
                <td>Request Info</td>
                <td><?php  if(isset($row['request_info'])) echo $row['request_info'] ?></td>
            </tr>
            <tr>
                <td>Request Description</td>
                <td><?php  if(isset($row['request_desc'])) echo $row['request_desc'] ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php  if(isset($row['requester_name'])) echo $row['requester_name'] ?></td>
            </tr>
            <tr>
                <td>Address1</td>
                <td><?php  if(isset($row['requester_add1'])) echo $row['requester_add1'] ?></td>
            </tr>
            <tr>
                <td>Address2</td>
                <td><?php  if(isset($row['requester_add2'])) echo $row['requester_add2'] ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php  if(isset($row['requester_city'])) echo $row['requester_city'] ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php  if(isset($row['requester_state'])) echo $row['requester_state'] ?></td>
            </tr>
            <tr>
                <td>Pin Code</td>
                <td><?php  if(isset($row['requester_zip'])) echo $row['requester_zip'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php  if(isset($row['requester_email'])) echo $row['requester_email'] ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?php  if(isset($row['requester_mobile'])) echo $row['requester_mobile'] ?></td>
            </tr>
            <tr>
                <td>Assigned Date</td>
                <td><?php  if(isset($row['assign_date'])) echo $row['assign_date'] ?></td>
            </tr>
            <tr>
                <td>Technician Name</td>
                <td><?php  if(isset($row['assign_tech'])) echo $row['assign_tech'] ?></td>
            </tr>
            <tr>
                <td>Customer Sign</td>
                <td></td>
            </tr>
            <tr>
                <td>Technician Sign</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <form action="" class="mb-3 d-print-none">
            <input class="btn btn-danger" type="submit" value="print" onclick="window.print()">
            <input class="btn btn-secondary" type="submit" value="Close">
        </form>
    </div>



    <?php }  else {
        echo '<div class="alert alert-info mt-4">Your Request is Still Pending</div>';
    } 

            
        }




    
}?>

    <?php if(isset($msg)) echo $msg;?>




</div><!-- End 2nd col form -->

<!-- Only Number for Input Fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>


<?php

    include('includes/footer.php');
?>