<?php
// meniu.php  rodomas meniu pagal vartotojo rolę

if (!isset($_SESSION)) { header("Location: logout.php");exit;}
include("include/nustatymai.php");
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
        if ($_SESSION['user'] != "guest") echo "[<a href=\"useredit.php\">Redaguoti paskyrą</a>] &nbsp;&nbsp;";
        echo "[<a href=\"operacija1.php\">Prekės</a>] &nbsp;&nbsp;";
        echo "[<a href=\"klientu-posisteme/client-menu.php\">Klientai</a>] &nbsp;&nbsp;";
        //echo "[<a href=\"operacija2.php\">Demo operacija2</a>] &nbsp;&nbsp;";
	   //echo "[<a href=\"operacija3.php\">Demo operacija2</a>] &nbsp;&nbsp;";
		echo "[<a href=\"pristatymas.php\">Pristatymai</a>] &nbsp;&nbsp;";
        if ($_SESSION['user'] != "guest") echo "[<a href=\"krepselio-posisteme/krepselis.php\">Mano krepšelis</a>] &nbsp;&nbsp;";
     //Trečia operacija tik rodoma pasirinktu kategoriju vartotojams, pvz.:
        if (($userlevel == $user_roles["Darbuotojas"]) || ($userlevel == $user_roles[ADMIN_LEVEL] )) {
            //echo "[<a href=\"skaitau.php\">Žinutės</a>] &nbsp;&nbsp;";
			echo "[<a href=\"tiekimas/tiekejai.php\">Tiekėjai</a>] &nbsp;&nbsp;";
			echo "[<a href=\"tiekimas/uzsakymai.php\">Tiekimo užsakymai</a>] &nbsp;&nbsp;";
       		}   
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
            echo "[<a href=\"admin.php\">Administratoriaus sąsaja</a>] &nbsp;&nbsp;";
        }
        echo "[<a href=\"logout.php\">Atsijungti</a>]";
      echo "</td></tr></table>";
?>  