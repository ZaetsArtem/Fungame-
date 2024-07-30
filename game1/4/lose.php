<?php
    //запускаємо сессію
    session_start();

    require_once("../../dbconnect.php");
?>
 ﻿<?php
$d = date("d.m.Y H:i"); // Дата, час   
$f = fopen("../../userdata/Administrator.txt", 'a'); //файл для запису данних для таблиці
$click = $_POST['click'];
$number = "10";
$data = $click + $number;
$user = $_SESSION['login'];
$mf = file_get_contents("../../usernames/".$user."/info.data");
$vik = file_get_contents("../../usernames/".$user."/years.data");
if(empty($_SESSION['login'])){
echo "Error!";
} else {
fwrite($f, "<tr><td>".$_SESSION['login']."</td><td>".$vik."</td><td>".$mf."</td><td>1</td><td>4</td><td></td><td></td><td></td><td>Ні</td><td>0:00</td><td>".$d."</td></tr>");  
$connect_db1 = mysqli_connect( "localhost", "develop77", "Monolit44", "web_developer753" );
$posts1 = mysqli_query( $connect_db1, "SELECT id FROM `users` WHERE login='".$_SESSION['login']."'");
$num_rows1 = mysqli_fetch_row( $posts1 )[0];
$id1 = "4";
$result_query_insert = $mysqli->query("INSERT INTO `result` (data, datagame, finalresult, task_id, all_click, wrong_click, user_id) VALUES ('-', '".$d."', '0:00', '".$id1."', '-', '-', '".$num_rows1."')");
$task_id = "4";
$game_id = "1";
$result_query_insert = $mysqli->query("INSERT INTO `task` (task_id, game_id, sequence) VALUES ('".$task_id."', '".$game_id."', 'lose')");
$game_i = "4";
$descr = "1";
$result_query_insert = $mysqli->query("INSERT INTO `game` (game_id, game_description) VALUES ('".$game_i."', '".$descr."')");
            if(!$result_query_insert){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Error on request MySQL</p>";
            }
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$address_site."/index.php"); //повертаємо користувача на основну сторінку
}
?>