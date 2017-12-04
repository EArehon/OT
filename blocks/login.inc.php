<?php 
    $data = $_POST;
    if( isset($data['do_login']) )
    {
        $errors = array();
        $login = $data['login'];
        
        $user = R::findOne('users', "login = ?", array($data['login']));
        
        if ($user){
            if($data['password'] == $user->password){
                $_SESSION['logged_user']  = $user;
				header("LOCATION: {$_SERVER['PHP_SELF']}");
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