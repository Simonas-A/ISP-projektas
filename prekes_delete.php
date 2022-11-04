<?php
    include("prekes_db_connect.php");
    $id = $_GET['id'];
    $q = "delete from prekes where Id = $id ";
    mysqli_query($con,$q);    
	header('location:operacija1.php');
?>