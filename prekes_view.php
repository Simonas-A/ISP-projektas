<?php
    include("prekes_db_connect.php");
    if(isset($_POST['btn']))
    {
        $item_name=$_POST['iname'];
        $item_qty=$_POST['iqty'];
        $istatus=$_POST['istatus'];
        $date=$_POST['idate'];
        $id = $_GET['id'];
        $q= "update prekes set pavadinimas='$item_name', kiekis='$item_qty', 
        statusas='$istatus', Data='$date' where id=$id";
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
                <label>Kiekis</label>
        <h1><?php echo $res['kiekis'];?></h1>
            </div>
  
            <div class="form-group">
                <label>Statusas</label>
                    <?php
                        if($res['statusas'] == 0) {
                    ?>
                    <h1><?php echo "Laukiama";?></h1>
                    <?php } else if($res['statusas'] == 1) { ?>
                   <h1><?php echo "Įsigyta";?></h1>
                    <?php } else if($res['statusas'] == 2) { ?>
                    <h1><?php echo "Nėra parduotuvėje";?></h1>
                    <?php
                        }
                    ?>
            </div>
  
            <div class="form-group">
                <label>Data</label>
			<h1><?php echo $res['Data'];?></h1>
            </div>
			<div class="form-group">
                <label>Papildoma informacija</label>
				<h1><?php echo "Papildoma informacija";?></h1>
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