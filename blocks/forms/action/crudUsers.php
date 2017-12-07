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

        var_dump($ids);
        echo  count($ids);
        echo R::genSlots($ids);
        $idss[]=array(11,12);

        if(count($ids)>0){
            R::exec("DELETE FROM `users` WHERE `id` IN (?,?)", $idss);
            echo '!!!!!!!!!!!!!!';
        }
    }
?>
