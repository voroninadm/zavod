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
    <input class="filters__input visually-hidden" type="checkbox" name="laminator1" id="laminator1">
  </fieldset>
  <button type="submit" hidden>Сформировать отчет</button>
  <button type="reset" hidden>Сбросить значения</button>
</form>

<table class="table-sort">
  <caption class="table-sort__caption">Отчет по выработке печати c <?= $date_start ?> по <?= $date_finish ?> </caption>
  <thead class="table-sort__head">
  <tr class="table-sort__row">
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Дата смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">№ смены</th>
    <th class="table-sort__header" colspan="4">Работники смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Номер ТКН</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Материал</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Краски</th>
    <th class="table-sort__header" colspan="2">Размеры</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Выработка</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Приправка</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Тех.операции</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Примечания</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">
    <th class="table-sort__header table-sort__header--sorted">Оператор1</th>
    <th class="table-sort__header table-sort__header--sorted">Оператор2</th>
    <th class="table-sort__header table-sort__header--sorted">Оператор3</th>
    <th class="table-sort__header table-sort__header--sorted">Помощник</th>
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
  </tr>
  </thead>
  <tbody class="table-sort__body">
  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--miraflex1" colspan="15"><b>Мирафлекс1</b></td>
  </tr>
  <?php foreach ($mfx1 as $row) : ?>
    <tr class="table-sort__row row-data row-data--miraflex1">
      <td><?= $row['work_date'] ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator1'] ?></td>
      <td><?= $row['operator2'] ?></td>
      <td><?= $row['operator3'] ?></td>
      <td><?= $row['operator_helper'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['colors'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['workout_mass'] . ' кг' ?></td>
      <td><?= $row['prepare_hours'] . ' ч' ?></td>
      <td><?= get_titles_sum($row, $tech_print) . ' ч' ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
