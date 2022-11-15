<?php
    include("../prekes_db_connect.php");
    $id = $_GET['id'];
    $q = "delete from uzsakymas where Id = $id ";
    mysqli_query($con,$q);    
	header('location:uzsakymai.php');
?>