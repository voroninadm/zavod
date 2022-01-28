<?php

// Подключаемся к MySQL

$servername = "192.168.11.4";
$username = "lanuser";
$password = "123";
$dbname = "ntlmain";
$db_machine = {{ machines[machineID].name }};

// Подключаемся

$DB_connect = new mysqli($servername, $username, $password, $dbname);
$DB_connect_machine = new mysqli($servername, $username, $password, $db_machine);
// Проверка соединения

if ($DB_connect->connect_error) {
    die("Ошибка подключения: " . $DB_connect->connect_error);
}
?>
