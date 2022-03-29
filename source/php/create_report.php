<?php
require './create_report_config.php'
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
          <a class="header-nav__link header-nav__link--mainpage" href="../index.html">На главную</a>
        </li>
        <li class="header-nav__item">
          <a class="header-nav__link header-nav__link--report" href="../report.phtml">report</a>
        </li>
      </ul>
    </nav>
  </header>


  <main class="page__main">
    <form method="post" action="/source/create_report.php" autocomplete="off">
      <fieldset class="filters">
        <legend>Выберите необходимое оборудование</legend>
        <label for="miraflex1">Miraflex1</label>
        <input type="checkbox" name="miraflex1" id="miraflex1">
        <label for="miraflex2">Miraflex2</label>
        <input type="checkbox" name="miraflex2" id="miraflex2">
        <label for="lemo">LEMO</label>
        <input type="checkbox" name="lemo" id="lemo">
        <label for="fisher4">Fisher4</label>
        <input type="checkbox" name="fisher4" id="fisher4">
        <label for="fisher5">Fisher5</label>
        <input type="checkbox" name="fisher5" id="fisher5">
        <label for="fisher6">Fisher6</label>
        <input type="checkbox" name="fisher6" id="fisher6">
        <label for="laminator1">Laminator1</label>
        <input type="checkbox" name="laminator1" id="laminator1">
        <label for="laminator2">Laminator2</label>
        <input type="checkbox" name="laminator2" id="laminator2">
        <label for="laminator3">Laminator 3</label>
        <input type="checkbox" name="laminator3" id="laminator3">
      </fieldset>
      <button type="submit" hidden>Сформировать отчет</button>
      <button type="reset" hidden>Сбросить значения</button>
    </form>

    <table class="table-sort">
      <caption>Отчет простоя c <? print $date_from ?> по <? print $date_to ?> </caption>

      <thead class="table-sort__head">
        <tr class="table-sort__row ">
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

        <tr class="table-sort__row row-data row-data--miraflex1">
          <th class="table-sort__header">miraflex1 </th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex1, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum5 = $result['sum'];
            echo ($sum5 != 0) ? round($sum5, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex1, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum6 = $result['sum'];
            echo ($sum6 != 0) ? round($sum6, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex1, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum7 = $result['sum'];
            echo ($sum7 != 0) ? round($sum7, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex1, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum8 = $result['sum'];
            echo ($sum8 != 0) ? round($sum8, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum5 + $sum6 + $sum7 + $sum8, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--miraflex2">
          <th class="table-sort__header">miraflex2 </th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex2, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex2, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex2, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_miraflex2, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--lemo">
          <th class="table-sort__header">ЛЕМО </th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_lemo, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_lemo, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_lemo, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_lemo, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--fisher4">
          <th class="table-sort__header">Fisher4 </th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher4, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher4, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher4, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher4, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--fisher5">
          <th class="table-sort__header">Fisher5</th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher5, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher5, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher5, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher5, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--fisher6">
          <th class="table-sort__header">Fisher6</th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher6, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher6, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher6, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_fisher6, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--laminator1">
          <th class="table-sort__header">laminator1</th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator1, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          <?php
            $result = mysqli_query($DB_connect_laminator1, "SELECT SUM(tech_service) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum5 = $result['sum'];
            echo ($sum5 != 0) ? round($sum5, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator1, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator1, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator1, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4 + $sum5, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--laminator2">
          <th class="table-sort__header">laminator2</th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator2, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          <?php
            $result = mysqli_query($DB_connect_laminator2, "SELECT SUM(tech_service) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum5 = $result['sum'];
            echo ($sum5 != 0) ? round($sum5, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator2, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator2, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator2, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4 + $sum5, 2) . ' ч.';
            ?>
          </td>
        </tr>
        <tr class="table-sort__row row-data row-data--laminator3">
          <th class="table-sort__header">laminator3</th>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator3, "SELECT SUM(electro_mechanical) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum1 = $result['sum'];
            echo ($sum1 != 0) ? round($sum1, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
          <?php
            $result = mysqli_query($DB_connect_laminator3, "SELECT SUM(tech_service) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum5 = $result['sum'];
            echo ($sum5 != 0) ? round($sum5, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator3, "SELECT SUM(no_human) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum2 = $result['sum'];
            echo ($sum2 != 0) ? round($sum2, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator3, "SELECT SUM(no_work) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum3 = $result['sum'];
            echo ($sum3 != 0) ? round($sum3, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            $result = mysqli_query($DB_connect_laminator3, "SELECT SUM(no_raw) sum FROM primbase WHERE work_date BETWEEN '" . $date_from . "' AND '" . $date_to . "'");
            $result = mysqli_fetch_assoc($result);
            $sum4 = $result['sum'];
            echo ($sum4 != 0) ? round($sum4, 2) . ' ч.' : 0 . ' ч.';
            ?>
          </td>
          <td>
            <?php
            echo round($sum1 + $sum2 + $sum3 + $sum4 + $sum5, 2) . ' ч.';
            ?>
          </td>
        </tr>

      </tbody>

    </table>
  </main>

  <script type="text/javascript" src="../js/reports.min.js"></script>

</body>

</html>
