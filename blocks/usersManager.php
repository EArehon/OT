<?php
    include '/blocks/forms/action/crudUsers.php';
    $data = $_POST;

    if(isset($_POST['newUser'])){
        //echo "Тут нужно вывести форму";
        include '/blocks/forms/usersForm.inc.php';
    }
    else{
        $users = R::getAll("SELECT * FROM users");
        $lengthUsers = count($users);
?>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"]."?option=userManager"?>" method="POST">
                <button type="subbmit" name="newUser">Создать</button>
            </form>
        </div>
<?php
        echo '<form action="'.$_SERVER["PHP_SELF"].'?option=userManager" method="POST" name="usersTable">';
        foreach ($users as $akk){
            printf('
            <input type="checkbox" name="id[]" value="%s">%s <hr>
            ', $akk['id'], $akk['name']);
        }
        echo '<button type="subbmit" name="deleteUser">Удалить</button>';
        echo '</form>';
    }
?>