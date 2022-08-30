<script src="/js/JQuery.min.js"></script>
<script src="/js/tablesorter.min.js"></script>

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
  <caption class="table-sort__caption">Отчет по выработке печати c <?= $date_start ?> по <?= $date_finish ?> </caption>
  <thead class="table-sort__head">
  <tr class="table-sort__row">
    <th class="table-sort__header" rowspan="2">Дата смены</th>
    <th class="table-sort__header" rowspan="2">№ смены</th>
    <th class="table-sort__header" colspan="3">Работники смены</th>
    <th class="table-sort__header" rowspan="2">Номер ТКН</th>
    <th class="table-sort__header" rowspan="2">Материал</th>
    <th class="table-sort__header" rowspan="2">Краски</th>
    <th class="table-sort__header" colspan="2">Размеры</th>
    <th class="table-sort__header" colspan="3">Выработка</th>
    <th class="table-sort__header" rowspan="2">Приправка, ч</th>
    <th class="table-sort__header" rowspan="2">Тех.операции, ч</th>
    <th class="table-sort__header" rowspan="2">Примечания</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">
    <th class="table-sort__header">Оператор1</th>
    <th class="table-sort__header">Оператор2</th>
    <th class="table-sort__header">Оператор3</th>
    <th class="table-sort__header">ширина</th>
    <th class="table-sort__header">толщина</th>
    <th class="table-sort__header">кг</th>
    <th class="table-sort__header">м2</th>
    <th class="table-sort__header">пог.м</th>
  </tr>
  </thead>
  <tbody class="table-sort__body">
  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--miraflex1" colspan="15"><b>Мирафлекс1</b></td>
  </tr>
  <?php foreach ($miraflex1 as $row) : ?>
    <tr class="table-sort__row row-data row-data--miraflex1">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['prepare_hours'] ?></td>
      <td><?= get_titles_sum($row, $tech_print) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--miraflex2" colspan="15"><b>Мирафлекс2</b></td>
  </tr>
  <?php foreach ($miraflex2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--miraflex2">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['prepare_hours'] ?></td>
      <td><?= get_titles_sum($row, $tech_print) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--lemo" colspan="15"><b>LEMO</b></td>
  </tr>
  <?php foreach ($lemo as $row) : ?>
    <tr class="table-sort__row row-data row-data--lemo">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['prepare_hours'] ?></td>
      <td><?= get_titles_sum($row, $tech_print) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher4" colspan="15"><b>Fisher & Krecke 4</b></td>
  </tr>
  <?php foreach ($fisher4 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher4">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['prepare_hours'] ?></td>
      <td><?= get_titles_sum($row, $tech_print) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher5" colspan="15"><b>Fisher & Krecke 5</b></td>
  </tr>
  <?php foreach ($fisher5 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher5">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['prepare_hours'] ?></td>
      <td><?= get_titles_sum($row, $tech_print) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--fisher6" colspan="15"><b>Fisher & Krecke 6</b></td>
  </tr>
  <?php foreach ($fisher6 as $row) : ?>
    <tr class="table-sort__row row-data row-data--fisher6">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['prepare_hours'] ?></td>
      <td><?= get_titles_sum($row, $tech_print) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
