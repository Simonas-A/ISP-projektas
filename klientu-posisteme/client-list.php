<h1>You can see all clients here</h1>
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td width=30%><a href="./client-menu.php">[Atgal]</a></td><td width=30%>
</table>

<h1>Klientai</h1>
<a href="./client-add.php">Pridėti naują klientą</a>
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td><b>Vardas</b></td><td><b>Pavardė</b></td><td><b>El. paštas</b></td><td><b>Telefono numeris</b></td><td><b>Tipas</b></td><td><b>Redaguoti</b></td><td><b>Pašalinti</b></td></tr>
<?php
include("client-connect.php");
$q= "SELECT * FROM users WHERE type='klientas' ORDER BY name ASC";
//$result = mysql_query();
$query=mysqli_query($con,$q);
while($row = mysqli_fetch_array($query)) {
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['surname'] . "</td><td>" . $row['email'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['type'] . "</td><td><a href='./client-edit.php?id=" . $row['userid'] . "'>Redaguoti</a></td><td><a href='./client-delete.php?id=" . $row['userid'] . "'>Pašalinti</a></td></tr>";
}
echo "</table>";
?>
