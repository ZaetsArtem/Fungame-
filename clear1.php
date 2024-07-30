<?php
    //Запускаем сессию
    session_start();
?>
 
<?php
if($_SESSION['login'] == "admin"){
file_put_contents("userdata/Administrator.txt"," ");
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$address_site."security.php");
} else {
echo "Error 404!";
exit();
}
?>
