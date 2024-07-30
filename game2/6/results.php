<?php
    //запускаємо сессію
    session_start();

    require_once("../../dbconnect.php");
?>
 ﻿<?php
$d = date("d.m.Y H:i"); // Дата, час   
$f = fopen("../../userdata/Administrator.txt", 'a'); //файл для запису данних для таблиці
$click = $_POST['click'];
$range = $_POST['range'];
$timer =$_POST['timer'];
$number = "10";
$data = $click + $number;
$user = $_SESSION['login'];
$mf = file_get_contents("../../usernames/".$user."/info.data");
$vik = file_get_contents("../../usernames/".$user."/years.data");
if(empty($_POST['timer'])){
echo "Error!";
} else {
fwrite($f, "<tr><td>".$_SESSION['login']."</td><td>".$vik."</td><td>".$mf."</td><td>2</td><td>6</td><td>".$_POST['click']."</td><td>".$data."</td><td>10</td><td>так</td><td>".$_POST['timer']."</td><td>".$d."</td><td>".$range."</td></tr>");  
$id1 = "6";
$connect_db1 = mysqli_connect( "localhost", "develop77", "Monolit44", "web_developer753" );
$posts1 = mysqli_query( $connect_db1, "SELECT id FROM `users` WHERE login='".$_SESSION['login']."'");
$num_rows1 = mysqli_fetch_row( $posts1 )[0];
echo $num_rows1;
$result_query_insert = $mysqli->query("INSERT INTO `result` (data, datagame, finalresult, task_id, all_click, wrong_click, user_id) VALUES ('".$number."', '".$d."', '".$timer."', '".$id1."', '".$data."', '".$click."', '".$num_rows1."')");
$task_id = "6";
$game_id = "2";
$result_query_insert = $mysqli->query("INSERT INTO `task` (task_id, game_id, sequence) VALUES ('".$task_id."', '".$game_id."', '".$range."')");
$game_i = "6";
$descr = "2";
$result_query_insert = $mysqli->query("INSERT INTO `game` (game_id, game_description) VALUES ('".$game_i."', '".$descr."')");
            if(!$result_query_insert){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Error on request MySQL</p>";
            }
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$address_site."/index.php"); //повертаємо користувача на основну сторінку
}
?>