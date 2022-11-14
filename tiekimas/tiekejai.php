
<?php
    include("../prekes_db_connect.php");
  
		$q= "select * from tiekejai";
        $query=mysqli_query($con,$q);
    	if(isset($_POST["btn1"])) {
			 header("../location:index.php");
	}
?>
  
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Tiekėjai</title>
  
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
                <h1>Tiekėjai</h1>
                <a href="prideti_tiekeja.php">Pridėti tiekėją</a>
            </div>
        </div>
  
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Pavadinimas</th>
					<th scope="col">Adresas</th>
					<th scope="col">Miestas</th>
					<th scope="col">E. paštas</th>
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
				<td><?php echo $qq['adresas']; ?></td>
				<td><?php echo $qq['miestas']; ?></td>
				<td><?php echo $qq['epastas']; ?></td>
				<td><a href=
                        "redaguoti_tiekeja.php?id=<?php echo $qq['id']; ?>" 
                            class="btn btn-outline-success">
                            Redaguoti
                     </a>
				</td>
				<td><a href=
                        "pasalinti_tiekeja.php?id=<?php echo $qq['id']; ?>" 
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
