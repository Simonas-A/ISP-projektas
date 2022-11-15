<?php
    include("../prekes_db_connect.php");
	
    $id = $_GET['id'];
	$statusas = 3;
	
	$q1 = "select fk_statusas from uzsakymas where id=$id";
    $query=mysqli_query($con,$q1);
	$qq1=mysqli_fetch_array($query);
	if ($qq1['fk_statusas']==3) { $statusas = 1; }
	
    $q2 = "update uzsakymas set fk_statusas='$statusas' where id=$id";
    mysqli_query($con,$q2);    
	header('location:uzsakymai.php');
?>