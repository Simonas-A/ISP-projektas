<?php
    include("prekes_db_connect.php");
    $id = $_GET['id'];
	echo $id;
    $q = "delete from prekes where Id = $id ";
	$qq = "delete from inventorius where id = $id";
		    mysqli_query($con,$qq); 
    mysqli_query($con,$q);    

	header('location:operacija1.php');
?>