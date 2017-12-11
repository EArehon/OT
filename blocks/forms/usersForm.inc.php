<script>
    function showError(container, errorMessage) {
      container.className = 'error';
      var msgElem = document.createElement('span');
      msgElem.className = "error-message";
      msgElem.innerHTML = errorMessage;
      container.appendChild(msgElem);
    }

    function resetError(container) {
      container.className = '';
      if (container.lastChild.className == "error-message") {
        container.removeChild(container.lastChild);
      }
    }
    
    function validate(form){
        
        var elems = form.elements;

        resetError(elems.name.parentNode);
        if(!elems.name.value){
            showError(elems.name.parentNode, ' Введите имя пользователя.');
            return false;
        }
        
        reg=/[А-Яа-яЁё]/;
        resetError(elems.name.parentNode);
        if(reg.test(elems.name.value)){
            showError(elems.name.parentNode, ' Имя пользователя должно содержать только буквы русского алфавита.');
            return false;
        }
       
        resetError(elems.login.parentNode);
        if(!elems.login.value){
            showError(elems.login.parentNode, ' Укажите логин.');
            return false;
        }



        resetError(elems.password.parentNode);
        if(!elems.password.value){
            showError(elems.password.parentNode, ' Введите пароль.');
            return false;
        }

        resetError(elems.passwordConfirm.parentNode);
        if(!elems.passwordConfirm.value){
            showError(elems.passwordConfirm.parentNode, ' Введите пароль еще раз.');
            return false;
        }

        resetError(elems.passwordConfirm.parentNode);
        if(elems.passwordConfirm.value != elems.password.value){
            showError(elems.passwordConfirm.parentNode, ' Пароли не совпадают.');
            return false;
        }




        return true;
    }

    
</script>

<form action ="<?php echo $_SERVER["PHP_SELF"].'?option=userManager'?>"  method="POST" onsubmit="return validate(this)">
    <div class="table">
        <div class="row">
            <div class="cell"><label for="name">Имя пользователя*</label></div>
            <div class="cell"><input type="text" name="name" id="name" value="<?php echo @$user->name;?>"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="login">Логин*</label></div>
            <div class="cell"><input type="text" name="login" id="login" value="<?php echo @$user->login;?>" ></div>
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
            <div class="cell"><input type="text" name="role" id="role" value="<?php echo @$user->role_id;?>"></div>
        </div>
        <div class="row">
            <div class="cell"><label for="departmen">Отдел*</label></div>
            <div class="cell"><input type="text" name="departmen" id="departmen" value="<?php echo @$user->id_departmen;?>"></div>
        </div>
    </div>
    
    <?php 
        if(!isset($_GET['id'])){
            echo '<button  type="submit" name="createNewUser">Создать</button>';
            //echo '<button  type="button" onclick="validate(this.form)" name="createNewUser">Создать</button>';

        }
        else{
            echo '<input type="hidden" value="'.$userId.'" name="userId">';
            echo '<button  type="submit" name="updateUser">Изменить</button>';
        }
    ?>
</form>

