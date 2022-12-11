<?php
    session_start();
    $con=mysqli_connect("localhost","root","","vartvald");
    if(!$con)
    {
        die("cannot connect to server");
    }
    if ($_SESSION['user'] == "guest") {
        $_SESSION['kicked'] = 'yes';
        $_SESSION['message'] = 'Bandėte patekti į krepselis_change_amount.php puslapį, tačiau tam neturite privilegijų';
        header("Location: ../logout.php");
        exit;
    }
    if (($_SESSION['prev'] != "krepselis") && ($_SESSION['prev'] != "krepselis_change_amount")) {
        $_SESSION['kicked'] = 'yes';
        $_SESSION['message'] = 'Bandėte patekti į krepselis_change_amount.php puslapį, tačiau taip negalima';
        header("Location: ../logout.php");
        exit;
    }
    $_SESSION['prev'] = 'krepselis_change_amount';

    $userid = $_SESSION['userid'];
    $id = $_GET['id'];

//    $q = "SELECT pavadinimas FROM prekes WHERE id='$id'";
    $q = "SELECT t.fk_preke_id, t.kiekis AS kiekis, u.pavadinimas AS pavadinimas, ROUND(u.Pardavimo_kaina*t.kiekis, 2) AS prekes_kaina FROM preke_krepselis_pagalbinis t LEFT JOIN prekes u ON t.fk_preke_id = u.id WHERE fk_krepselis_id = '$userid' AND fk_preke_id = '$id'";

    $query=mysqli_query($con,$q);
    $result=mysqli_fetch_array($query);
    $name = $result['pavadinimas'];
    $amount = $result['kiekis'];

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
<div class="container">
<form method='post'>
    <div class="form-group col-lg-4" style="padding-top: 20px">
        <h4>Prekė: <?php echo $name; ?> </h4>
        <p>Pasirinktas kiekis: <?php echo $amount; ?></p>
        <label for="kodas" class="control-label">Įveskite norimą prekės kiekį:</label>
        <input name='kodas' type='text' class="form-control input-sm" requiredpattern="(([1-9]{1})|([1-9]{1}[0-9]{1,}))"
               oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'Neįvestas arba neteisingai įvestas kiekis);"
               oninvalid="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'Neįvestas arba neteisingai įvestas kiekis');"/>
        <input type='submit' name='coupon' value='pritaikyti' class="btnbtn-default" required >
    </div>
</form>
    <form method="post" action="krepselis.php">
        <div class="col-lg-4">
            <input type="submit"
                   value="Grįžti"
                   class="btn btn-danger"
                   ame="btnkrepselis">
        </div>
    </form>
</div>
</body>
</html>