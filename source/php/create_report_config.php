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

$report_type = $_POST["report_type"] ?? null;

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

//print workout report
if ($report_type === 'workout_print') {
  $tech_print = ['correction_PN', 'correction_CMYK', 'electro', 'mechanical', 'aniloks', 'clean_machine', 'form_glue', 'rakel', 'clean_dry', 'clean_val'];
  $titles = ['work_date', 'work_shift', 'operator1', 'operator2', 'operator3', 'operator_helper', 'tkn', 'material1', 'colors', 'width1', 'thickness1', 'workout_mass', 'prepare_hours', 'notes'];

  $miraflex1 = get_data($DB_connect_miraflex1, $date_from, $date_to, $titles, $tech_print);
  $miraflex2 = get_data($DB_connect_miraflex2, $date_from, $date_to, $titles, $tech_print);
  $lemo = get_data($DB_connect_lemo, $date_from, $date_to, $titles, $tech_print);
  $fisher4 = get_data($DB_connect_fisher4, $date_from, $date_to, $titles, $tech_print);
  $fisher5 = get_data($DB_connect_fisher5, $date_from, $date_to, $titles, $tech_print);
  $fisher6 = get_data($DB_connect_fisher6, $date_from, $date_to, $titles, $tech_print);
}

//master reports
if ($report_type === 'workout_lam') {

  $prepare = ['prepare', 'prepare_shirt'];
  $tech_lam = ['flushing','tech_clean','change_glue', 'electro', 'mechanical', 'tech_service', 'calibrating'];
  $titles = ['work_date', 'work_shift', 'operator', 'tkn', 'material1', 'width1', 'thickness1', 'material2', 'width2', 'thickness2', 'material3', 'width3', 'thickness3', 'workout_m2', 'notes'];

  $not_main_titles = array_merge($prepare, $tech_lam);
  $laminator1 = get_data($DB_connect_laminator1, $date_from, $date_to, $titles, $not_main_titles);
  $laminator2 = get_data($DB_connect_laminator2, $date_from, $date_to, $titles, $not_main_titles);
  $laminator3 = get_data($DB_connect_laminator3, $date_from, $date_to, $titles, $not_main_titles);
}


