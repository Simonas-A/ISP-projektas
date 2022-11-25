
<?php
session_start();
  $con=mysqli_connect("localhost","root","","vartvald");
  if(!$con)
    {
        die("cannot connect to server");
    }
    $userid = $_SESSION['userid'];
    $q = "SELECT t.fk_preke_id, t.kiekis, u.pavadinimas AS pavadinimas, ROUND(u.Pardavimo_kaina*t.kiekis, 2) AS prekes_kaina FROM preke_krepselis_pagalbinis t LEFT JOIN prekes u ON t.fk_preke_id = u.id WHERE fk_krepselis_id = '$userid'";
    //$q= "SELECT prekes.*, preke_krepselis_pagalbinis.* FROM prekes JOIN preke_krepselis_pagalbinis ON id = fk_preke_id WHERE fk_krepselis_id ='$userid'";
    $query=mysqli_query($con,$q);

    if(isset($_POST["btn1"])) {
			 header("location:../index.php");
	 }
    if(isset($_POST["coupon"])) {
        $kodas = $_POST['kodas'];
        $check = mysqli_query($con, "SELECT * from nuolaidos WHERE id = '$kodas'");
        if (!$check)
        {
            die('Error: ' . mysqli_error($con));
        }

        if(mysqli_num_rows($check) > 0) {
            $sqlpritaikyti = "
            UPDATE krepselis_pagalbinis 
            SET fk_nuolaidos_id = '$kodas', visa_kaina = visa_kaina*( 1- ('$kodas'/100))
            WHERE userid = '$userid'
        ";
            if (!mysqli_query($con, $sqlpritaikyti)) die ("Klaida įrašant:" .mysqli_error($con));
            $wholesum= "SELECT visa_kaina FROM krepselis_pagalbinis WHERE userid='$userid' LIMIT 1";
            $wholesum_query=mysqli_query($con,$wholesum);
            $wholesum_queryquery=mysqli_fetch_array($wholesum_query);
            $visakaina = $wholesum_queryquery['visa_kaina'];
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
                    Nuolaidos kodas pritaikytas!
                    Nauja užsakymo suma: <?php echo $visakaina; echo " €"; ?>
                </h4>

                <form method="post" action="krepselis.php">
                    <div class="col-lg-4">
                        <input type="submit"
                               value="Supratau"
                               class="btn btn-danger"
                               name="btnback">
                    </div>
            </div>
            </form>

            </body>
            </html>
            <?php
        } else {
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
                    Nuolaidos kodas nebegalioja arba neegzistuoja!
                </h4>

                <form method="post" action="krepselis.php">
                    <div class="col-lg-4">
                        <input type="submit"
                               value="Supratau"
                               class="btn btn-danger"
                               name="btnback">
                    </div>
            </div>
            </form>

            </body>
            </html>
            <?php
        }

    }

    $wholesum= "SELECT visa_kaina FROM krepselis_pagalbinis WHERE userid='$userid' LIMIT 1";
    $wholesum_query=mysqli_query($con,$wholesum);
    $wholesum_queryquery=mysqli_fetch_array($wholesum_query);
    $visakaina = $wholesum_queryquery['visa_kaina'];
?>

<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Mano krepšelis</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
    <link rel="stylesheet" 
        href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">

        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <h1>Mano krepšelis</h1>
            </div>
        </div>

        <!-- Grocery Cards -->
        <div class="row mt-4">
<?php
if (mysqli_num_rows($query)!=0) {
?>
            <?php
                while ($qq=mysqli_fetch_array($query))
                {
            ?>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $qq['pavadinimas']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="text-info">Kiekis:
                                <?php echo $qq['kiekis']; ?>
                            </p>
                        </h6>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="text-info">Kaina:
                                <?php echo $qq['prekes_kaina']; echo " €"; ?>
                            </p>
                        </h6>

                        <a href=
                        "krepselis_change_amount.php?id=<?php echo $qq['fk_preke_id']; ?>"
                            class="card-link">
                            Keisti kiekį
                        </a>
                        <a href=
                        "krepselis_delete.php?id=<?php echo $qq['fk_preke_id']; ?>"
                            class="card-link">
                            Pašalinti
                        </a>
                    </div>
                </div><br>
            </div>

            <?php
            }
            ?>
			            <?php
	         if(isset($_POST["btn1"])) {
			 header("location:operacija1.php");
		 }
            ?>
        </div>
            <h6 class="card-subtitle mb-2 text-muted">
                <p style="color: black;">Viso užsakymo kaina:
                    <?php echo $visakaina; echo " €"; ?>
                </p>
            </h6>

        <?php
            $couponapplied= "SELECT fk_nuolaidos_id FROM krepselis_pagalbinis WHERE userid='$userid' LIMIT 1";
            $couponapplied_query=mysqli_query($con,$couponapplied);
            $couponapplied_queryquery=mysqli_fetch_array($couponapplied_query);
            $isCouponApplied = $couponapplied_queryquery['fk_nuolaidos_id'];
            if (is_null($isCouponApplied)) {
                ?>
            <form method='post'>
                <div class="form-group col-lg-4" style="margin-left: auto; margin-right: 0;">
                <label for="kodas" class="control-label">Pritaikyti nuolaidos kodą:</label>
                    <input name='kodas' type='text' class="form-control input-sm" required>
                    <input type='submit' name='coupon' value='pritaikyti' class="btnbtn-default" required >
                </div>
            </form>
                <?php
            } else {
                ?>
                <h6 class="card-subtitle mb-2 text-muted" style="text-align: right;">
                    <p style="color: black;">Panaudotas nuolaidos kodas:
                        <?php echo $isCouponApplied; ?>
                    </p>
                </h6>
        <?php
            }
        ?>

            <h5>Pristatymas</h5>
            <form method='post'>
                <div class="form-group col-lg-4">
                    <label for="adresas" class="control-label">Adresas:</label>
                    <input name='adresas' type='text' class="form-control input-sm" required>
                    <label for="adresas" class="control-label">Prekę atsiimančio asmens vardas ir pavardė:</label>
                    <input name='adresas' type='textarea' class="form-control input-sm">
                    <label for="adresas" class="control-label">Komentaras:</label>
                    <input name='adresas' type='textarea' class="form-control input-sm">
                    <input type='submit' name='adress' value='patvirtinti pristatymo duomenis' class="btnbtn-default" required >
                </div>
            </form>

            <form method="post" action="payment.php">
            <div style="text-align: right;">
                <input type="submit"
                    value="Apmokėti"
                    class="btn btn-danger"
                    name="btn1" required>
            </div>
            </form>
<?php
} else {
    ?>
    <div class="col-lg-12">
    <h6>
        Krepšelyje nėra prekių.
    </h6>
    </div>
<?php
}
?>
            <form method="post" action="../index.php">
            <div class="col-lg-4">
                <input type="submit"
                    value="Grįžti"
                    class="btn btn-danger"
                    name="btn1">
            </div>
            </form>

    </div>

</body>
  
</html>
