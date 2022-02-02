<?php

// Подключаемся к MySQL

$servername = "192.168.11.4";
$username = "lanuser";
$password = "123";
$dbmain = "ntlmain";
$db_machine = $db;


// Подключаемся

$DB_connect = new mysqli($servername, $username, $password, $dbmain);
$DB_connect_machine = new mysqli($servername, $username, $password, $db_machine);
// Проверка соединения

if ($DB_connect->connect_error) {
    die("Ошибка подключения: " . $DB_connect->connect_error);
};
?>
