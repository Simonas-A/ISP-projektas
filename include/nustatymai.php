<?php
//nustatymai.php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "vartvald");
define("TBL_USERS", "users");
$user_roles=array(      // vartotojų rolių vardai lentelėse ir  atitinkamos userlevel reikšmės
	"Administratorius"=>"9",
	"Dalyvis"=>"4",
	"Vadovas"=>"5",);   // galioja ir vartotojas "guest", kuris neturi userlevel
define("DEFAULT_LEVEL","Dalyvis");  // kokia rolė priskiriama kai registruojasi
define("ADMIN_LEVEL","Administratorius");  // kas turi vartotojų valdymo teisę
define("UZBLOKUOTAS","255");      // vartotojas negali prisijungti kol administratorius nepakeis rolės
$uregister="both";  // kaip registruojami vartotojai
// self - pats registruojasi, admin - tik ADMIN_LEVEL, both - abu atvejai
// * Email Constants - 
define("EMAIL_FROM_NAME", "Demo");
define("EMAIL_FROM_ADDR", "demo@ktu.lt");
define("EMAIL_WELCOME", false);
