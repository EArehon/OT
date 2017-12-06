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

    if(isset($data['deleteUser'])){
        $ids = $data['id'];
        if(count($ids)){
            R::exec("DELETE FROM 'users' WHERE 'id' IN (".R::genSlots($ids).")", $ids);
        }
    }
?>
