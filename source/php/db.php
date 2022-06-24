<?php

/**
 * Считаем простой по заданному параметру
 */
function get_idle($DB_connect, $date_from, $date_to, $idle_type) {
  $result = mysqli_query($DB_connect, "SELECT SUM($idle_type) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
  $result = mysqli_fetch_assoc($result);
  $sum = $result['sum'];
  return ($sum != 0) ? round($sum, 2) . ' ч.' : 0 . ' ч.';
}

/**
 * Создаем массив с простоями по машине
 */
function get_machine_report ($DB_connect, $date_from, $date_to, $types) {
  $idles = [];
  foreach ($types as $type) {
    $idles[] = get_idle($DB_connect, $date_from, $date_to, $type);
  }
  $sum = round(array_sum($idles), 2) . ' ч.';
  $report = array_combine($types, $idles);
  $report['sum'] = $sum;

  return $report;
}

/**
 * Выбираем все смены мастеров
 */
function get_master_work ($conn, $master_name) {
  $sql = "SELECT * FROM miraflex1, miraflex2, lemo, fisher4, fisher5, fisher6, miraflex1, miraflex2, miraflex3 WHERE master = $master_name";
  $result = mysqli_query($conn, $sql);

  return mysqli_fetch_all($result,  MYSQLI_ASSOC);
}
