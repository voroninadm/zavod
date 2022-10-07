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
 * @param array $titles - заголовки полей БД
 * @param array $tech - заголовки полей для суммирования
 * @param string|null $user
 * @return array
 */
function get_data(mysqli $DB_connect, string $date_from, string $date_to, array $titles, array $tech, string $user = null, string $reportType): array
{
  $titles = array_merge($titles, $tech);
  $titles = implode(',', $titles);
  if (!empty($user)) {
    if ($reportType === 'workout_print') {
      $sql = "SELECT $titles FROM primbase WHERE '{$user}' IN (operator1, operator2, operator3)
            AND (work_date BETWEEN '{$date_from}' AND '{$date_to}') ORDER BY work_date";
    } elseif ($reportType === 'workout_lam') {
      $sql = "SELECT $titles FROM primbase WHERE '{$user}' IN (operator)
            AND (work_date BETWEEN '{$date_from}' AND '{$date_to}') ORDER BY work_date";
    }
  } else {
    $sql = "SELECT $titles FROM primbase WHERE work_date BETWEEN '{$date_from}' AND '{$date_to}' ORDER BY work_date";
  }
  $result = mysqli_query($DB_connect, $sql);

  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/**
 * Выбираем сумму из заданных полей
 * (На печатных - все тех.операции + корректировка красок)
 * @param array $allTitles - полученные данные типа $key=>$value
 * @param array $titles - заголовки для суммирования
 * @return int|float
 */
function get_titles_sum(array $allTitles, array $titles): int|float
{
  $sum = 0;
  foreach ($allTitles as $key => $value) {
    if (in_array($key, $titles)) {
      $sum += $value;
    }
  }

  return $sum;
}

// для вывода всех работ

/**
 * @param mysqli $DB_connect
 * @param string $date_from
 * @param string $date_to
 * @return array
 */
function get_all_works(mysqli $DB_connect, string $date_from, string $date_to): array
{
  $sql = "SELECT * FROM primbase WHERE work_date BETWEEN '{$date_from}' AND '{$date_to}' ORDER BY work_start";
  $result = mysqli_query($DB_connect, $sql);

  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


//
function getAverageSum ($column)
{
  $count = 0;
  foreach ($column as $value) {
    if ($value != 0 ){
      $count ++;
    }
  }
  if($count != 0) {
    return array_sum($column) / $count;
  }
}

function getTask ($DB_connect, $taskId)
{
  $sql = "SELECT * FROM primbase WHERE id='{$taskId}'";
  $result = mysqli_query($DB_connect, $sql);

  return mysqli_fetch_assoc($result);
}
