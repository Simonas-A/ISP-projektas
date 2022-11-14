<html> 
<head>
    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Pridėti tiekėją</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Pridėti tiekėją</h1>
        <form action="prideti_tiekeja.php" method="POST">
            <div class="form-group">
                <label>Pavadinimas</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Pavadinimas" 
                    name="pavadinimas" />
            </div>
			<div class="form-group">
                <label>Adresas</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Adresas" 
                    name="adresas" />
            </div>
			<div class="form-group">
                <label>Miestas</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Miestas" 
                    name="miestas" />
            </div>
			<div class="form-group">
                <label>E. paštas</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="E. paštas" 
                    name="epastas" />
            </div>
            <div class="form-group">
                <input type="submit" 
                    value="Pridėti" 
                    class="btn btn-success" 
                    name="btn">
            </div>
			
        </form>
		<a href=
			"tiekejai.php" 
			class="btn btn-danger">
			Grįžti
        </a>
    </div>
  
    <?php
        if(isset($_POST["btn"])) {
            include("../prekes_db_connect.php");
            $pavadinimas=$_POST['pavadinimas'];
            $adresas=$_POST['adresas'];
            $miestas=$_POST['miestas'];
            $epastas=$_POST['epastas'];
  
            $q="insert into tiekejai(pavadinimas,
            adresas,miestas,epastas)
            values('$pavadinimas','$adresas',
            '$miestas','$epastas')";
  
            mysqli_query($con,$q);
            header("location:tiekejai.php");
        }
         if(isset($_POST["btn1"])) {
			 header("location:tiekejai.php");
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