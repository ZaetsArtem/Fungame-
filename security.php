<?php
    //Запускаем сессию
    session_start();
?>
 
<?php
if($_SESSION['login'] == "admin"){
} else {
echo "Error 404!";
exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FunGame</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                "use strict";
                //================ Проверка login ==================
         
                //регулярное выражение для проверки login
                var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
                var mail = $('input[name=login]');
                 
                mail.blur(function(){
                    if(mail.val() != ''){
         
                        // Проверяем, если введенный login соответствует регулярному выражению
                        if(mail.val().search(pattern) == 0){
                            // Убираем сообщение об ошибке
                            $('#valid_login_message').text('');
         
                            //Активируем кнопку отправки
                            $('input[type=submit]').attr('disabled', false);
                        }else{
                            //Выводим сообщение об ошибке
                            $('#valid_login_message').text('Не правильний Login');
         
                            // Дезактивируем кнопку отправки
                            $('input[type=submit]').attr('disabled', true);
                        }
                    }else{
                        $('#valid_login_message').text('Введіть Ваш login');
                    }
                });
         
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
 <center> <div id ="srft">
 <h2>FunGame | Онлайн гра</h2> 
<?php
/*
 * для начала подключимся к базе данных
 * возможно вы уже подключились к ней ранее
 * пользователь root и пустой пароль - настройки по умолчанию для Денвера
 */
$connect_db1 = mysqli_connect( "localhost", "develop77", "Monolit44", "web_developer753" );
 
/*
 * SQL запрос
 * у меня в качестве названия таблицы указана таблица с записями WordPress
 */
$posts1 = mysqli_query( $connect_db1, "SELECT id FROM `users` WHERE login='".$_SESSION['login']."'");
$num_rows1 = mysqli_fetch_row( $posts1 )[0];

 echo '<h3 style="color: white;  font-size: 17px;">ID: '.$num_rows1.'</h3>';
?>
</div></center>
            <div id="auth_block">
            <?php
                //перевірка, чи авторизований користувач
                if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
                    // якщо ні, то виводимо блок з посиланнями на реєстрацію і авторизацію
            ?>

<center><a href="/form_register.php"><button class="button">Реєстрація</button></a>
<p></p>
<a href="/form_auth.php"><button class="button1">Авторизація</button></a></center>



            <?php
                   }else{
                    //якщо користувач авторизований, то виводимо основну частину веб сайту
            ?> 
<center>
<?php
/*
 * для начала подключимся к базе данных
 * возможно вы уже подключились к ней ранее
 * пользователь root и пустой пароль - настройки по умолчанию для Денвера
 */
$connect_db = mysqli_connect( "localhost", "develop77", "Monolit44", "web_developer753" );
 
/*
 * SQL запрос
 * у меня в качестве названия таблицы указана таблица с записями WordPress
 */
$posts = mysqli_query( $connect_db, "SELECT COUNT(*) as count FROM `users`" );
$num_rows = mysqli_fetch_row( $posts )[0];

 echo '<h5 style="color: white;  font-size: 17px;">Кількість користувачів: '.$num_rows.'</h5>';
?>
<p></p>
<a href="/content.php"><button class="button">Адмін лог</button></a>
<p></p>
<a href="/admin.php"><button class="button">Лог гри</button></a>
<p></p>
<a href="/clear1.php"><button class="button">Очистити лог гри</button></a>
<p></p>
<a href="/clear2.php"><button class="button">Очистити лог адміна</button></a>
<p></p>
<a href="/"><button class="button">Назад</button></a>
</center>
                
           
             <div class="clear"></div>
        </div>
 </div>  <?php
                }
            ?>