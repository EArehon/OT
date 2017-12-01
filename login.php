<?php 
require 'db.php';

    $data = $_POST;

    if( isset($data['do_login']) )
    {
        $errors = array();

        $login = $data['login'];
        

        $user = R::findOne('users', "name = ?", array($data['login']));
        
        if ($user){
            if($data['password'] == $user->password){
                $_SESSION['logged_user']  = $user;
                echo '<div style="color:green;">Вы авторизованы.<br> Можете перейти на <a href="/">главную</a> страницу!</div><hr>';
            }
            else{
                $errors[] = 'Пароль введен не верно!';
            }
        }
        else{
            $errors[] = 'Пользователь с таким логином не найден!';
        }

        if (!empty($errors))
        {
            echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
        }

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