<?php
    //Запускаем сессию
    session_start();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>FunGame</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
                //================ Проверка длины пароля ==================
                var password = $('input[name=password]');
                 
                password.blur(function(){
                    if(password.val() != ''){
         
                        //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
                        if(password.val().length < 6){
                            //Выводим сообщение об ошибке
                            $('#valid_password_message').text('Минимальная длина пароля 6 символов');
         
                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                             
                        }else{
                            // Убираем сообщение об ошибке
                            $('#valid_password_message').text('');
         
                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }
                    }else{
                        $('#valid_password_message').text('Введите пароль');
                    }
                });
            });
        </script>
    </head>
    <body>
 
        <style>
body 
 {
  background-color: #413F3C;
  font-size: 16px;

}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
border-radius: 12px;
width: 250px;
}
.button:hover {
    background-color: #FFFFFF;
    color: black;
    border: 2px solid #4CAF50; /* Green */
}
.button1 {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
border-radius: 12px;
width: 250px;
}
.button1:hover {
    background-color: #FFFFFF;
    color: black;
    border: 2px solid #008CBA; /* Green */
}

</style>

 <a href="/index.php"><button class="main">Головна</button></a>
            <div id="auth_block">
            <?php
                //Проверяем авторизован ли пользователь
                if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
                    // если нет, то выводим блок с ссылками на страницу регистрации и авторизации
            ?>

              <center><a href="/form_register.php"><button class="button">Реєстрація</button></a>
<p></p>
<a href="/form_auth.php"><button class="button1">Авторизація</button></a></center>


</div>




            <?php
                   }else{
                    //Если пользователь авторизован, то выводим ссылку Выход
            ?> 
<div id ="knopka">
   <h2>Профіль</h2>
</div>

                    <div id="link_logout">
                        <a href="/logout.php">Выход</a>
                    </div>
            <?php
                }
            ?>
           
             <div class="clear"></div>
        </div>
 </div>