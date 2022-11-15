<?php
session_start();
?>

<html> 
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Kurti užsakymą</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Kurti užsakymą</h1>
        <form action="prideti_uzsakyma.php" method="POST">
            <div class="form-group">
                <label>Sudarymo data</label>
                <input type="datetime-local" 
                    class="form-control" 
                    placeholder="Sudarymo data" 
                    name="sudaryta" />
            </div>
			<div class="form-group">
                <label>Pristatymo data</label>
                <input type="datetime-local" 
                    class="form-control" 
                    placeholder="Pristatymo data" 
                    name="pristatyta" />
            </div>
			<div class="form-group">
                <label>Pristatymo kaina</label>
                <input type="number" step="0.01" 
                    class="form-control" 
                    placeholder="Pristatymo kaina" 
                    name="kaina" />
            </div>
			
			<div class="form-group">
                <label>Tiekėjas</label>
				<select name="tiekejas">
					<?php 
					
					include("../prekes_db_connect.php");
	  
					$q= "select * from tiekejai";
					$query=mysqli_query($con,$q);
					while ($qq=mysqli_fetch_array($query)) 
					{
					?>
					<option value="<?php echo $qq['id'];  ?>"><?php echo $qq['pavadinimas']; ?></option>
					<?php
					}
					?>
					
				</select>
            </div>
			
            <div class="form-group">
                <input type="submit" 
                    value="Kurti" 
                    class="btn btn-success" 
                    name="btn">
            </div>
			
        </form>
		<a href=
			"uzsakymai.php" 
			class="btn btn-danger">
			Grįžti
        </a>
    </div>
  
    <?php
        if(isset($_POST["btn"])) {
            include("../prekes_db_connect.php");
            $sudaryta=$_POST['sudaryta'];
            $pristatyta=$_POST['pristatyta'];
            $suma=0;
            $pristatymo_kaina=$_POST['kaina'];
            $fk_darbuotojas_id=$_SESSION['userid'];
            $fk_statusas='1';
            $fk_tiekejas=$_POST['tiekejas'];
  
            $q="insert into uzsakymas(sudaryta,
            pristatyta,suma,pristatymo_kaina, fk_darbuotojas_id, fk_statusas, fk_tiekejas)
            values('$sudaryta','$pristatyta','$suma','$pristatymo_kaina','$fk_darbuotojas_id','$fk_statusas','$fk_tiekejas')";
  
            mysqli_query($con,$q);
            header("location:uzsakymai.php");
        }
         if(isset($_POST["btn1"])) {
			 header("location:uzsakymai.php");
		 }
        // if(!mysqli_query($con,$q))
        // {
            // echo "Value Not Inserted";
        // }
        // else
        // {
            // echo "Value Inserted";
        // }
    ?>
</body>
  
</html>