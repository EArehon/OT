<?php 
    if(isset($data['createNewUser'])){
        $newUser = R::dispense('users');

        $newUser->name = $data['name'];
        $newUser->login = $data['login'];
        $newUser->password = $data['password'];
        $newUser->role_id = $data['role'];
        $newUser->id_departmen = $data['departmen'];
        R::store($newUser);

        echo '<div style="color:green;">Пользователь добавлен в базу!</div>';
    }
?>
