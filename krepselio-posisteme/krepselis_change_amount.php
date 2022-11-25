<?php
    session_start();
    $con=mysqli_connect("localhost","root","","vartvald");
    if(!$con)
    {
        die("cannot connect to server");
    }
    $userid = $_SESSION['userid'];
    $id = $_GET['fk_preke_id'];
//    $q = "";
//    mysqli_query($con,$q);
?>

<form method='post'>
    <div class="form-group col-lg-4" style="margin-left: auto; margin-right: 0;">
        <label for="kodas" class="control-label">Įveskite norimą prekės kiekį:</label>
        <input name='kodas' type='text' class="form-control input-sm" required>
        <input type='submit' name='coupon' value='pritaikyti' class="btnbtn-default" required >
    </div>
</form>