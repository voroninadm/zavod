<?php
$servername = "192.168.11.4";
$username = "lanuser";
$password = "123";


$DB_connect_miraflex1 = new mysqli($servername, $username, $password, 'miraflex1');
$DB_connect_miraflex2 = new mysqli($servername, $username, $password, 'miraflex2');
$DB_connect_lemo = new mysqli($servername, $username, $password, 'lemo');
$DB_connect_fisher4 = new mysqli($servername, $username, $password, 'fisher4');
$DB_connect_fisher5 = new mysqli($servername, $username, $password, 'fisher5');
$DB_connect_fisher6 = new mysqli($servername, $username, $password, 'fisher6');
$DB_connect_laminator1 = new mysqli($servername, $username, $password, 'laminator1');
$DB_connect_laminator2 = new mysqli($servername, $username, $password, 'laminator2');
$DB_connect_laminator3 = new mysqli($servername, $username, $password, 'laminator3');

// Проверка соединения

if ($DB_connect_miraflex1->connect_error) {
  die("Ошибка подключения к базе Miraflex1: " . $DB_connect_miraflex1->connect_error);
};
if ($DB_connect_miraflex2->connect_error) {
  die("Ошибка подключения к базе Miraflex2: " . $DB_connect_miraflex2->connect_error);
};
if ($DB_connect_lemo->connect_error) {
  die("Ошибка подключения к базе LEMO: " . $DB_connect_lemo->connect_error);
};
if ($DB_connect_fisher4->connect_error) {
  die("Ошибка подключения к базе Fisher4: " . $DB_connect_fisher4->connect_error);
};
if ($DB_connect_fisher5->connect_error) {
  die("Ошибка подключения к базе Fisher5: " . $DB_connect_fisher5->connect_error);
};
if ($DB_connect_fisher6->connect_error) {
  die("Ошибка подключения к базе Fisher6: " . $DB_connect_fisher6->connect_error);
};
if ($DB_connect_laminator1->connect_error) {
  die("Ошибка подключения к базе Laminator1: " . $DB_connect_laminator1->connect_error);
};
if ($DB_connect_laminator2->connect_error) {
  die("Ошибка подключения к базе Laminator2: " . $DB_connect_laminator2->connect_error);
};
if ($DB_connect_laminator3->connect_error) {
  die("Ошибка подключения к базе Laminator3: " . $DB_connect_laminator3->connect_error);
};


$date_from = $_POST["date-from"];
$date_to = $_POST["date-to"];

?>
