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
        <h1>Atnaujinti prekę</h1>
        <form method="post">
            <div class="form-group">
                <label>Pavadinimas</label>
                <input type="text" 
                    class="form-control" 
                    name="iname" 
                    placeholder="Pavadinimas" 
                    value=
        "<?php echo $res['pavadinimas'];?>" />
            </div>
  
            <div class="form-group">
                <label>Kiekis</label>
                <input type="text" 
                    class="form-control" 
                    name="iqty" 
                    placeholder="Kiekis" 
value="<?php echo $res['kiekis'];?>" />
            </div>
  
            <div class="form-group">
                <label>Statusas</label>
                <select class="form-control" 
                    name="istatus">
                    <?php
                        if($res['statusas'] == 0) {
                    ?>
                    <option value="0" selected>Laukiama</option>
                    <option value="1">Įsigyta</option>
                    <option value="2">Nėra parduotuvėje</option>
                    <?php } else if($res['statusas'] == 1) { ?>
                    <option value="0">Laukiama</option>
                    <option value="1" selected>Įsigyta</option>
                    <option value="2">Nėra parduotuvėje</option>
                    <?php } else if($res['statusas'] == 2) { ?>
                    <option value="0">Laukiama</option>
                    <option value="1">Įsigyta</option>
                    <option value="2" selected>Nėra parduotuvėje</option>
                    <?php
                        }
                    ?>
                </select>
            </div>
  
            <div class="form-group">
                <label>Data</label>
                <input type="date" class="form-control" 
                    name="idate" placeholder="Data" 
                    value="<?php echo $res['Data']?>">
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