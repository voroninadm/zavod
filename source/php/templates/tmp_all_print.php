<?php require_once 'report_functions.php' ?>

<script src="../js/JQuery.min.js"></script>
<script src="../js/tablesorter.min.js"></script>

<form method="post" action="/source/create_report.php" autocomplete="off">
  <fieldset class="filters">
    <legend class="filters__legend">Выберите необходимое оборудование</legend>
    <input class="filters__input visually-hidden" type="checkbox" name="miraflex1" id="miraflex1">
    <label class="filters__label" for="miraflex1">Miraflex1</label>
    <input class="filters__input visually-hidden" type="checkbox" name="miraflex2" id="miraflex2">
    <label class="filters__label" for="miraflex2">Miraflex2</label>
    <input class="filters__input visually-hidden" type="checkbox" name="lemo" id="lemo">
    <label class="filters__label" for="lemo">LEMO</label>
    <input class="filters__input visually-hidden" type="checkbox" name="fisher4" id="fisher4">
    <label class="filters__label" for="fisher4">Fisher4</label>
    <input class="filters__input visually-hidden" type="checkbox" name="fisher5" id="fisher5">
    <label class="filters__label" for="fisher5">Fisher5</label>
    <input class="filters__input visually-hidden" type="checkbox" name="fisher6" id="fisher6">
    <label class="filters__label" for="fisher6">Fisher6</label>
  </fieldset>
  <button type="submit" hidden>Сформировать отчет</button>
  <button type="reset" hidden>Сбросить значения</button>
</form>

<table class="table-sort">
  <caption class="table-sort__caption">Все работы по печати c <?= $date_start ?> по <?= $date_finish ?> </caption>
  <thead class="table-sort__head">
  <tr class="table-sort__row">
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">№</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Дата смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">№ смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Мастер смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Оператор 1</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Оператор 2</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Оператор 3</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Помощник оператора</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Номер ТКН</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Планируемое время работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Начало&nbsp;работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Окончание&nbsp;работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Фактическое время работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Заказчик</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Наименование заказа</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Тираж заказа</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Материал</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Кол-во красок</th>
    <th class="table-sort__header" colspan="2">Размеры</th>
    <th class="table-sort__header" colspan="2">Количество сырья</th>
    <th class="table-sort__header no-sort" colspan="4">Выработка</th>
    <th class="table-sort__header no-sort" colspan="4">Отходы</th>
    <th class="table-sort__header" colspan="2">Приправка</th>
    <th class="table-sort__header" colspan="2">Корректировка красок, ч</th>
    <th class="table-sort__header" colspan="8">Технические операции, ч</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Скорость печати, м/м</th>
    <th class="table-sort__header" colspan="3">Часы отсутствия
    </th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Разница тиража</th>
    <th class="table-sort__header" rowspan="2">Примечание</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
    <th class="table-sort__header table-sort__header--sorted">план</th>
    <th class="table-sort__header table-sort__header--sorted">факт</th>
    <th class="table-sort__header table-sort__header--sorted">кг</th>
    <th class="table-sort__header table-sort__header--sorted">пог.м.</th>
    <th class="table-sort__header table-sort__header--sorted">m<sup>2</sup>
    <th class="table-sort__header table-sort__header--sorted">на ОТК,
      <small>кг</small></th>
    <th class="table-sort__header table-sort__header--sorted">план</th>
    <th class="table-sort__header table-sort__header--sorted">печать</th>
    <th class="table-sort__header table-sort__header--sorted">сырья</th>
    <th class="table-sort__header table-sort__header--sorted">итого</th>
    <th class="table-sort__header table-sort__header--sorted">кг</th>
    <th class="table-sort__header table-sort__header--sorted">часов</th>
    <th class="table-sort__header table-sort__header--sorted">PN</th>
    <th class="table-sort__header table-sort__header--sorted">CMYK</th>
    <th class="table-sort__header table-sort__header--sorted">электрика</th>
    <th class="table-sort__header table-sort__header--sorted">механика</th>
    <th class="table-sort__header table-sort__header--sorted">подбор анилоксов</th>
    <th class="table-sort__header table-sort__header--sorted">мытье машины</th>
    <th class="table-sort__header table-sort__header--sorted">переклейка форм</th>
    <th class="table-sort__header table-sort__header--sorted">замена ракеля</th>
    <th class="table-sort__header table-sort__header--sorted">чистка сушки</th>
    <th class="table-sort__header table-sort__header--sorted">чистка валов</th>
    <th class="table-sort__header table-sort__header--sorted">людей</th>
    <th class="table-sort__header table-sort__header--sorted">заказов</th>
    <th class="table-sort__header table-sort__header--sorted">сырья</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">

  </thead>

  <tbody class="table-sort__body">
  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--miraflex1" colspan="15"><b>Мирафлекс1</b></td>
  </tr>
  <?php foreach ($miraflex1 as $row) : ?>
    <tr class="table-sort__row row-data row-data--miraflex1">
      <?php $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y') ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row row-data row-data--miraflex1">
    <?= setAllPrint($miraflex1)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--miraflex2" colspan="15"><b>Мирафлекс2</b></td>
  </tr>
  <?php foreach ($miraflex2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--miraflex2">
      <?php $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y') ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row row-data row-data--miraflex2">
    <?= setAllPrint($miraflex2)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--lemo" colspan="15"><b>LEMO</b></td>
  </tr>
  <?php foreach ($lemo as $row) : ?>
    <tr class="table-sort__row row-data row-data--lemo">
      <?php $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y') ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row row-data row-data--lemo">
    <?= setAllPrint($lemo)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher4" colspan="15"><b>Fisher & Krecke 4</b></td>
  </tr>
  <?php foreach ($fisher4 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher4">
      <?php $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y') ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row row-data row-data--fisher4">
    <?= setAllPrint($fisher4)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher5" colspan="15"><b>Fisher & Krecke 5</b></td>
  </tr>
  <?php foreach ($fisher5 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher5">
      <?php $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y') ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row row-data row-data--fisher5">
    <?= setAllPrint($fisher5)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher6" colspan="15"><b>Fisher & Krecke 6</b></td>
  </tr>
  <?php foreach ($fisher6 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher6">
      <?php $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y') ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row row-data row-data--fisher6">
    <?= setAllPrint($fisher6)?>
  </tr>
  </tbody>
</table>
