<?php

require_once 'db.php';

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

$tech_print = ['correction_PN', 'correction_CMYK','electro', 'mechanical', 'aniloks', 'clean_machine', 'form_glue', 'rakel', 'clean_dry', 'clean_val'];
$titles = ['work_date', 'work_shift', 'operator1', 'operator2', 'operator3', 'operator_helper', 'tkn', 'material1', 'colors', 'width1', 'thickness1', 'workout_mass', 'prepare_hours' ];

$data = get_data($DB_connect_miraflex1,'2021-10-26', '2022-02-03', $titles, $tech_print);
foreach ($data as $row) {
  foreach ($row as $key => $val) {
    echo $key . " => " . $val . "\n";
  }
  $res = get_titles_sum($row, $tech_print);
  echo "all techopp: " . $res . " hours";
  echo "\n";
}
