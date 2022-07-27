<?php

//для отчета по простоям
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
 * @param mysqli $DB_connect
 * @param string $date_from
 * @param string $date_to
 * @param array $types
 * @return array
 */
function get_machine_report(mysqli $DB_connect, string $date_from, string $date_to, array $types): array
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


// для отчета по выработкам

/**
 * Получаем данные по машине
 * @param mysqli $DB_connect
 * @param string $date_from
 * @param string $date_to
 * @param array $titles - массив с заголовками полей БД
 * @return array
 */
function get_data(mysqli $DB_connect, string $date_from, string $date_to, array $titles, array $tech): array
{
  $titles = array_merge($titles, $tech);
  $titles = implode(',', $titles);
  $sql = "SELECT $titles FROM primbase WHERE work_date BETWEEN '{$date_from}' AND '{$date_to}'";
  $result = mysqli_query($DB_connect, $sql);

  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function get_titles_sum(array $allTitles, array $titles): int|float
{
  $sum = 0;
  foreach ($allTitles as $key => $value)
  {
    if (in_array($key, $titles)) {
      $sum += $value;
    }
  }

  return $sum;
}
