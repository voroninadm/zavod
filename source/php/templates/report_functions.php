<?php

/**
 * tempolate for print workout report
 * @param $row
 * @param $tech_print
 * @return string
 */
function print_workout($row, $tech_print)
{ return '
<td>' . date_format(date_create($row['work_date']), 'd.m.Y') . '</td>
<td>' . $row['work_shift'] . '</td>
<td>' . $row['operator1'] . '</td>
<td>' . $row['operator2'] . '</td>
<td>' . $row['operator3'] . '</td>
<td>' . $row['tkn'] . '</td>
<td>' . $row['material1'] . '</td>
<td>' . $row['colors'] . '</td>
<td>' . $row['width1'] . '</td>
<td>' . $row['thickness1'] . '</td>
<td>' . $row['workout_mass'] . '</td>
<td>' . $row['workout_m2'] . '</td>
<td>' . $row['workout_length'] . '</td>
<td>' . $row['prepare_hours'] . '</td>
<td>' . get_titles_sum($row, $tech_print) . '</td>
<td>' . $row['notes'] . '</td>
';
}

/**
 * template for lamination machine report
 * @param $row
 * @param $prepare
 * @param $tech_lam
 * @return string
 */
function lam_workout($row, $prepare, $tech_lam)
{ return '
<td>' . date_format(date_create($row['work_date']), 'd.m.Y') . '</td>
<td>' . $row['work_shift'] . '</td>
<td>' . $row['operator'] . '</td>
<td>' . $row['tkn'] . '</td>
<td>' . $row['material1'] . '</td>
<td>' . $row['material2'] . '</td>
<td>' . $row['material3'] . '</td>
<td>' . $row['workout_m2'] . '</td>
<td>' . get_titles_sum($row, $prepare)  . '</td>
<td>' . get_titles_sum($row, $tech_lam) . '</td>
<td>' . $row['notes'] . '</td>
';
}


/**
 * for all_print report last string summarize
 * @param $machine
 * @return string
 */
function setAllPrint($machine)
{
  return '
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'colors')), 2) . '</td>
<td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'width1')), 2) . '</td>
<td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'thickness1')), 2) . '</td>
<td></td>
<td></td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'workout_mass')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'workout_length')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'workout_m2')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'otk_mass')), 2) . '</td>
<td></td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'waste_print')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'waste_raw')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'waste_sum')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'prepare_mass')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'prepare_hours')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'correction_PN')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'correction_CMYK')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'electro')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'mechanical')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'aniloks')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'clean_machine')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'form_glue')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'rakel')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'clean_dry')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'clean_val')), 2) . '</td>
<td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'speed')), 2) . '</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
';
}


/**
 * for all_lam report last string summarize
 * @param $machine
 * @return string
 */
function setAllLam($machine)
{
  return '
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'width1')), 2) . '</td>
  <td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'thickness1')), 2) . '</td>
  <td></td>
  <td></td>
  <td></td>
  <td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'width2')), 2) . '</td>
  <td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'thickness2')), 2) . '</td>
  <td></td>
  <td></td>
  <td></td>
  <td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'width3')), 2) . '</td>
  <td>μ:&nbsp;' . round(getAverageSum(array_column($machine, 'thickness3')), 2) . '</td>
  <td></td>
  <td></td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'workout_mass')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'workout_length')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'workout_m2')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'otk_mass')), 2) . '</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'prepare')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'prepare_shirt')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'electro')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'mechanical')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'flushing')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'tech_clean')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'change_glue')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'calibrating')), 2) . '</td>
  <td>∑:&nbsp;' . round(array_sum(array_column($machine, 'tech_service')), 2) . '</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  ';
}
