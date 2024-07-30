<?php
    require_once("header.php");
?>
 
<div class="block_for_messages">
    <?php
 //якщо в сессії є повідомлення про помилки, то виводимо їх
        if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
            echo $_SESSION["error_messages"];
 
            //Знищуємо, щоб не виводилось заново при перезавантаженні сторінки
            unset($_SESSION["error_messages"]);
        }
 
        if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
             
            unset($_SESSION["success_messages"]);
        }
    ?>
</div>
 
<?php
    if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])){
?>
 
 
    <div id="form_auth">
        <h2>Вхід</h2>
        <form action="auth.php" method="post" name="form_auth">
            <table>
          
                <tbody><tr>
                    <td> Логін: </td>
                    <td>
                        <input type="text" name="login" required="required"><br>
                        <span id="valid_login_message" class="mesage_error"></span>
                    </td>
                </tr>
          
                <tr>
                    <td> Пароль: </td>
                    <td>
                        <input type="password" name="password" placeholder="мінімум 6 символів" required="required"><br>
                        <span id="valid_password_message" class="mesage_error"></span>
                    </td>
                </tr>
                 
                <tr>
                    <td> Введіть капчу: </td>
                    <td>
                        <p>
                            <img src="captcha.php" alt="Капча" /> <br>
                            <input type="text" name="captcha" placeholder="Перевірочний код">
                        </p>
                    </td>
                </tr>
 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_submit_auth" value="Вхід">
                    </td>
                </tr>
            </tbody></table>
        </form>
    </div>
 
<?php
    }else{
?>
 
    <div id="authorized">
        <h2>Вы уже ввійшли</h2>
    </div>
 
<?php
    }
?>