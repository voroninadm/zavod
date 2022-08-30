<?php

require "./machine-connect.php";

$machineType = $_POST["machineType"];
$db_machine = $_POST["db_machine"];
$DB_connect_machine = new mysqli($servername, $username, $password, $db_machine);

if (isset($machineType)) {
  if ($machineType == "print") {

    $work_date = $_POST["work_date"];
    $work_shift = $_POST["work_shift"];
    $master = $_POST["master"];
    $operator1 = $_POST["operator1"];
    $operator2 = $_POST["operator2"];
    $operator3 = $_POST["operator3"];
    $operator_helper = $_POST["operator_helper"];
    $tkn = $_POST["tkn"];
    $work_plan = $_POST["work_plan"];
    $work_start = $_POST["work_start"];
    $work_finish = $_POST["work_finish"];
    $work_fact = $_POST["work_fact"];
    $customer = $_POST["customer"];
    $print_title = $_POST["print_title"];
    $circulation = $_POST["circulation"];
    $material1 = $_POST["material1"];
    $mat1count_plan = $_POST["mat1count_plan"];
    $mat1count = $_POST["mat1count"];
    $width1 = $_POST["width1"];
    $thickness1 = $_POST["thickness1"];
    $colors = $_POST["colors"];
    $workout_mass = $_POST["workout_mass"];
    $workout_length = $_POST["workout_length"];
    $workout_m2 = $_POST["workout_m2"];
    $otk_mass = $_POST["otk_mass"];
    $waste_plan = $_POST["waste_plan"];
    $waste_print = $_POST["waste_print"];
    $waste_raw = $_POST["waste_raw"];
    $waste_sum = $_POST["waste_sum"];
    $prepare_mass = $_POST["prepare_mass"];
    $prepare_hours = $_POST["prepare_hours"];
    $correction_PN = $_POST["correction_PN"];
    $correction_CMYK = $_POST["correction_CMYK"];
    $electro = $_POST["electro"];
    $mechanical = $_POST["mechanical"];
    $aniloks = $_POST["aniloks"];
    $clean_machine = $_POST["clean_machine"];
    $form_glue = $_POST["form_glue"];
    $rakel = $_POST["rakel"];
    $clean_dry = $_POST["clean_dry"];
    $clean_val = $_POST["clean_val"];
    $speed = $_POST["speed"];
    $no_human = $_POST["no_human"];
    $no_work = $_POST["no_work"];
    $no_raw = $_POST["no_raw"];
    $diff_circulation = $_POST["diff_circulation"];
    $notes = $_POST["notes"];

    $post = mysqli_query($DB_connect_machine, "INSERT INTO `primbase` (`id`, `work_date`, `work_shift`, `master`, `operator1`, `operator2`, `operator3`, `operator_helper`,`tkn`, `work_plan`, `work_start`, `work_finish`, `work_fact`, `customer`, `print_title`, `circulation`, `material1`, `colors`, `width1`, `thickness1`, `mat1count_plan`, `mat1count`, `workout_mass`, `workout_length`, `workout_m2`, `otk_mass`, `waste_plan`, `waste_print`, `waste_raw`, `waste_sum`, `prepare_mass`, `prepare_hours`, `correction_PN`, `correction_CMYK`, `electro`, `mechanical`, `aniloks`, `clean_machine`, `form_glue`, `rakel`, `clean_dry`, `clean_val`, `speed`, `no_human`, `no_work`, `no_raw`, `diff_circulation`, `notes`) VALUES (NULL, '$work_date', '$work_shift', '$master', '$operator1', '$operator2', '$operator3', '$operator_helper', '$tkn', '$work_plan', '$work_start', '$work_finish', '$work_fact', '$customer', '$print_title', '$circulation', '$material1', '$colors', '$width1', '$thickness1', '$mat1count_plan', '$mat1count', '$workout_mass', '$workout_length', '$workout_m2', '$otk_mass', '$waste_plan', '$waste_print' , '$waste_raw' , '$waste_sum', '$prepare_mass', '$prepare_hours', '$correction_PN', '$correction_CMYK', '$electro', '$mechanical', '$aniloks', '$clean_machine', '$form_glue', '$rakel', '$clean_dry', '$clean_val', '$speed', '$no_human', '$no_work', '$no_raw', '$diff_circulation', '$notes')");
  } if ($machineType == "lamination") {

    $work_date = $_POST["work_date"];
    $work_shift = $_POST["work_shift"];
    $master = $_POST["master"];
    $operator = $_POST["operator"];
    $operator_student = $_POST["operator_student"];
    $operator_helper = $_POST["operator_helper"];
    $tkn = $_POST["tkn"];
    $work_plan = $_POST["work_plan"];
    $work_start = $_POST["work_start"];
    $work_finish = $_POST["work_finish"];
    $work_fact = $_POST["work_fact"];
    $customer = $_POST["customer"];
    $print_title = $_POST["print_title"];
    $circulation = $_POST["circulation"];
    $material1 = $_POST["material1"];
    $material2 = $_POST["material2"];
    $material3 = $_POST["material3"];
    $width1 = $_POST["width1"];
    $width2 = $_POST["width2"];
    $width3 = $_POST["width3"];
    $thickness1 = $_POST["thickness1"];
    $thickness2 = $_POST["thickness2"];
    $thickness3 = $_POST["thickness3"];
    $mat1count_plan = $_POST["mat1count_plan"];
    $mat2count_plan = $_POST["mat2count_plan"];
    $mat3count_plan = $_POST["mat3count_plan"];
    $mat1count = $_POST["mat1count"];
    $mat2count = $_POST["mat2count"];
    $mat3count = $_POST["mat3count"];
    $workout_mass = $_POST["workout_mass"];
    $workout_length = $_POST["workout_length"];
    $workout_m2 = $_POST["workout_m2"];
    $otk_mass = $_POST["otk_mass"];
    $waste_plan = $_POST["waste_plan"];
    $waste_print = $_POST["waste_print"];
    $waste_lam = $_POST["waste_lam"];
    $waste_sum = $_POST["waste_sum"];
    $prepare = $_POST["prepare"];
    $prepare_shirt = $_POST["prepare_shirt"];
    $flushing = $_POST["flushing"];
    $tech_clean = $_POST["tech_clean"];
    $change_glue = $_POST["change_glue"];
    $electro = $_POST["electro"];
    $mechanical = $_POST["mechanical"];
    $tech_service = $_POST["tech_service"];
    $calibrating = $_POST["calibrating"];
    $no_human = $_POST["no_human"];
    $no_work = $_POST["no_work"];
    $no_raw = $_POST["no_raw"];
    $remain_perv = $_POST["remain_perv"];
    $remain_sec = $_POST["remain_sec"];
    $diff_circulation = $_POST["diff_circulation"];
    $prepare_ok = $_POST["prepare_ok"];
    $notes = $_POST["notes"];

    $post = mysqli_query($DB_connect_machine, "INSERT INTO `primbase` (`id`, `work_date`, `work_shift`, `master`, `operator`, `operator_student`, `operator_helper`, `tkn`, `work_plan`, `work_start`, `work_finish`, `work_fact`, `customer`, `print_title`, `circulation`, `material1`, `material2`, `material3`, `width1`, `width2`, `width3`, `thickness1`, `thickness2`, `thickness3`, `mat1count_plan`, `mat2count_plan`, `mat3count_plan`, `mat1count`, `mat2count`, `mat3count`, `workout_mass`, `workout_length`, `workout_m2`, `otk_mass`, `waste_plan`, `waste_print`, `waste_lam`, `waste_sum`, `prepare`, `prepare_shirt`, `flushing`, `tech_clean`, `change_glue`, `electro`, `mechanical`, `tech_service`, `calibrating`, `no_human`, `no_work`, `no_raw`, `remain_perv`, `remain_sec`, `diff_circulation`, `prepare_ok`, `notes`) VALUES (NULL, '$work_date', '$work_shift', '$master', '$operator', '$operator_student', '$operator_helper', '$tkn', '$work_plan', '$work_start', '$work_finish', '$work_fact', '$customer', '$print_title', '$circulation', '$material1', '$material2', '$material3', '$width1', '$width2', '$width3', '$thickness1', '$thickness2', '$thickness3', '$mat1count_plan', '$mat2count_plan', '$mat3count_plan', '$mat1count', '$mat2count', '$mat3count', '$workout_mass', '$workout_length', '$workout_m2', '$otk_mass', '$waste_plan', '$waste_print' , '$waste_lam' , '$waste_sum', '$prepare', '$prepare_shirt', '$flushing', '$tech_clean', '$change_glue', '$electro', '$mechanical', '$tech_service', '$calibrating', '$no_human', '$no_work', '$no_raw', '$remain_perv', '$remain_sec', '$diff_circulation', '$prepare_ok', '$notes')");
  }
} else {
  echo ("Переменная машины не задана!");
}

if (!$post) {
  die("Ошибка отправки данных в базу");
} else
  echo "Данные внесены успешно!"
?>
