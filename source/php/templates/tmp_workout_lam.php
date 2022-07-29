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
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Дата смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">№ смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Машинист</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Номер ТКН</th>
    <th class="table-sort__header" colspan="3">Материал 1</th>
    <th class="table-sort__header" colspan="3">Материал 2</th>
    <th class="table-sort__header" colspan="3">Материал дуплекс</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Выработка, м<sup>2</sup></th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Приправка, ч</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Тех.операции, ч</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Примечания</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">
    <th class="table-sort__header table-sort__header--sorted">тип</th>
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
    <th class="table-sort__header table-sort__header--sorted">тип</th>
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
    <th class="table-sort__header table-sort__header--sorted">тип</th>
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
  </tr>
  </thead>
  <tbody class="table-sort__body">
  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator1" colspan="17"><b>Ламинатор 1</b></td>
  </tr>
  <?php foreach ($laminator1 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator1">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['material2'] ?></td>
      <td><?= $row['width2'] ?></td>
      <td><?= $row['thickness2'] ?></td>
      <td><?= $row['material3'] ?></td>
      <td><?= $row['width3'] ?></td>
      <td><?= $row['thickness3'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= get_titles_sum($row, $prepare)  ?></td>
      <td><?= get_titles_sum($row, $tech_lam) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator2" colspan="17"><b>Ламинатор 2</b></td>
  </tr>
  <?php foreach ($laminator2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator2">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['material2'] ?></td>
      <td><?= $row['width2'] ?></td>
      <td><?= $row['thickness2'] ?></td>
      <td><?= $row['material3'] ?></td>
      <td><?= $row['width3'] ?></td>
      <td><?= $row['thickness3'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= get_titles_sum($row, $prepare)  ?></td>
      <td><?= get_titles_sum($row, $tech_lam) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator3" colspan="17"><b>Ламинатор 3</b></td>
  </tr>
  <?php foreach ($laminator3 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator3">
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['material2'] ?></td>
      <td><?= $row['width2'] ?></td>
      <td><?= $row['thickness2'] ?></td>
      <td><?= $row['material3'] ?></td>
      <td><?= $row['width3'] ?></td>
      <td><?= $row['thickness3'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= get_titles_sum($row, $prepare)  ?></td>
      <td><?= get_titles_sum($row, $tech_lam) ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
