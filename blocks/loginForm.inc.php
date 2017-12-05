<form action = "<?php echo $_SERVER["PHP_SELF"]?>" method="POST">

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
