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
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Логи Адміна</title>
 </head>
 <body>
<center>
  <table border="1">
   <a href="security.php">Назад в адмінку</a>
   <caption>ЛОГ (таблиця):</caption>
   <tr>
    <th>Логін користувача</th>
    <th>Вік</th>
    <th>Стать</th>
    <th>Дія</th>
    <th>Дата</th>
   </tr>
<?php
 $info = file_get_contents("userdata/admin.txt");
  echo $info;
?>
</table>
</center>
 </body>
</html>