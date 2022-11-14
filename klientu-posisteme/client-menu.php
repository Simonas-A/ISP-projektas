<html>
<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<head>
  <title>Klientai</title>
</head>
<center>
<body>
<a href="../index.php">[Atgal]</a>
<?php
session_start();
if (!isset($_SESSION)) { header("Location: logout.php");exit;}
include("../include/nustatymai.php");
$user=$_SESSION['user'];
$userlevel=$_SESSION['ulevel'];
$role="";
{foreach($user_roles as $x=>$x_value)
			      {if ($x_value == $userlevel) $role=$x;}
} 

     echo "<table width=100% border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"meniu\">";
        echo "<tr><td>";
        echo "Prisijungęs vartotojas: <b>".$user."</b>     Rolė: <b>".$role."</b> <br>";
        echo "</td></tr><tr><td>";

        //if ($_SESSION['user'] != "guest") echo "[<a href=\"useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";

        echo "[<a href=\"client-edit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";
        echo "[<a href=\"client-balance.php\">Sąsakitos likutis</a>] &nbsp;&nbsp;";
        echo "[<a href=\"client-common-goods.php\">Perkamiausios prekės</a>] &nbsp;&nbsp;";
        echo "[<a href=\"client-spent-amount.php\">Išleista suma</a>] &nbsp;&nbsp;";
        echo "[<a href=\"client-shopping-history.php\">Apsipirkimų istorija</a>] &nbsp;&nbsp;";

        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
            echo "[<a href=\"client-list.php\">Klientų sąrašas</a>] &nbsp;&nbsp;";
            echo "[<a href=\"client-add.php?newuser=1\">Pridėti naują klientą</a>] &nbsp;&nbsp;";
            //echo "[<a href=\"admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
        }
        //echo "[<a href=\"logout.php\">Atsijungti</a>]";
      echo "</td></tr></table>";
?>       
</body>
</center>
</html>
 