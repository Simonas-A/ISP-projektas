<?php
    include("prekes_db_connect.php");
    if(isset($_POST['btn']))
    {
		$item_name=$_POST['Pavadinimas'];
		$sell_price=$_POST['Pardavimo_kaina'];
		$price=$_POST['savikaina'];
		$discount=$_POST['Nuolaida'];
		$from=$_POST['Vieta'];
		$shipping=$_POST['SiuntimoKaina'];
		$info=$_POST['Informacija'];
        $id = $_GET['id'];
        $q= "update prekes set pavadinimas='$item_name', Pardavimo_kaina='$sell_price', 
        Savikaina='$price', Nuolaida='$discount', Kilmes_vieta='$from', Siuntimo_kaina='$shipping', Papildoma_informacija='$info' where id=$id";
        $query=mysqli_query($con,$q);
        header('location:operacija1.php');
    } 
    else if(isset($_GET['id'])) 
    {
        $q = "SELECT * FROM prekes WHERE Id='".$_GET['id']."'";
        $query=mysqli_query($con,$q);
        $res= mysqli_fetch_array($query);
    }
	         if(isset($_POST["btn1"])) {
			 header("location:operacija1.php");
		 }
?>
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
      
    <title>Update List</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">

        <form method="post">
            <div class="form-group">
                <label>Pavadinimas</label>
        <h1><?php echo $res['pavadinimas'];?></h1>
            </div>
  
            <div class="form-group">
                <label>Kaina</label>
        <h1><?php echo $res['Pardavimo_kaina'];?></h1>
            </div>
			
  			<div class="form-group">
                <label>Nuolaida</label>
				<h1><?php 
				if (isset($res['Nuolaida']))
					echo $res['Nuolaida'];
				else
					echo "Prekė neturi nuolaidų";
			?></h1>
            </div>
			
			<div class="form-group">
                <label>Papildoma informacija</label>
				<h1><?php echo $res['Papildoma_informacija'];?></h1>
            </div>
  
            <div class="form-group">
                <input type="submit" value="Atnaujinti" 
                    name="btn" class="btn btn-danger">
            </div>
		<div class="form-group">
                <input type="submit" 
                    value="Grįžti" 
                    class="btn btn-danger" 
                    name="btn1">
            </div>  
        </form>
    </div>
</body>
  
</html>