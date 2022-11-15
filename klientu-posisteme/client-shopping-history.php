<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<div style="margin: auto;width: 60%;padding: 10px;">
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td width=30%><a class="btn btn-danger" href="./client-menu.php">[Atgal]</a></td><td width=30%> 
</table>
<h1>You can see client shopping history here</h1>

<?php
include("client-connect.php");

session_start();
$userid=$_SESSION['userid'];
$sql = "SELECT pirk.id, pavadinimas, pirktas_kiekis FROM pirkimai pirk
RIGHT JOIN preke_pirkimai_tarpinis ppt ON ppt.fk_pirkimas_id=pirk.id
LEFT JOIN prekes p ON p.id=ppt.fk_preke_id WHERE pirk.fk_vartotojas_id = '$userid' ORDER BY id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class='table table-hover'>";
    echo "<tr><td><b>Apsipirkimas</b></td><td><b>Prekės pavadinimas</b></td><td><b>Pirktas kiekis</b></td></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["pavadinimas"]. "</td><td>" . $row["pirktas_kiekis"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$con->close();
?>
</div>