<?php
    session_start();
    $con=mysqli_connect("localhost","root","","vartvald");
    if(!$con)
    {
        die("cannot connect to server");
    }
    $id = $_GET['id'];
    $userid = $_SESSION['userid'];

    $check = mysqli_query($con, "SELECT * from preke_krepselis_pagalbinis WHERE fk_preke_id = '$id' AND fk_krepselis_id = '$userid'");
    if (!$check)
    {
        die('Error: ' . mysqli_error($con));
    }

    if(mysqli_num_rows($check) > 0) {
        ?>
        <html>

        <head>
            <meta http-equiv="Content-Type"
                  content="text/html; charset=UTF-8">

            <title>View List</title>

            <link rel="stylesheet" href=
            "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

            <link rel="stylesheet"
                  href="css/style.css">
        </head>

        <body>

        <div class="container" style="margin-top: 50px;">
            <h4>
                Prekė jau yra pridėta į krepšelį!
            </h4>

            <form method="post" action="operacija1.php">
                <div class="col-lg-4">
                    <input type="submit"
                           value="Grįžti"
                           class="btn btn-danger"
                           name="btnback">
                </div>
            </form>

            <form method="post" action="krepselio-posisteme/krepselis.php">
                <div class="col-lg-4">
                    <input type="submit"
                           value="Mano krepšelis"
                           class="btn btn-danger"
                           name="btnback">
                </div>
        </div>
        </form>

        </body>
        </html>
    <?php
    } else {
        $userid = $_SESSION['userid'];
        $krepselis_query = "
        INSERT IGNORE INTO krepselis_pagalbinis (userid, visas_kiekis, visa_kaina) VALUES ('$userid',0,0)
    ";
        mysqli_query($con, $krepselis_query);
               $krepselis_query = "
        INSERT INTO preke_krepselis_pagalbinis (fk_preke_id, fk_krepselis_id, kiekis) VALUES ('$id','$userid',1)
    ";
        mysqli_query($con,$krepselis_query);
        $krepselis_update_query = "
        UPDATE krepselis_pagalbinis 
        SET visas_kiekis=visas_kiekis+1, visa_kaina=visa_kaina+(SELECT Pardavimo_kaina FROM prekes WHERE id = '$id')
        WHERE userid = '$userid'
        ";
        mysqli_query($con,$krepselis_update_query);
        ?>

        <html>

        <head>
            <meta http-equiv="Content-Type"
                  content="text/html; charset=UTF-8">

            <title>View List</title>

            <link rel="stylesheet" href=
            "https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

            <link rel="stylesheet"
                  href="css/style.css">
        </head>

        <body>

        <div class="container" style="margin-top: 50px;">
            <h4>
                Prekė pridėta į krepšelį!
            </h4>

            <form method="post" action="operacija1.php">
                <div class="col-lg-4">
                    <input type="submit"
                           value="Grįžti"
                           class="btn btn-danger"
                           name="btnback">
                </div>
                </form>

            <form method="post" action="krepselio-posisteme/krepselis.php">
                <div class="col-lg-4">
                    <input type="submit"
                           value="Mano krepšelis"
                           class="btn btn-danger"
                           name="btnback">
                </div>
                </div>
            </form>

        </body>
        </html>
        <?php
    }

//	header('location:operacija1.php');
?>
