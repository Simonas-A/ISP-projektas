
<html>
  
<head>

    <meta http-equiv="Content-Type" 
        content="text/html; charset=UTF-8">
  
    <title>Add List</title>
  
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
  
<body>
    <div class="container mt-5">
        <h1>Pridėti prekę</h1>
        <form action="prideti_preke.php" method="POST">
            <div class="form-group">
                <label>Pavadinimas</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Pavadinimas" 
                    name="iname" />
            </div>
  
            <div class="form-group">
                <label>Kiekis</label>
                <input type="text" 
                    class="form-control" 
                    placeholder="Kiekis" 
                    name="iqty" />
            </div>
  
            <div class="form-group">
                <label>Statusas</label>
                <select class="form-control" 
                    name="istatus">
                    <option value="0">
                        Laukiama
                    </option>
                    <option value="1">
                        Įsigyta
                    </option>
                    <option value="2">
                        Nėra parduotuvėje
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Data</label>
                <input type="date" 
                    class="form-control" 
                    placeholder="Data" 
                    name="idate">
            </div>
            <div class="form-group">
                <input type="submit" 
                    value="Pridėti" 
                    class="btn btn-danger" 
                    name="btn">
            </div>
			<div class="form-group">
                <input type="submit" 
                    value="Grįžti" 
                    class="btn btn-danger" 
                    name="btn1">
            </div>
        </form>
    </div>
  
    <?php
        if(isset($_POST["btn"])) {
            include("prekes_db_connect.php");
            $item_name=$_POST['iname'];
            $item_qty=$_POST['iqty'];
            $item_status=$_POST['istatus'];
            $date=$_POST['idate'];
      
  
            $q="insert into prekes(pavadinimas,
            kiekis,statusas,Data)
            values('$item_name','$item_qty',
            '$item_status','$date')";
  
            mysqli_query($con,$q);
            header("location:operacija1.php");
        }
         if(isset($_POST["btn1"])) {
			 header("location:operacija1.php");
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