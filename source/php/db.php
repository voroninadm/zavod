<?php

/**
 * Считаем простой по заданному параметру
 */
function get_idle($DB_connect, $date_from, $date_to, $idle_type)
{
  $result = mysqli_query($DB_connect, "SELECT SUM($idle_type) sum FROM primbase WHERE work_date BETWEEN '{$date_from}' AND '{$date_to}'");
  $result = mysqli_fetch_assoc($result);
  $sum = $result['sum'];
  return ($sum != 0) ? round($sum, 2) . ' ч.' : 0 . ' ч.';
}

/**
 * Создаем массив с простоями по машине
 */
function get_machine_report($DB_connect, $date_from, $date_to, $types)
{
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
 * Выборка работ мастера по машине
 * @param mysqli $DB_connect
 * @param mixed $date_from
 * @param mixed $date_to
 * @param string $name
 * @return array
 */
function get_master_work(mysqli $DB_connect, mixed $date_from, mixed $date_to, string $name): array
{
  $sql = "SELECT work_date, work_shift, tkn, work_start, work_finish, customer, print_title FROM primbase WHERE master = '{$name}' AND work_date BETWEEN '{$date_from}' AND '{$date_to}'";
  $result = mysqli_query($DB_connect, $sql);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
