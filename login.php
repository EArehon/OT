<?php 
    require 'db.php';

    $data = $_POST;

    if( isset($data['do_login']) )
    {
        $errors = array();

        $login = $data['login'];
        

        
        if (R::count('users', "name = ?", array($data['login'])) > 0 ){
            echo "Такой логин есть в базе!";
        }
        else{
            echo "Такого логина нет в базе!";
        }


        //   $rsStaff = mysql_query($strSQLStaff);
    //   while($rowStaff = mysql_fetch_array($rsStaff)){
    }
?>

<form action="login.php" method="POST">

    <p>
       <strong>Логин:</strong><br><input type="text" name="login">
    </p>

    <p>
        <strong>Пароль:</strong><br><input type="text" name="password">
    </p>

    <p>
        <button type="submit" name="do_login">Войти</button>
    </p>
</form>