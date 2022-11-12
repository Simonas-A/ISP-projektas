
<?php
    include("prekes_db_connect.php");
  
    if (isset($_POST['btn'])) {
        $pavadinimas=$_POST['pavadinimas'];
        $q="select * from prekes where pavadinimas='$pavadinimas'";
        $query=mysqli_query($con,$q);
    } 
    else {
        $q= "select * from prekes";
        $query=mysqli_query($con,$q);
    }	if(isset($_POST["btn1"])) {
			 header("location:index.php");
	 }
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
    <div class="container mt-5">
          
        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <h1>Prekės</h1>
                <a href="prideti_preke.php">Pridėti prekę</a>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-8">
                          
                        <!-- Date Filtering-->
                        <form method="post" action="">
                            <input type="text" 
                                class="form-control" 
                                name="pavadinimas">
                          
                            <div class="col-lg-4" 
                                method="post">
                                <input type="submit" 
                                class="btn btn-danger float-right" 
                                name="btn" value="Iešokti">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  
        <!-- Grocery Cards -->
        <div class="row mt-4">
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
                            <?php echo 
                            $qq['kiekis']; ?>
                        </h6>
                        <?php
                        if($qq['statusas'] == 0) {
                        ?>
                        <p class="text-info">Laukiama</p>
  
                        <?php
                        } else if($qq['statusas'] == 1) {
                        ?>
                        <p class="text-success">Įsigyta</p>
  
                        <?php } else { ?>
                        <p class="text-danger">Nėra parduotuvėje</p>
  
                        <?php } ?>
                        <a href=
                        "prekes_delete.php?id=<?php echo $qq['id']; ?>" 
                            class="card-link">
                            Išimti
                        </a>
                        <a href=
                        "prekes_update.php?id=<?php echo $qq['id']; ?>" 
                            class="card-link">
                            Atnaujinti
                        </a>
                        <a href=
                        "prekes_add_to_cart.php?id=<?php echo $qq['id']; ?>"
                        class="card-link">
                        Pridėti į krepšelį
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
                        <form method="post" action="index.php">
			<div>
                <input type="submit" 
                    value="Grįžti" 
                    class="btn btn-danger" 
                    name="btn1">
            </div>  
			</form>
    </div>

</body>
  
</html>
