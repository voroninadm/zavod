<?php
require_once './create_report_config.php';
?>

<!DOCTYPE html>
<html class="page" lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content=">NTL учет производства">
  <title>NTL учет</title>
  <link rel="stylesheet" href="../css/style.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

</head>

<body class="page__body">
<header class="page__header">
  <a class="header__logo" href="../index.html">
    <img class="logo" src="../icons/NTL_logo.svg" alt="NTL_logo" width="110">
  </a>
  <nav class="header-nav">
    <ul class="header-nav__list reset-list">
      <li class="header-nav__item">
        <a class="header-nav__link header-nav__link--persons" href="../adding.html">Пользователи и заказчики</a>
      </li>
      <li class="header-nav__item">
        <a class="header-nav__link header-nav__link--report" href="../report.phtml">Отчеты</a>
      </li>
      <li class="header-nav__item">
        <a class="header-nav__link header-nav__link--mainpage" href="../index.html">На главную</a>
      </li>
    </ul>
  </nav>
</header>


<main class="page__main">

  <?php if ($report_type === 'idle'): ?>
    <?php require_once './templates/tmp_idle.php' ?>

  <?php elseif ($report_type === 'workout_print'): ?>
    <?php require_once './templates/tmp_workout_print.php' ?>

  <?php elseif ($report_type === 'workout_lam'): ?>
    <?php require_once './templates/tmp_workout_lam.php' ?>

  <?php elseif ($report_type === 'all_print'): ?>
    <?php require_once './templates/tmp_all_print.php' ?>

  <?php elseif ($report_type === 'all_lam'): ?>
    <?php require_once './templates/tmp_all_lam.php' ?>


  <?php elseif ($report_type === null): ?>
    <p>Не выбран тип отчета.</p>
    <p>Пожалуйста, перейдите на страницу отчетов и выберите тип отчета</p>
  <?php endif; ?>

</main>

<script src="../js/reports.min.js"></script>
</body>

</html>
