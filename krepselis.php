
<?php
    include("prekes_db_connect.php");
  
    if (isset($_POST['btn'])) {
        $pavadinimas=$_POST['pavadinimas'];
        $q="select * from prekes where pavadinimas='$pavadinimas'";
        $query=mysqli_query($con,$q);
    } 
    else {
        $q= "select * from preke_pirkimai_tarpinis";
        $query=mysqli_query($con,$q);
    }	if(isset($_POST["btn1"])) {
			 header("location:index.php");
	 }
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
                            <?php echo $qq['fk_preke_id']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="text-info">Kiekis:
                                <?php echo $qq['kiekis']; ?>
                            </p>
                        </h6>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="text-info">Kaina:
                                // <?php echo $qq['kaina']; ?>
                            </p>
                        </h6>
                        
                        <a href=
                        "krepselis_change_amount.php?id=<?php echo $qq['fk_preke_id']; ?>"
                            class="card-link">
                            Keisti kiekį
                        </a>
                        <a href=
                        "krepselis_delete.php?id=<?php echo $qq['id']; ?>"
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
                    // <?php echo $qq['kaina']; ?>
                </p>
            </h6>

            <form method='post'>
                <div class="form-group col-lg-4" style="margin-left: auto; margin-right: 0;">
                <label for="kodas" class="control-label">Pritaikyti nuolaidos kodą:</label>
                    <input name='kodas' type='text' class="form-control input-sm" required>
                    <input type='submit' name='coupon' value='pritaikyti' class="btnbtn-default" required >
                </div>
            </form>

            <h5>Pristatymas</h5>
            <form method='post'>
                <div class="form-group col-lg-4">
                <label for="adresas" class="control-label">Adresas, kuriuo pristatyti užsakymą:</label>
                    <input name='adresas' type='text' class="form-control input-sm" required>
                    <input type='submit' name='adress' value='patvirtinti adresą' class="btnbtn-default" required >
                </div>
            </form>
                                
            <form method="post" action="payment.php?id=<?php echo $qq['id'];?>">
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
            <form method="post" action="index.php">
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
