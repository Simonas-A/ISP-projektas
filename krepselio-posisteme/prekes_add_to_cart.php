<?php
    $con=mysqli_connect("localhost","root","","vartvald");
    if(!$con)
    {
        die("cannot connect to server");
    }
    $id = $_GET['id'];
    $maketemp = "
    CREATE TEMPORARY TABLE temp_table_krepselioprekes (
        `id` int(11) NOT NULL,
        `pavadinimas` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
        `Pardavimo_kaina` float NOT NULL,
        `Savikaina` float NOT NULL,
        `Nuolaida` int(11) DEFAULT NULL,
        `Kilmes_vieta` varchar(20) NOT NULL,
        `Siuntimo_kaina` float DEFAULT NULL,
        `Papildoma_informacija` text DEFAULT NULL
    )
    ";
    mysqli_query($con,$maketemp);

    $q = "
        INSERT INTO temp_table_krepselioprekes
            (id, pavadinimas, Pardavimo_kaina, Savikaina, Nuolaida, Kilmes_vieta, Siuntimo_kaina, Papildoma_informacija)
            VALUES ((SELECT id from prekes where Id = $id),
                    (SELECT pavadinimas from prekes where Id = $id),
                    (SELECT Pardavimo_kaina from prekes where Id = $id),
                    (SELECT Savikaina from prekes where Id = $id),
                    (SELECT Nuolaida from prekes where Id = $id),
                    (SELECT Kilmes_vieta from prekes where Id = $id),
                    (SELECT Siuntimo_kaina from prekes where Id = $id),
                    (SELECT Papildoma_informacija from prekes where Id = $id))
    ";
    mysqli_query($con,$q);
	header('location:operacija1.php');
?>
