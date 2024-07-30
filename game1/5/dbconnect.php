 <?php
        // Указываем кодировку
        header('Content-Type: text/html; charset=utf-8');

        $server = "localhost"; // имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost
        $username = "d_wf75"; // Имя пользователя БД
        $password = "Monolit44"; // Пароль пользователя. Если у пользователя нету пароля то, оставляем пустое значение ""
        $database = "xaker7533"; // Имя базы данных, которую создали
        
        // Подключение к базе данных через MySQLi
        $mysqli = new mysqli($server, $username, $password, $database);

        // Проверяем, успешность соединения. 
        if ($mysqli->connect_errno) { 
            die("<p><strong>Помилка в підключенні до бази данних!</strong></p><p><strong>Код помилки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Опис помилки:</strong> ".$mysqli->connect_error."</p>"); 
        }
        // Устанавливаем кодировку подключения
        $mysqli->set_charset('utf8');

        //Для удобства, добавим здесь переменную, которая будет содержать адрес (URL) нашего сайта
        $address_site = "http://fungame75.zzz.com.ua";
    ?>
    