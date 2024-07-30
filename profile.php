<?php

    session_start();

    require_once("dbconnect.php");
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>FunGame</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
h5{
font-family: Roboto, Verdana, Tahoma, sans; 
color: #fff;
}
</style>
 <center> <div id ="srft">
 <h2>FunGame | Онлайн гра</h2> 
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
 <h2 style="font-family: Roboto, Verdana, Tahoma, sans; color: #fff;">Ваш аккаунт:</h2> 
<?php
$user = $_SESSION['login'];
$mf = file_get_contents("usernames/".$user."/info.data");
$vik = file_get_contents("usernames/".$user."/years.data");
 echo "<h5>Логін: ".$_SESSION['login']."</h5>";
 echo "<h5>Стать/Вік: ".$mf." ".$vik."</h5>";
?>
<p></p>
<a href="http://fungame1.zzz.com.ua/admin.php"><button class="button">🎯Результат</button></a>
<p></p>
<a href="/"><button class="button">🔙Назад</button></a>
<p></p>
<a href="/logout.php"><button class="button">🔚Вихід</button></a>
</center>
                
           
             <div class="clear"></div>
        </div>
 </div>  <?php
                }
            ?>