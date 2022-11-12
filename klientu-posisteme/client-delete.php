<?php
$clientid=$_GET['id'];
include("client-connect.php");
$q= "SELECT * FROM users WHERE userid='$clientid'";
$query=mysqli_query($con,$q);
$row = mysqli_fetch_array($query);
?>
<h1>Are you sure you want to delete client <?php echo $row['name'] . " " . $row['surname']; ?>?</h1>
<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
<tr><td width=30%><a href="./client-list.php">[Atgal]</a></td><td width=30%>
<a href="./client-delete.php?id=<?php echo $clientid; ?>&sure=yes">[Taip]</a></td></tr>
</table>
<?php
if($_GET['sure']??""=="yes"){
$q= "DELETE FROM users WHERE userid='$clientid'";
$query=mysqli_query($con,$q);
header("Location: client-list.php");
}