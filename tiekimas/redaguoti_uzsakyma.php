<?php
	session_start();
    include("../prekes_db_connect.php");
    if(isset($_POST['btn']))
    {
        $sudaryta=$_POST['sudaryta'];
		$pristatyta=$_POST['pristatyta'];
		$suma=0;
		$pristatymo_kaina=$_POST['kaina'];
		$fk_darbuotojas_id=$_SESSION['userid'];
		$fk_statusas='1';
		$fk_tiekejas=$_POST['tiekejas'];
        $id = $_GET['id'];
        $q= "update uzsakymas set sudaryta='$sudaryta', pristatyta='$pristatyta', suma='$suma', pristatymo_kaina='$pristatymo_kaina', fk_darbuotojas_id='$fk_darbuotojas_id', fk_tiekejas='$fk_tiekejas'
		where id=$id";
        $query=mysqli_query($con,$q);
        header('location:uzsakymai.php');
    } 
    else if(isset($_GET['id'])) 
    {
        $q = "SELECT * FROM uzsakymas WHERE Id='".$_GET['id']."'";
        $query=mysqli_query($con,$q);
        $res= mysqli_fetch_array($query);
    }
	         if(isset($_POST["btn1"])) {
			 header("location:uzsakymai.php");
		 }
?>
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
      
    <title>Redaguoti užsakymą</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Redaguoti užsakymą</h1>
        <form method="post">
            <div class="form-group">
			<div class="form-group">
                <label>Sudarymo data</label>
                <input type="datetime-local" 
                    class="form-control" 
                    placeholder="Sudarymo data" 
                    name="sudaryta" 
					value="<?php echo $res['sudaryta'];?>" />
            </div>
			<div class="form-group">
                <label>Pristatymo data</label>
                <input type="datetime-local" 
                    class="form-control" 
                    placeholder="Pristatymo data" 
                    name="pristatyta" 
					value="<?php echo $res['pristatyta'];?>" />
            </div>
			<div class="form-group">
                <label>Pristatymo kaina</label>
                <input type="number" step="0.01" 
                    class="form-control" 
                    placeholder="Pristatymo kaina" 
                    name="kaina" 
					value="<?php echo $res['pristatymo_kaina'];?>" />
            </div>
			
			<div class="form-group">
                <label>Tiekėjas</label>
				<select name="tiekejas" value="<?php echo $res['fk_tiekejas'];?>">
					<?php 
					
					include("../prekes_db_connect.php");
	  
					$q= "select * from tiekejai";
					$query=mysqli_query($con,$q);
					while ($qq=mysqli_fetch_array($query)) 
					{
					?>
					<option value="<?php echo $qq['id'];  ?>"><?php echo $qq['pavadinimas']; ?>?></option>
					<?php
					}
					?>
					
				</select>
            </div>
			
			<div class="form-group">
                <label>Dabartinis statusas</label>
				<select name="tiekejas" value="<?php echo $res['statusas'];?>">
					<?php 
					
					include("../prekes_db_connect.php");
	  
					$q= "select * from statusai";
					$query=mysqli_query($con,$q);
					while ($qq=mysqli_fetch_array($query)) 
					{
					?>
					<option value="<?php echo $qq['id'];  ?>"><?php echo $qq['statusas']; ?></option>
					<?php
					}
					?>
					
				</select>
            </div>
			
            <div class="form-group">
                <input type="submit" value="Redaguoti" 
                    name="btn" class="btn btn-danger">
            </div> 
        </form>
		<a href=
			"uzsakymai.php" 
			class="btn btn-danger">
			Grįžti
        </a>
    </div>
</body>
  
</html>