<?php 
    require 'db.php';
    include 'blocks/login.inc.php';
	include 'blocks/logout.inc.php';
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

    <?php 
        //проверяем выполнен вход на сайт или нет
        if(isset($_SESSION['logged_user'])){
            //загружаем главную страницу
            include 'blocks/header.inc.php';
            
            //выбираем какую страницу загружать
            if(!isset($_GET['option'])){
                include 'blocks/main.inc.php';
            }
            else{
                include 'blocks/usersManager.php';
            }
            
        }
        else{ 
            //иначе загружаем форму для входа
            include 'blocks/loginForm.inc.php';
        }
    ?>
    </body>
</html>

    

