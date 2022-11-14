<?php
    include("../prekes_db_connect.php");
    $id = $_GET['id'];
    $q = "delete from tiekejai where Id = $id ";
    mysqli_query($con,$q);    
	header('location:tiekejai.php');
?>