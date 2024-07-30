<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Логи гри</title>
 </head>
 <body>
<center>
  <table border="1">
   <a href="security.php">Адмін панель (Тільки для адміна)</a>
<p></p>
   <caption>ЛОГ (таблиця):</caption>
   <tr>
    <th>Логін користувача</th>
    <th>Вік</th>
    <th>Стать</th>
    <th>Номер завдання</th>
    <th>Номер гри</th>
    <th>Хибні кліки</th>
    <th>Всього кліків</th>
    <th>Знайдено відмінностей</th>
    <th>Пройшов гру (так/ні)</th>
    <th>Залишилось часу</th>
    <th>Дата проходження</th>
    <th>Послідовність знайдення елементів</th>
   </tr>
<?php
 $info = file_get_contents("userdata/Administrator.txt");
  echo $info;
?>
</table>
</center>
 </body>
</html>