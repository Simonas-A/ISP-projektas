<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td width=30%><a href="./client-menu.php">[Atgal]</a></td><td width=30%> 
</table>
<h1>You can see client balance here</h1>

<?php
include("client-connect.php");
session_start();
$userid=$_SESSION['userid'];
echo "Jūsų vartotojo ID: " . $userid . "<br>";
$sql = "SELECT * FROM users us INNER JOIN saskaita sk ON us.userid = sk.client WHERE us.userid='$userid'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Vardas: " . $row["name"]. " " . $row["surname"]. $row["amount"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();
?>

