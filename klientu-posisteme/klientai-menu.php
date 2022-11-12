<table class="center" style=" width:75%; border-width: 2px; border-style: dotted;">
		         <tr><td width=30%><a href="../index.php">[Atgal]</a></td><td width=30%> 
                    </table
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

        echo "[<a href=\"clientedit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";
        echo "[<a href=\"clientbalance.php\">Sąsakitos likutis</a>] &nbsp;&nbsp;";
        echo "[<a href=\"clientcommongoods.php\">Perkamiausios prekės</a>] &nbsp;&nbsp;";
        echo "[<a href=\"clientspentamount.php\">Išleista suma</a>] &nbsp;&nbsp;";
        echo "[<a href=\"clientshoppinghistory.php\">Apsipirkimų istorija</a>] &nbsp;&nbsp;";

        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
            echo "[<a href=\"clientlist.php\">Klientų sąrašas</a>] &nbsp;&nbsp;";
            echo "[<a href=\"clientadd.php?newuser=1\">Pridėti naują klientą</a>] &nbsp;&nbsp;";
            //echo "[<a href=\"admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
        }
        //echo "[<a href=\"logout.php\">Atsijungti</a>]";
      echo "</td></tr></table>";
?>       
    
 