<?php
    //Запускаем сессию
    session_start();

    //Добавляем файл подключения к БД
    require_once("dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';
     
    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

    /*
    Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке, о том что он зашёл на эту страницу напрямую.
    */
    if(isset($_POST["btn_submit_auth"]) && !empty($_POST["btn_submit_auth"])){
     
        //(1) Место для следующего куска кода

        //Проверяем полученную капчу
        if(isset($_POST["captcha"])){
         
            //Обрезаем пробелы с начала и с конца строки
            $captcha = trim($_POST["captcha"]);
         
            if(!empty($captcha)){
         
                //Сравниваем полученное значение с значением из сессии. 
                if(($_SESSION["rand"] != $captcha) && ($_SESSION["rand"] != "")){
                     
                    // Если капча не верна, то возвращаем пользователя на страницу авторизации, и там выведем ему сообщение об ошибке что он ввёл неправильную капчу.
         
                    $error_message = "<p class='mesage_error'><strong>Помилка!</strong> Ви ввели неправильну капчу </p>";
         
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] = $error_message;
         
                    //Возвращаем пользователя на страницу авторизации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
         
                    //Останавливаем скрипт
                    exit();
                }
         
            }else{
         
                $error_message = "<p class='mesage_error'><strong>Помилка!</strong> Поле для ввода капчі пусте. </p>";
         
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] = $error_message;
         
                //Возвращаем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
         
                //Останавливаем скрипт
                exit();
         
            }
         
            //(2) Место для обработки почтового адреса
            //Обрезаем пробелы с начала и с конца строки
            $login = trim($_POST["login"]);
            if(isset($_POST["login"])){
             

                if(!empty($login)){
                    $login = htmlspecialchars($login, ENT_QUOTES);
             
                    //Проверяем формат полученного почтового адреса с помощью регулярного выражения
                                 $reg_login = "[a-z0-9][a-z0-9\._-]*[a-z0-9]";
                    //Если формат полученного почтового адреса не соответствует регулярному выражению
                    if($login == $test ){
                        // Сохраняем в сессию сообщение об ошибке. 
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Помилка</p>";
                         
                        //Возвращаем пользователя на страницу авторизации
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/form_auth.php");
             
                        //Останавливаем скрипт
                        exit();
                    }
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Поле для ввода логіну не повинне бути пустим.</p>";
                     
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");
             
                    //Останавливаем скрипт
                    exit();
                }
                 
             
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Поле для логіну пусте</p>";
                 
                //Возвращаем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
             
                //Останавливаем скрипт
                exit();
            }
             
            //(3) Место для обработки пароля
            if(isset($_POST["password"])){
 
                //Обрезаем пробелы с начала и с конца строки
                $password = trim($_POST["password"]);
             
                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);
             
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажіть Ваш пароль</p>";
                     
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
             
                    //Останавливаем скрипт
                    exit();
                }
                 
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Пусте поле для ввода паролю</p>";
                 
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
             
                //Останавливаем скрипт
                exit();
            }

            //(4) Место для составления запроса к БД
            //Запрос в БД на выборке пользователя.
            $result_query_select = $mysqli->query("SELECT * FROM `users` WHERE login = '".$login."' AND password = '".$password."'");
             
            if(!$result_query_select){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Помилка на виборці користувача в БД</p>";
                 
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
             
                //Останавливаем скрипт
                exit();
            }else{
             
                //Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
                if($result_query_select->num_rows == 1){
                     
                    // Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;
$first_name = file_get_contents("usernames/".$login."/years.data");
$last_name = file_get_contents("usernames/".$login."/info.data");

$d = date("d.m.Y H:i"); // Дата, час   
$f = fopen("userdata/admin.txt", 'a'); //файл для запису данних для таблиці 
fwrite($f, "<tr><td>".$_SESSION['login']."</td><td>".$first_name."</td><td>".$last_name."</td><td>Вхід</td><td>".$d."</td>");  
                    //Возвращаем пользователя на главную страницу
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");
             
                }else{
                     
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
                     
                    //Возвращаем пользователя на страницу авторизации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_auth.php");
             
                    //Останавливаем скрипт
                    exit();
                }
            }
        }else{
            //Если капча не передана
            exit("<p><strong>Ошибка!</strong> Нема перевірочного коду. Ви можете перейти на <a href=".$address_site."> головну сторінку </a>.</p>");
        }

     
    }else{
        exit("<p><strong>Помилка!</strong> Ви можете перейти на <a href=".$address_site."> головну сторінку </a>.</p>");
    }