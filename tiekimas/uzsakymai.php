
<?php
    include("../prekes_db_connect.php");
  
		$q= "select uzsakymas.*, tiekejai.pavadinimas, statusai.statusas, users.username from uzsakymas
		LEFT JOIN tiekejai ON uzsakymas.fk_tiekejas = tiekejai.id
		LEFT JOIN statusai ON uzsakymas.fk_statusas = statusai.id
		LEFT JOIN users ON uzsakymas.fk_darbuotojas_id = users.userid";
        $query=mysqli_query($con,$q);
    	if(isset($_POST["btn1"])) {
			 header("location:../index.php");
	}
?>
  
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Užsakymai</title>
  
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
                <h1>Užsakymai</h1>
                <a href="prideti_uzsakyma.php">Kurti užsakymą</a>
            </div>
        </div>
  
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Tiekėjas</th>
					<th scope="col">Būsena</th>
					<th scope="col">Sudarytas</th>
					<th scope="col">Pristatytas</th>
					<th scope="col">Suma</th>
					<th scope="col">Pristatymo kaina</th>
					<th scope="col">Darbuotojas</th>
					<th scope="col">Pakeisti būseną</th>
					<th scope="col">Redaguoti</th>
					<th scope="col">Pašalinti</th>
				</tr>
			</thead>
			<tbody>
			<?php
                while ($qq=mysqli_fetch_array($query)) 
                {
            ?>
			
			<tr>
				<td><?php echo $qq['id']; ?></td>
				<td><?php echo $qq['pavadinimas']; ?></td>
				<td><?php echo $qq['statusas']; ?></td>
				<td><?php echo $qq['sudaryta']; ?></td>
				<td><?php echo $qq['pristatyta']; ?></td>
				<td><?php echo $qq['suma']; ?></td>
				<td><?php echo $qq['pristatymo_kaina']; ?></td>
				<td><?php echo $qq['username']; ?></td>
				<td><a href=
                        "busena_uzsakymas.php?id=<?php echo $qq['id']; ?>" 
                            class="btn btn-outline-success">
                            Pakeisti būseną
                     </a>
				</td>
				<td><a href=
                        "redaguoti_uzsakyma.php?id=<?php echo $qq['id']; ?>" 
                            class="btn btn-outline-danger">
                            Redaguoti
                        </a>
				</td>
				<td><a href=
                        "salinti_uzsakyma.php?id=<?php echo $qq['id']; ?>" 
                            class="btn btn-outline-danger">
                            Pašalinti
                        </a>
				</td>
			</tr>
			
			<?php
            }
            ?>
			</tbody>
		</table>
                      <a href=
                        "../index.php" 
                            class="btn btn-danger">
                            Grįžti
                     </a>
    </div>

</body>
  
</html>
