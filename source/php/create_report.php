<?php

$db_machine = 'lemo';

require "./machine-connect.php";

$date_from = $_POST["date-from"];
$date_to = $_POST["date-to"];

?>

<!DOCTYPE html>
<html class="page" lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content=">NTL учет производства">
  <title>NTL учет</title>
  <link rel="stylesheet" href="../css/style.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">

</head>

<body class="page__body">
  <header class="page__header">
	<a class="header__logo" href="index.html">
		<img class="logo" src="../icons/NTL_logo.svg" alt="NTL_logo" width="110">
	</a>
	<nav class="header-nav">
		<ul class="header-nav__list reset-list">
			<li class="header-nav__item">
				<a class="header-nav__link header-nav__link--persons" href="../adding.html">Пользователи и заказчики</a>
			</li>
			<li class="header-nav__item">
				<a class="header-nav__link header-nav__link--mainpage" href="../index.html">На главную</a>
			</li>
			<li class="header-nav__item">
				<a class="header-nav__link header-nav__link--mainpage" href="../report.phtml">report</a>
			</li>
		</ul>
	</nav>
</header>


<main class="page__main">
<form method="post" action="/source/create_report.php" autocomplete="off">
  <fieldset>
    <legend>Выберите необходимое оборудование</legend>
    <label for="mf1">Miraflex1</label>
    <input type="checkbox" name="mf1" id="mf1">
    <label for="mf2">Miraflex2</label>
    <input type="checkbox" name="mf2" id="mf2">
    <label for="lemo">LEMO</label>
    <input type="checkbox" name="lemo" id="lemo">
    <label for="fk4">Fisher4</label>
    <input type="checkbox" name="fk4" id="fk4">
    <label for="fk5">Fisher5</label>
    <input type="checkbox" name="fk5" id="fk5">
    <label for="fk6">Fisher6</label>
    <input type="checkbox" name="fk6" id="fk6">
    <label for="lm1">Laminator1</label>
    <input type="checkbox" name="lm1" id="lm1">
    <label for="lm2">Laminator2</label>
    <input type="checkbox" name="lm2" id="lm2">
    <label for="lm3">Laminator 3</label>
    <input type="checkbox" name="lm3" id="lm13">
  </fieldset>
  <button type="submit">Сформировать отчет</button>
  <button type="reset">Сбросить значения</button>
</form>

<table class="table-sort">
  <caption>Отчет простоя c <?print $date_from ?> по <?print $date_to ?> </caption>

  <thead class="table-sort__head">
    <tr class="table-sort__row">
      <th class="table-sort__header"></th>
      <th class="table-sort__header table-sort__header--sorted">Электро-механика</th>
      <th class="table-sort__header table-sort__header--sorted">Техническое обслуживание</th>
      <th class="table-sort__header table-sort__header--sorted">Персонал</th>
      <th class="table-sort__header table-sort__header--sorted">Заказы</th>
      <th class="table-sort__header table-sort__header--sorted">Сырье</th>
      <th class="table-sort__header table-sort__header--sorted">ИТОГО</th>
    </tr>
  </thead>
  <tbody class="table-sort__body">
    <tr class="table-sort__row">
      <th class="table-sort__header">ЛЕМО </th>
      <td>
      <?php
      $result = mysqli_query($DB_connect_machine, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '".$date_from."' AND '".$date_to."'");
      $result = mysqli_fetch_assoc($result);
      $sum1=$result['sum'];
      echo ($sum1 != 0) ? $sum1. ' ч.' : 0 .' ч.';
        ?>
      </td>
      <td>
      </td>
      <td>
      <?php
      $result = mysqli_query($DB_connect_machine, 'SELECT SUM(no_human) sum FROM primbase');
      $result = mysqli_fetch_assoc($result);
      $sum2=$result['sum'];
      echo $sum2. ' ч.';
        ?>
      </td>
      <td>
      <?php
      $result = mysqli_query($DB_connect_machine, 'SELECT SUM(no_work) sum FROM primbase');
      $result = mysqli_fetch_assoc($result);
      $sum3=$result['sum'];
      echo $sum3. ' ч.';
        ?>
      </td>
      <td>
      <?php
      $result = mysqli_query($DB_connect_machine, 'SELECT SUM(no_raw) sum FROM primbase');
      $result = mysqli_fetch_assoc($result);
      $sum4=$result['sum'];
      echo $sum4. ' ч.';
        ?>
      </td>
      <td>
        <?php
      echo $sum1 + $sum2 + $sum3 + $sum4 . ' ч.';
      ?>
      </td>
    </tr>
  </tbody>

</table>
</main>
</body>
</html>
