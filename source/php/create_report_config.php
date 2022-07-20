<?php

require_once './db.php';

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


$date_start = date_create($date_from);
$date_start = date_format($date_start, 'd.m.Y');
$date_finish = date_create($date_to);
$date_finish = date_format($date_finish, 'd.m.Y');

$report_type = $_POST["report_type"];

//idle reports
if ($report_type === 'idle') {
  $print_idle_types = ['electro', 'mechanical', 'no_human', 'no_work', 'no_raw'];
  $lam_idle_types = ['electro', 'mechanical', 'tech_service', 'no_human', 'no_work', 'no_raw'];

  $miraflex1 = get_machine_report($DB_connect_miraflex1, $date_from, $date_to, $print_idle_types);
  $miraflex2 = get_machine_report($DB_connect_miraflex2, $date_from, $date_to, $print_idle_types);
  $lemo = get_machine_report($DB_connect_lemo, $date_from, $date_to, $print_idle_types);
  $fisher4 = get_machine_report($DB_connect_lemo, $date_from, $date_to, $print_idle_types);
  $fisher5 = get_machine_report($DB_connect_fisher5, $date_from, $date_to, $print_idle_types);
  $fisher6 = get_machine_report($DB_connect_fisher6, $date_from, $date_to, $print_idle_types);
  $laminator1 = get_machine_report($DB_connect_laminator1, $date_from, $date_to, $lam_idle_types);
  $laminator2 = get_machine_report($DB_connect_laminator2, $date_from, $date_to, $lam_idle_types);
  $laminator3 = get_machine_report($DB_connect_laminator3, $date_from, $date_to, $lam_idle_types);
}

//master reports
if ($report_type === 'master_choose') {
  $name = $_POST['master'];

  $work_mfx1 = get_master_work($DB_connect_miraflex1, $date_from, $date_to, $name);
}


//worker reports
if ($report_type === 'worker_choose') {
  $name = $_POST["worker"];
}
