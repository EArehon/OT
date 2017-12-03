<?php
require 'lib/rb.php';
R::setup( 'mysql:host=localhost;dbname=ot','root', '' ); //for both mysql or mariaDB
session_start();
//$db = mysql_connect ("localhost","root","");
//mysql_select_db ("ot",$db);
?>