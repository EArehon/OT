<?php 
require 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
<hr>


<?php if( isset($_SESSION['logged_user']) ){ ?>
        <p>Авторизован!</p>
        <hr>
        <a href="logout.php">Выйти</a>
    <?php }
    else{ ?>
        <a href="login.php">Авторизоваться</a>
    <?php
    }
    ?>
 

    
</body>
</html>



