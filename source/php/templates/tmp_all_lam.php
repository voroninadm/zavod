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
  <caption class="table-sort__caption">Все работы по печати c <?= $date_start ?> по <?= $date_finish ?> </caption>
  <thead class="table-sort__head">
  <tr class="table-sort__row">
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">№</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Дата смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">№ смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Мастер смены</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Оператор</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Ученик оператора</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Подсобный рабочий</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Номер ТКН</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Планируемое время работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Начало&nbsp;работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Окончание&nbsp;работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Фактическое время работ</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Заказчик</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Наименование заказа</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Тираж заказа</th>
    <th class="table-sort__header" colspan="15">Материалы</th>
    <th class="table-sort__header no-sort" colspan="4">Выработка</th>
    <th class="table-sort__header no-sort" colspan="4">Отходы</th>
    <th class="table-sort__header" colspan="2">Приправка</th>
    <th class="table-sort__header" colspan="7">Технические операции, ч</th>
    <th class="table-sort__header" colspan="3">Часы отсутствия</th>
    <th class="table-sort__header" colspan="2">Остаток</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Разница тиража</th>
    <th class="table-sort__header table-sort__header--sorted" rowspan="2">Принята приправка</th>
    <th class="table-sort__header" rowspan="2">Примечание</th>
  </tr>
  <tr class="table-sort__row table-sort__row--small">
    <th class="table-sort__header table-sort__header--sorted">материал1</th>
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
    <th class="table-sort__header table-sort__header--sorted">план</th>
    <th class="table-sort__header table-sort__header--sorted">факт</th>
    <th class="table-sort__header table-sort__header--sorted">материал2</th>
    <th class="table-sort__header table-sort__header--sorted">ширина</th>
    <th class="table-sort__header table-sort__header--sorted">толщина</th>
    <th class="table-sort__header table-sort__header--sorted">план</th>
    <th class="table-sort__header table-sort__header--sorted">факт</th>
    <th class="table-sort__header table-sort__header--sorted">материал3</th>
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
    <th class="table-sort__header table-sort__header--sorted">ламинация</th>
    <th class="table-sort__header table-sort__header--sorted">итого</th>

    <th class="table-sort__header table-sort__header--sorted">обычная</th>
    <th class="table-sort__header table-sort__header--sorted">с заменой рубашки</th>

    <th class="table-sort__header table-sort__header--sorted">электрика</th>
    <th class="table-sort__header table-sort__header--sorted">механика</th>
    <th class="table-sort__header table-sort__header--sorted">промывка</th>
    <th class="table-sort__header table-sort__header--sorted">техчистка</th>
    <th class="table-sort__header table-sort__header--sorted">замена клея</th>
    <th class="table-sort__header table-sort__header--sorted">калибровка</th>
    <th class="table-sort__header table-sort__header--sorted">техобслуживание</th>
    <th class="table-sort__header table-sort__header--sorted">людей</th>
    <th class="table-sort__header table-sort__header--sorted">заказов</th>
    <th class="table-sort__header table-sort__header--sorted">сырья</th>

    <th class="table-sort__header table-sort__header--sorted">первички</th>
    <th class="table-sort__header table-sort__header--sorted">вторички</th>

  </tr>
  <tr class="table-sort__row table-sort__row--small">

  </thead>

  <tbody class="table-sort__body">
  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator1" colspan="15"><b>Ламинатор 1</b></td>
  </tr>
  <?php foreach ($laminator1 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator1">
        <td><?= $row['id'] ?></td>
        <td><?= $row['work_date'] ?></td>
        <td><?= $row['work_shift'] ?></td>
        <td><?= $row['master'] ?></td>
        <td><?= $row['operator'] ?></td>
        <td><?= $row['operator_student'] ?></td>
        <td><?= $row['operator_helper'] ?></td>
        <td><?= $row['tkn'] ?></td>
        <td><?= $row['work_plan'] ?></td>
        <td><?= $row['work_start'] ?></td>
        <td><?= $row['work_finish'] ?></td>
        <td><?= $row['work_fact'] ?></td>
        <td><?= $row['customer'] ?></td>
        <td><?= $row['print_title'] ?></td>
        <td><?= $row['circulation'] ?></td>
        <td><?= $row['material1'] ?></td>
        <td><?= $row['width1'] ?></td>
        <td><?= $row['thickness1'] ?></td>
        <td><?= $row['mat1count_plan'] ?></td>
        <td><?= $row['mat1count'] ?></td>
        <td><?= $row['material2'] ?></td>
        <td><?= $row['width2'] ?></td>
        <td><?= $row['thickness2'] ?></td>
        <td><?= $row['mat2count_plan'] ?></td>
        <td><?= $row['mat2count'] ?></td>
        <td><?= $row['material3'] ?></td>
        <td><?= $row['width3'] ?></td>
        <td><?= $row['thickness3'] ?></td>
        <td><?= $row['mat3count_plan'] ?></td>
        <td><?= $row['mat3count'] ?></td>
        <td><?= $row['workout_mass'] ?></td>
        <td><?= $row['workout_length'] ?></td>
        <td><?= $row['workout_m2'] ?></td>
        <td><?= $row['otk_mass'] ?></td>
        <td><?= $row['waste_plan'] ?></td>
        <td><?= $row['waste_print'] ?></td>
        <td><?= $row['waste_lam'] ?></td>
        <td><?= $row['waste_sum'] ?></td>
        <td><?= $row['prepare'] ?></td>
        <td><?= $row['prepare_shirt'] ?></td>
        <td><?= $row['electro'] ?></td>
        <td><?= $row['mechanical'] ?></td>
        <td><?= $row['flushing'] ?></td>
        <td><?= $row['tech_clean'] ?></td>
        <td><?= $row['change_glue'] ?></td>
        <td><?= $row['calibrating'] ?></td>
        <td><?= $row['tech_service'] ?></td>
        <td><?= $row['no_human'] ?></td>
        <td><?= $row['no_work'] ?></td>
        <td><?= $row['no_raw'] ?></td>
        <td><?= $row['remain_perv'] ?></td>
        <td><?= $row['remain_sec'] ?></td>
        <td><?= $row['diff_circulation'] ?></td>
        <td><?= $row['prepare_ok'] ?></td>
        <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?><tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator2" colspan="15"><b>Ламинатор 2</b></td>
  </tr>
  <?php foreach ($laminator2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator2">
      <td><?= $row['id'] ?></td>
      <td><?= $row['work_date'] ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['master'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['operator_student'] ?></td>
      <td><?= $row['operator_helper'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['work_plan'] ?></td>
      <td><?= $row['work_start'] ?></td>
      <td><?= $row['work_finish'] ?></td>
      <td><?= $row['work_fact'] ?></td>
      <td><?= $row['customer'] ?></td>
      <td><?= $row['print_title'] ?></td>
      <td><?= $row['circulation'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['mat1count_plan'] ?></td>
      <td><?= $row['mat1count'] ?></td>
      <td><?= $row['material2'] ?></td>
      <td><?= $row['width2'] ?></td>
      <td><?= $row['thickness2'] ?></td>
      <td><?= $row['mat2count_plan'] ?></td>
      <td><?= $row['mat2count'] ?></td>
      <td><?= $row['material3'] ?></td>
      <td><?= $row['width3'] ?></td>
      <td><?= $row['thickness3'] ?></td>
      <td><?= $row['mat3count_plan'] ?></td>
      <td><?= $row['mat3count'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['otk_mass'] ?></td>
      <td><?= $row['waste_plan'] ?></td>
      <td><?= $row['waste_print'] ?></td>
      <td><?= $row['waste_lam'] ?></td>
      <td><?= $row['waste_sum'] ?></td>
      <td><?= $row['prepare'] ?></td>
      <td><?= $row['prepare_shirt'] ?></td>
      <td><?= $row['electro'] ?></td>
      <td><?= $row['mechanical'] ?></td>
      <td><?= $row['flushing'] ?></td>
      <td><?= $row['tech_clean'] ?></td>
      <td><?= $row['change_glue'] ?></td>
      <td><?= $row['calibrating'] ?></td>
      <td><?= $row['tech_service'] ?></td>
      <td><?= $row['no_human'] ?></td>
      <td><?= $row['no_work'] ?></td>
      <td><?= $row['no_raw'] ?></td>
      <td><?= $row['remain_perv'] ?></td>
      <td><?= $row['remain_sec'] ?></td>
      <td><?= $row['diff_circulation'] ?></td>
      <td><?= $row['prepare_ok'] ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator3" colspan="15"><b>Ламинатор 3</b></td>
  </tr>
  <?php foreach ($laminator3 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator3">
      <td><?= $row['id'] ?></td>
      <td><?= $row['work_date'] ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['master'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['operator_student'] ?></td>
      <td><?= $row['operator_helper'] ?></td>
      <td><?= $row['tkn'] ?></td>
      <td><?= $row['work_plan'] ?></td>
      <td><?= $row['work_start'] ?></td>
      <td><?= $row['work_finish'] ?></td>
      <td><?= $row['work_fact'] ?></td>
      <td><?= $row['customer'] ?></td>
      <td><?= $row['print_title'] ?></td>
      <td><?= $row['circulation'] ?></td>
      <td><?= $row['material1'] ?></td>
      <td><?= $row['width1'] ?></td>
      <td><?= $row['thickness1'] ?></td>
      <td><?= $row['mat1count_plan'] ?></td>
      <td><?= $row['mat1count'] ?></td>
      <td><?= $row['material2'] ?></td>
      <td><?= $row['width2'] ?></td>
      <td><?= $row['thickness2'] ?></td>
      <td><?= $row['mat2count_plan'] ?></td>
      <td><?= $row['mat2count'] ?></td>
      <td><?= $row['material3'] ?></td>
      <td><?= $row['width3'] ?></td>
      <td><?= $row['thickness3'] ?></td>
      <td><?= $row['mat3count_plan'] ?></td>
      <td><?= $row['mat3count'] ?></td>
      <td><?= $row['workout_mass'] ?></td>
      <td><?= $row['workout_length'] ?></td>
      <td><?= $row['workout_m2'] ?></td>
      <td><?= $row['otk_mass'] ?></td>
      <td><?= $row['waste_plan'] ?></td>
      <td><?= $row['waste_print'] ?></td>
      <td><?= $row['waste_lam'] ?></td>
      <td><?= $row['waste_sum'] ?></td>
      <td><?= $row['prepare'] ?></td>
      <td><?= $row['prepare_shirt'] ?></td>
      <td><?= $row['electro'] ?></td>
      <td><?= $row['mechanical'] ?></td>
      <td><?= $row['flushing'] ?></td>
      <td><?= $row['tech_clean'] ?></td>
      <td><?= $row['change_glue'] ?></td>
      <td><?= $row['calibrating'] ?></td>
      <td><?= $row['tech_service'] ?></td>
      <td><?= $row['no_human'] ?></td>
      <td><?= $row['no_work'] ?></td>
      <td><?= $row['no_raw'] ?></td>
      <td><?= $row['remain_perv'] ?></td>
      <td><?= $row['remain_sec'] ?></td>
      <td><?= $row['diff_circulation'] ?></td>
      <td><?= $row['prepare_ok'] ?></td>
      <td><?= $row['notes'] ?></td>
    </tr>
  <?php endforeach; ?>


  </tbody>
</table>
