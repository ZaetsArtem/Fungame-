<?php
    require_once("header.php");
?>
<!-- Блок для виводу повідомлень -->
<div class="block_for_messages">
    <?php
        //якщо в сессії є повідомлення про помилки, то виводимо їх
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Знищуємо, щоб не виводилось заново при перезавантаженні сторінки
            unset($_SESSION["error_messages"]);
        }
 
        //Якщо в сессії є позитивні повідомлення, то виводимо їх
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            //Знищуємо, щоб не виводилось заново при перезавантаженні сторінки
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    //Перевірка, якщо кориистувач не авторизований, виводимо повідомлення 
    //інакше виводимо повідомлення, що він зареєстрований
    if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])){
?>
        <div id="form_register">
            <h2>Реєстрація</h2>
 
            <form action="register.php" method="post" name="form_register">
                <table>
                    <tbody><tr>
                        <td> Вік: </td>
                        <td>
                            <input type="text" name="first_name" required="required">
                        </td>
                    </tr>
 
                    <tr>
                        <td> Стать (Ч, Ж): </td>
                        <td>
                            <input type="text" name="last_name" required="required">
                        </td>
                    </tr>
              
                    <tr>
                        <td> Логін: </td>
                        <td>
                            <input type="text" name="login" required="required"><br>
                            <span id="valid_login_message" class="mesage_error"></span>
                        </td>
                    </tr>
              
                    <tr>
                        <td> Пароль: </td>
                        <td>
                            <input type="password" name="password" placeholder="Мінімум 6 символів" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td> Введіть капчу: </td>
                        <td>
                            <p>
                                <img src="captcha.php" alt="Капча" /> <br><br>
                                <input type="text" name="captcha" placeholder="Перевірочний код" required="required">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зареєструватися!">
                        </td>
                    </tr>
                </tbody></table>
            </form>
        </div>
<?php
    }else{
?>
        <div id="authorized">
            <h2>Вы уже зареєстровані!</h2>
        </div>
<?php
    }
?>
