<?php
    include("../prekes_db_connect.php");
    if(isset($_POST['btn']))
    {
        $pavadinimas=$_POST['pavadinimas'];
		$adresas=$_POST['adresas'];
		$miestas=$_POST['miestas'];
		$epastas=$_POST['epastas'];
        $id = $_GET['id'];
        $q= "update tiekejai set pavadinimas='$pavadinimas', adresas='$adresas', 
        miestas='$miestas', epastas='$epastas' where id=$id";
        $query=mysqli_query($con,$q);
        header('location:tiekejai.php');
    } 
    else if(isset($_GET['id'])) 
    {
        $q = "SELECT * FROM tiekejai WHERE Id='".$_GET['id']."'";
        $query=mysqli_query($con,$q);
        $res= mysqli_fetch_array($query);
    }
	         if(isset($_POST["btn1"])) {
			 header("location:tiekejai.php");
		 }
?>
<html>
  
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
      
    <title>Redaguoti tiekėją</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Redaguoti tiekėją</h1>
        <form method="post">
            <div class="form-group">
                <label>Pavadinimas</label>
                <input type="text" 
                    class="form-control" 
                    name="pavadinimas" 
                    placeholder="Pavadinimas" 
                    value=
        "<?php echo $res['pavadinimas'];?>" />
            </div>
  
            <div class="form-group">
                <label>Adresas</label>
                <input type="text" 
                    class="form-control" 
                    name="adresas" 
                    placeholder="Adresas" 
value="<?php echo $res['adresas'];?>" />
            </div>
			
			<div class="form-group">
                <label>Miestas</label>
                <input type="text" 
                    class="form-control" 
                    name="miestas" 
                    placeholder="Miestas" 
value="<?php echo $res['miestas'];?>" />
            </div>
  
            <div class="form-group">
                <label>E. paštas</label>
                <input type="text" 
                    class="form-control" 
                    name="epastas" 
                    placeholder="E. paštas" 
value="<?php echo $res['epastas'];?>" />
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