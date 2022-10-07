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
    <th class="table-sort__header table-sort__header--sorted" rowspan="2"></th>
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
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=miraflex1" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <?php
      $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y');
      $row['work_start'] = date_format(date_create($row['work_start']), 'H:i');
      $row['work_finish'] = date_format(date_create($row['work_finish']), 'H:i')
      ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--miraflex1">
    <?= setAllPrint($miraflex1)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--miraflex2" colspan="15"><b>Мирафлекс2</b></td>
  </tr>
  <?php foreach ($miraflex2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--miraflex2">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=miraflex2" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <?php
      $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y');
      $row['work_start'] = date_format(date_create($row['work_start']), 'H:i');
      $row['work_finish'] = date_format(date_create($row['work_finish']), 'H:i')
      ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--miraflex2">
    <?= setAllPrint($miraflex2)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--lemo" colspan="15"><b>LEMO</b></td>
  </tr>
  <?php foreach ($lemo as $row) : ?>
    <tr class="table-sort__row row-data row-data--lemo">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=lemo" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <?php
      $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y');
      $row['work_start'] = date_format(date_create($row['work_start']), 'H:i');
      $row['work_finish'] = date_format(date_create($row['work_finish']), 'H:i')
      ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--lemo">
    <?= setAllPrint($lemo)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher4" colspan="15"><b>Fisher & Krecke 4</b></td>
  </tr>
  <?php foreach ($fisher4 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher4">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=fisher4" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <?php
      $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y');
      $row['work_start'] = date_format(date_create($row['work_start']), 'H:i');
      $row['work_finish'] = date_format(date_create($row['work_finish']), 'H:i')
      ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--fisher4">
    <?= setAllPrint($fisher4)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher5" colspan="15"><b>Fisher & Krecke 5</b></td>
  </tr>
  <?php foreach ($fisher5 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher5">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=fisher5" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <?php
      $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y');
      $row['work_start'] = date_format(date_create($row['work_start']), 'H:i');
      $row['work_finish'] = date_format(date_create($row['work_finish']), 'H:i')
      ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--fisher5">
    <?= setAllPrint($fisher5)?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher6" colspan="15"><b>Fisher & Krecke 6</b></td>
  </tr>
  <?php foreach ($fisher6 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher6">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=fisher6" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <?php
      $row['work_date'] = date_format(date_create($row['work_date']), 'd.m.Y');
      $row['work_start'] = date_format(date_create($row['work_start']), 'H:i');
      $row['work_finish'] = date_format(date_create($row['work_finish']), 'H:i')
      ?>
      <?php foreach ($row as $data): ?>
        <td><?= $data != 0 ? $data : '' ?></td>
      <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--fisher6">
    <?= setAllPrint($fisher6)?>
  </tr>
  </tbody>
</table>
