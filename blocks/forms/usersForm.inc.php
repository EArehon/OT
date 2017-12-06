<form action ="<?php echo $_SERVER["PHP_SELF"].'?option=userManager'?>"  method="POST">
    <div class="table">
        <div class="row">
            <div class="cell"><label for="name">Имя пользователя*</label></div>
            <div class="cell"><input type="text" name="name" id="name"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="login">Логин*</label></div>
            <div class="cell"><input type="text" name="login" id="login"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="password">Пароль*</label></div>
            <div class="cell"><input type="password" name="password" id="password"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="passwordConfirm">Повтор пароля*</label></div>
            <div class="cell"><input type="password" name="passwordConfirm" id="passwordConfirm"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="role">Роль*</label></div>
            <div class="cell"><input type="text" name="role" id="role"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="departmen">Отдел*</label></div>
            <div class="cell"><input type="text" name="departmen" id="departmen"></div>
        </div>
    </div>
    <button  type="submit" name="createNewUser">Отправить</button>


</form>

