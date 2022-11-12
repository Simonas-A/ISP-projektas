<?php
    include("prekes_db_connect.php");
    $id = $_GET['id'];
    $q = "delete from preke_pirkimai_tarpinis where id = $id ";
    mysqli_query($con,$q);    
	header('location:krepselis.php');
?>
