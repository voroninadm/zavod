<?php require_once 'report_functions.php' ?>

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
    <th class="table-sort__header table-sort__header--sorted" rowspan="2"></th>
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
      <td>
        <a href="/update.phtml?id=<?= $row['id'] ?>&machine=laminator1&type=lamination" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=laminator1" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <td><?= $row['id'] ?></td>
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['master'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['operator_student'] != 0 ? $row['operator_student'] : '' ?></td>
      <td><?= $row['operator_helper'] != 0 ? $row['operator_helper'] : '' ?></td>
      <td><?= $row['tkn'] != 0 ? $row['tkn'] : '' ?></td>
      <td><?= $row['work_plan'] != 0 ? $row['work_plan'] : '' ?></td>
      <td><?= date_format(date_create($row['work_start']), 'H:i') ?></td>
      <td><?= date_format(date_create($row['work_finish']), 'H:i') ?></td>
      <td><?= $row['work_fact'] != 0 ? $row['work_fact'] : '' ?></td>
      <td><?= $row['customer'] != 0 ? $row['customer'] : '' ?></td>
      <td><?= $row['print_title'] != 0 ? $row['print_title'] : '' ?></td>
      <td><?= $row['circulation'] != 0 ? $row['circulation'] : '' ?></td>
      <td><?= $row['material1'] != 0 ? $row['material1'] : '' ?></td>
      <td><?= $row['width1'] != 0 ? $row['width1'] : '' ?></td>
      <td><?= $row['thickness1'] != 0 ? $row['thickness1'] : '' ?></td>
      <td><?= $row['mat1count_plan'] != 0 ? $row['mat1count_plan'] : '' ?></td>
      <td><?= $row['mat1count'] != 0 ? $row['mat1count'] : '' ?></td>
      <td><?= $row['material2'] != 0 ? $row['material2'] : '' ?></td>
      <td><?= $row['width2'] != 0 ? $row['width2'] : '' ?></td>
      <td><?= $row['thickness2'] != 0 ? $row['thickness2'] : '' ?></td>
      <td><?= $row['mat2count_plan'] != 0 ? $row['mat2count_plan'] : '' ?></td>
      <td><?= $row['mat2count'] != 0 ? $row['mat2count'] : '' ?></td>
      <td><?= $row['material3'] != 0 ? $row['material3'] : '' ?></td>
      <td><?= $row['width3'] != 0 ? $row['width3'] : '' ?></td>
      <td><?= $row['thickness3'] != 0 ? $row['thickness3'] : '' ?></td>
      <td><?= $row['mat3count_plan'] != 0 ? $row['mat3count_plan'] : '' ?></td>
      <td><?= $row['mat3count'] != 0 ? $row['mat3count'] : '' ?></td>
      <td><?= $row['workout_mass'] != 0 ? $row['workout_mass'] : '' ?></td>
      <td><?= $row['workout_length'] != 0 ? $row['workout_length'] : '' ?></td>
      <td><?= $row['workout_m2'] != 0 ? $row['workout_m2'] : '' ?></td>
      <td><?= $row['otk_mass'] != 0 ? $row['otk_mass'] : '' ?></td>
      <td><?= $row['waste_plan'] != 0 ? $row['waste_plan'] : '' ?></td>
      <td><?= $row['waste_print'] != 0 ? $row['waste_print'] : '' ?></td>
      <td><?= $row['waste_lam'] != 0 ? $row['waste_lam'] : '' ?></td>
      <td><?= $row['waste_sum'] != 0 ? $row['waste_sum'] : '' ?></td>
      <td><?= $row['prepare'] != 0 ? $row['prepare'] : '' ?></td>
      <td><?= $row['prepare_shirt'] != 0 ? $row['prepare_shirt'] : '' ?></td>
      <td><?= $row['electro'] != 0 ? $row['electro'] : '' ?></td>
      <td><?= $row['mechanical'] != 0 ? $row['mechanical'] : '' ?></td>
      <td><?= $row['flushing'] != 0 ? $row['flushing'] : '' ?></td>
      <td><?= $row['tech_clean'] != 0 ? $row['tech_clean'] : '' ?></td>
      <td><?= $row['change_glue'] != 0 ? $row['change_glue'] : '' ?></td>
      <td><?= $row['calibrating'] != 0 ? $row['calibrating'] : '' ?></td>
      <td><?= $row['tech_service'] != 0 ? $row['tech_service'] : '' ?></td>
      <td><?= $row['no_human'] != 0 ? $row['no_human'] : '' ?></td>
      <td><?= $row['no_work'] != 0 ? $row['no_work'] : '' ?></td>
      <td><?= $row['no_raw'] != 0 ? $row['no_raw'] : '' ?></td>
      <td><?= $row['remain_perv'] != 0 ? $row['remain_perv'] : '' ?></td>
      <td><?= $row['remain_sec'] != 0 ? $row['remain_sec'] : '' ?></td>
      <td><?= $row['diff_circulation'] != 0 ? $row['diff_circulation'] : '' ?></td>
      <td><?= $row['prepare_ok'] ?></td>
      <td><?= $row['notes'] != 0 ? $row['notes'] : '' ?></td>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--laminator1">
    <?= setAllLam($laminator1) ?>
  </tr>

  <tr>
    <td class="table-sort__row row-data row-data--laminator2" colspan="15"><b>Ламинатор 2</b></td>
  </tr>
  <?php foreach ($laminator2 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator2">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=laminator2" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <td><?= $row['id'] ?></td>
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['master'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['operator_student'] != 0 ? $row['operator_student'] : '' ?></td>
      <td><?= $row['operator_helper'] != 0 ? $row['operator_helper'] : '' ?></td>
      <td><?= $row['tkn'] != 0 ? $row['tkn'] : '' ?></td>
      <td><?= $row['work_plan'] != 0 ? $row['work_plan'] : '' ?></td>
      <td><?= date_format(date_create($row['work_start']), 'H:i') ?></td>
      <td><?= date_format(date_create($row['work_finish']), 'H:i') ?></td>
      <td><?= $row['work_fact'] != 0 ? $row['work_fact'] : '' ?></td>
      <td><?= $row['customer'] != 0 ? $row['customer'] : '' ?></td>
      <td><?= $row['print_title'] != 0 ? $row['print_title'] : '' ?></td>
      <td><?= $row['circulation'] != 0 ? $row['circulation'] : '' ?></td>
      <td><?= $row['material1'] != 0 ? $row['material1'] : '' ?></td>
      <td><?= $row['width1'] != 0 ? $row['width1'] : '' ?></td>
      <td><?= $row['thickness1'] != 0 ? $row['thickness1'] : '' ?></td>
      <td><?= $row['mat1count_plan'] != 0 ? $row['mat1count_plan'] : '' ?></td>
      <td><?= $row['mat1count'] != 0 ? $row['mat1count'] : '' ?></td>
      <td><?= $row['material2'] != 0 ? $row['material2'] : '' ?></td>
      <td><?= $row['width2'] != 0 ? $row['width2'] : '' ?></td>
      <td><?= $row['thickness2'] != 0 ? $row['thickness2'] : '' ?></td>
      <td><?= $row['mat2count_plan'] != 0 ? $row['mat2count_plan'] : '' ?></td>
      <td><?= $row['mat2count'] != 0 ? $row['mat2count'] : '' ?></td>
      <td><?= $row['material3'] != 0 ? $row['material3'] : '' ?></td>
      <td><?= $row['width3'] != 0 ? $row['width3'] : '' ?></td>
      <td><?= $row['thickness3'] != 0 ? $row['thickness3'] : '' ?></td>
      <td><?= $row['mat3count_plan'] != 0 ? $row['mat3count_plan'] : '' ?></td>
      <td><?= $row['mat3count'] != 0 ? $row['mat3count'] : '' ?></td>
      <td><?= $row['workout_mass'] != 0 ? $row['workout_mass'] : '' ?></td>
      <td><?= $row['workout_length'] != 0 ? $row['workout_length'] : '' ?></td>
      <td><?= $row['workout_m2'] != 0 ? $row['workout_m2'] : '' ?></td>
      <td><?= $row['otk_mass'] != 0 ? $row['otk_mass'] : '' ?></td>
      <td><?= $row['waste_plan'] != 0 ? $row['waste_plan'] : '' ?></td>
      <td><?= $row['waste_print'] != 0 ? $row['waste_print'] : '' ?></td>
      <td><?= $row['waste_lam'] != 0 ? $row['waste_lam'] : '' ?></td>
      <td><?= $row['waste_sum'] != 0 ? $row['waste_sum'] : '' ?></td>
      <td><?= $row['prepare'] != 0 ? $row['prepare'] : '' ?></td>
      <td><?= $row['prepare_shirt'] != 0 ? $row['prepare_shirt'] : '' ?></td>
      <td><?= $row['electro'] != 0 ? $row['electro'] : '' ?></td>
      <td><?= $row['mechanical'] != 0 ? $row['mechanical'] : '' ?></td>
      <td><?= $row['flushing'] != 0 ? $row['flushing'] : '' ?></td>
      <td><?= $row['tech_clean'] != 0 ? $row['tech_clean'] : '' ?></td>
      <td><?= $row['change_glue'] != 0 ? $row['change_glue'] : '' ?></td>
      <td><?= $row['calibrating'] != 0 ? $row['calibrating'] : '' ?></td>
      <td><?= $row['tech_service'] != 0 ? $row['tech_service'] : '' ?></td>
      <td><?= $row['no_human'] != 0 ? $row['no_human'] : '' ?></td>
      <td><?= $row['no_work'] != 0 ? $row['no_work'] : '' ?></td>
      <td><?= $row['no_raw'] != 0 ? $row['no_raw'] : '' ?></td>
      <td><?= $row['remain_perv'] != 0 ? $row['remain_perv'] : '' ?></td>
      <td><?= $row['remain_sec'] != 0 ? $row['remain_sec'] : '' ?></td>
      <td><?= $row['diff_circulation'] != 0 ? $row['diff_circulation'] : '' ?></td>
      <td><?= $row['prepare_ok'] ?></td>
      <td><?= $row['notes'] != 0 ? $row['notes'] : '' ?></td>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--laminator2">
    <?= setAllLam($laminator2) ?>
  </tr>

  <tr class="table-sort__row">
    <td class="table-sort__row row-data row-data--laminator3" colspan="15"><b>Ламинатор 3</b></td>
  </tr>
  <?php foreach ($laminator3 as $row) : ?>
    <tr class="table-sort__row row-data row-data--laminator3">
      <td>
        <a href="/user/update?id=<?= $row['id'] ?>&machine=miraflex1&type=print" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg></a>
        <a href="/php/delete.php?id=<?= $row['id'] ?>&machine=laminator3" title="Удалить" aria-label="Удалить" data-pjax="0" data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg></a>
      </td>
      <td><?= $row['id'] ?></td>
      <td><?= date_format(date_create($row['work_date']), 'd.m.Y') ?></td>
      <td><?= $row['work_shift'] ?></td>
      <td><?= $row['master'] ?></td>
      <td><?= $row['operator'] ?></td>
      <td><?= $row['operator_student'] != 0 ? $row['operator_student'] : '' ?></td>
      <td><?= $row['operator_helper'] != 0 ? $row['operator_helper'] : '' ?></td>
      <td><?= $row['tkn'] != 0 ? $row['tkn'] : '' ?></td>
      <td><?= $row['work_plan'] != 0 ? $row['work_plan'] : '' ?></td>
      <td><?= date_format(date_create($row['work_start']), 'H:i') ?></td>
      <td><?= date_format(date_create($row['work_finish']), 'H:i') ?></td>
      <td><?= $row['work_fact'] != 0 ? $row['work_fact'] : '' ?></td>
      <td><?= $row['customer'] != 0 ? $row['customer'] : '' ?></td>
      <td><?= $row['print_title'] != 0 ? $row['print_title'] : '' ?></td>
      <td><?= $row['circulation'] != 0 ? $row['circulation'] : '' ?></td>
      <td><?= $row['material1'] != 0 ? $row['material1'] : '' ?></td>
      <td><?= $row['width1'] != 0 ? $row['width1'] : '' ?></td>
      <td><?= $row['thickness1'] != 0 ? $row['thickness1'] : '' ?></td>
      <td><?= $row['mat1count_plan'] != 0 ? $row['mat1count_plan'] : '' ?></td>
      <td><?= $row['mat1count'] != 0 ? $row['mat1count'] : '' ?></td>
      <td><?= $row['material2'] != 0 ? $row['material2'] : '' ?></td>
      <td><?= $row['width2'] != 0 ? $row['width2'] : '' ?></td>
      <td><?= $row['thickness2'] != 0 ? $row['thickness2'] : '' ?></td>
      <td><?= $row['mat2count_plan'] != 0 ? $row['mat2count_plan'] : '' ?></td>
      <td><?= $row['mat2count'] != 0 ? $row['mat2count'] : '' ?></td>
      <td><?= $row['material3'] != 0 ? $row['material3'] : '' ?></td>
      <td><?= $row['width3'] != 0 ? $row['width3'] : '' ?></td>
      <td><?= $row['thickness3'] != 0 ? $row['thickness3'] : '' ?></td>
      <td><?= $row['mat3count_plan'] != 0 ? $row['mat3count_plan'] : '' ?></td>
      <td><?= $row['mat3count'] != 0 ? $row['mat3count'] : '' ?></td>
      <td><?= $row['workout_mass'] != 0 ? $row['workout_mass'] : '' ?></td>
      <td><?= $row['workout_length'] != 0 ? $row['workout_length'] : '' ?></td>
      <td><?= $row['workout_m2'] != 0 ? $row['workout_m2'] : '' ?></td>
      <td><?= $row['otk_mass'] != 0 ? $row['otk_mass'] : '' ?></td>
      <td><?= $row['waste_plan'] != 0 ? $row['waste_plan'] : '' ?></td>
      <td><?= $row['waste_print'] != 0 ? $row['waste_print'] : '' ?></td>
      <td><?= $row['waste_lam'] != 0 ? $row['waste_lam'] : '' ?></td>
      <td><?= $row['waste_sum'] != 0 ? $row['waste_sum'] : '' ?></td>
      <td><?= $row['prepare'] != 0 ? $row['prepare'] : '' ?></td>
      <td><?= $row['prepare_shirt'] != 0 ? $row['prepare_shirt'] : '' ?></td>
      <td><?= $row['electro'] != 0 ? $row['electro'] : '' ?></td>
      <td><?= $row['mechanical'] != 0 ? $row['mechanical'] : '' ?></td>
      <td><?= $row['flushing'] != 0 ? $row['flushing'] : '' ?></td>
      <td><?= $row['tech_clean'] != 0 ? $row['tech_clean'] : '' ?></td>
      <td><?= $row['change_glue'] != 0 ? $row['change_glue'] : '' ?></td>
      <td><?= $row['calibrating'] != 0 ? $row['calibrating'] : '' ?></td>
      <td><?= $row['tech_service'] != 0 ? $row['tech_service'] : '' ?></td>
      <td><?= $row['no_human'] != 0 ? $row['no_human'] : '' ?></td>
      <td><?= $row['no_work'] != 0 ? $row['no_work'] : '' ?></td>
      <td><?= $row['no_raw'] != 0 ? $row['no_raw'] : '' ?></td>
      <td><?= $row['remain_perv'] != 0 ? $row['remain_perv'] : '' ?></td>
      <td><?= $row['remain_sec'] != 0 ? $row['remain_sec'] : '' ?></td>
      <td><?= $row['diff_circulation'] != 0 ? $row['diff_circulation'] : '' ?></td>
      <td><?= $row['prepare_ok'] ?></td>
      <td><?= $row['notes'] != 0 ? $row['notes'] : '' ?></td>
    </tr>
  <?php endforeach; ?>
  <tr class="table-sort__row table-sort__row--last row-data row-data--laminator3">
    <?= setAllLam($laminator3) ?>
  </tr>


  </tbody>
</table>
