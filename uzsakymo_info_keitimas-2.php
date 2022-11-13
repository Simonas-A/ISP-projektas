<html>  
      <head>  
           <title>Peržiūrėjimas apklausos temų</title>  
           <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		   <title>Užsakymo informacija</title>
  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		   <link rel="stylesheet" href="css/style.css">  
		   <script src="path-to/js/bootstrap-select.min.js"></script>

		   <style>
				h5.align-left {
					text-align:left;
					padding-left: 60px;
				}
			</style>
      </head>  
 </html> 

<?php
	session_start();
	include "include/nustatymai.php";

	$userlevel=$_SESSION['ulevel'];
	$previous_page = $_SESSION['prev'];
	$id = $_GET['id'];

    echo "<table width=100% border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"meniu\">";
	echo "<tr><td>";
	echo "</td></tr><tr><td>";
	echo "<form method='post' action='".$previous_page.".php' style='display:inline'><input type='submit' value='Grįžti' class='btn btn-danger' name='btn1'></form> &nbsp;&nbsp;";
    echo "</td></tr></table>";

	echo "<center><div class='container mt-5'>";
	echo "<h1 style='text-aling:left'>Užsakymo ID: ".$id." informacijos redagavimas</h1><br>";
	$dbc= new mysqli("localhost", "stud", "stud", "vartvald");
	$userid = $_SESSION['userid'];
	$sql = "SELECT p.id, p.data, p.kaina, p.prekiu_kiekis, p.fk_pristatymo_id, budai.budas FROM pirkimai AS p INNER JOIN apmokejimas AS a ON p.fk_apmokejimo_budo_id = a.id INNER JOIN apmokejimo_budai AS budai ON a.apmokejimo_budas = budai.id WHERE p.id = $id ORDER BY p.data DESC";
	$result = mysqli_query($dbc, $sql);
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<form method='post'><div><label>Pristatymo norimas laikas</label><input type='datetime-local' class='form-control' name='data' placeholder='Pristatymo normas laikas' value='".$row['data']."'/></div>";

		$shippment_id = $row['fk_pristatymo_id'];
		$sql_for_shippment_information = "SELECT * FROM pristatymai INNER JOIN statusai ON pristatymai.statusas = statusai.id WHERE pristatymai.id = $shippment_id";
    	$array_result_shippment = mysqli_query($dbc, $sql_for_shippment_information);
		$shippment_information = mysqli_fetch_assoc($array_result_shippment);
		echo "<div class='form-group'><label>Pristatymo adresas</label><input type='text' class='form-control' name='adresas' placeholder='Pristatymo adresas' value='".$shippment_information['adresas']."' /></div>";		
	} 

	echo "<div class='form-group'><input type='submit' value='Atnaujinti' name='btn' class='btn btn-danger'></div></form>";

	if(isset($_POST['btn']))
    {
		$_SESSION['prev'] = 'uzsakymo_info_keitimas-2';
        $datetime = $_POST['data'];
		$shippment_address = $_POST['adresas'];

		$sql_for_shippment = "UPDATE pristatymai SET data = '$datetime', adresas = '$shippment_address' WHERE id = $id";
        $query=mysqli_query($dbc, $sql_for_shippment);

		$_SESSION['message'] = 'Sėkmingai atnaujinta';
		$_SESSION['header'] = 'yes';

        header("location:".$previous_page.".php");
    } 
?>