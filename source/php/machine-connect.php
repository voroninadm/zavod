<?php

// Подключаемся к MySQ

require_once './php/config.php';
// Подключаемся

if (isset($db_machine)) {
  $DB_connect = new mysqli($servername, $username, $password, $dbmain);
  $DB_connect_machine = new mysqli($servername, $username, $password, $db_machine);
} else {
  $DB_connect = new mysqli($servername, $username, $password, $dbmain);
}

// Проверка соединения

if ($DB_connect->connect_error) {
  die("Ошибка подключения к главной базе: " . $DB_connect->connect_error);
};
?>
