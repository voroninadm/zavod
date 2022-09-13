<?php

/**
 * for all_print report
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
<td></td>
<td></td>
<td></td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'prepare_mass')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'prepare_hours')), 2) . '</td>
<td></td>
<td></td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'electro')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'mechanical')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'aniloks')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'clean_machine')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'form_glue')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'rakel')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'clean_dry')), 2) . '</td>
<td>∑:&nbsp;' . round(array_sum(array_column($machine, 'clean_val')), 2) . '</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
';
}



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
