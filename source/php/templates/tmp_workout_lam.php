<?php require_once 'report_functions.php'?>

<script src="/js/JQuery.min.js"></script>
<script src="/js/tablesorter.min.js"></script>

<form method="post" action="/source/create_report.php" autocomplete="off">
  <fieldset class="filters">
    <legend class="filters__legend">Выберите необходимое оборудование</legend>
    <input class="filters__input visually-hidden" type="checkbox" name="laminator1" id="laminator1">
    <label class="filters__label" for="laminator1">Laminator1</label>
    <input class="filters__input visually-hidden" type="checkbox" name="laminator2" id="laminator2">
    <label class="filters__label" for="laminator2">Laminator2</label>
    <input class="filters__input visually-hidden" type="checkbox" name="laminator3" id="laminator3">
    <label class="filters__label" for="laminator3">Laminator 3</label>
  </fieldset>
  <button type="submit" hidden>Сформировать отчет</button>
  <button type="reset" hidden>Сбросить значения</button>
</form>

<table class="table-sort">
  <caption class="table-sort__caption">Отчет по выработке ламинации c <?= $date_start ?> по <?= $date_finish ?> </caption>
  <thead class="table-sort__head">
  <tr class="table-sort__row">
    <th class="table-sort__header" rowspan="2">Дата смены</th>яя
    <th class="table-sort__header" rowspan="2">№ смены</th>
    <th class="table-sort__header" rowspan="2">Машинист</th>
    <th class="table-sort__header" rowspan="2">Номер ТКН</th>
    <th class="table-sort__header" colspan="3">Материалы</th>
    <th class="table-sort__header" rowspan="2">Выработка, м<sup>2</sup></th>
    <th class="table-sort__header" rowspan="2">Приправка, ч</th>
    <th class="table-sort__header" rowspan="2">Тех.операции, ч</th>
    <th class="table-sort__header" rowspan="2">Примечания</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">
    <th class="table-sort__header">Материал 1</th>
    <th class="table-sort__header">Материал 2</th>
    <th class="table-sort__header">Материал дуплекс</th>
  </tr>
  </thead>
  <tbody class="table-sort__body">
  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator1" colspan="17"><b>Ламинатор 1</b></td>
  </tr>
  <?php foreach ($laminator1 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator1">
      <?= lam_workout($row, $prepare, $tech_lam) ?>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator2" colspan="17"><b>Ламинатор 2</b></td>
  </tr>
  <?php foreach ($laminator2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator2">
      <?= lam_workout($row, $prepare, $tech_lam) ?>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator3" colspan="17"><b>Ламинатор 3</b></td>
  </tr>
  <?php foreach ($laminator3 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator3">
      <?= lam_workout($row, $prepare, $tech_lam) ?>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
