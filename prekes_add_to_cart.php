<?php
    include("prekes_db_connect.php");
    $id = $_GET['id'];
    $q = "
            INSERT INTO preke_pirkimai_tarpinis (fk_preke_id, kiekis) VALUES ((SELECT id from prekes where Id = $id), 1)
    ";
    mysqli_query($con,$q);
	header('location:operacija1.php');
?>