<html>
    <head>
        <meta http-equiv="Content-Type" 
            content="text/html; charset=UTF-8">
   
        <title>Mano krepšelis</title>
   
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
                    <h1>Mano krepšelis</h1>
                </div>
            </div>
   
            <!-- Grocery Cards -->
            <div class="row mt-4">

<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td width=30%><a href="./client-menu.php">[Atgal]</a></td><td width=30%> 
</table>
<h1>You can see list of client common goods here</h1>

<?php
include("client-connect.php");
session_start();
$userid=$_SESSION['userid'];
echo "Jūsų vartotojo ID: " . $userid . "<br>";
$sql = "SELECT pavadinimas, suma FROM (SELECT fk_preke_id, SUM(pirktas_kiekis) suma FROM pirkimai pirk RIGHT JOIN preke_pirkimai_tarpinis ppt ON pirk.id = ppt.fk_pirkimas_id
WHERE fk_vartotojas_id = '$userid'
GROUP BY fk_preke_id) prekkiek
LEFT JOIN prekes prek ON prek.id=prekkiek.fk_preke_id
ORDER BY suma DESC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1>Prekamiausių prekių sąrašas</h1>";
    echo "<table class='center' style=' width:75%; border-width: 2px; border-style: dotted'>";
    echo "<tr><td><b>Prekė</b></td><td><b>iš viso nupirkta</b></td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["pavadinimas"]. "</td><td>" . $row["suma"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$con->close();
?>
</body>
</html>
