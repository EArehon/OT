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

        foreach ($users as $akk){
            echo $akk['name']."<hr>";
        }
    }
?>