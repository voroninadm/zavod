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
  <caption class="table-sort__caption">Отчет простоя c <?= $date_start ?> по <?= $date_finish ?> </caption>

  <thead class="table-sort__head">
  <tr class="table-sort__row ">
    <th class="table-sort__header"></th>
    <th class="table-sort__header">Электрика</th>
    <th class="table-sort__header">Механика</th>
    <th class="table-sort__header">Техническое обслуживание</th>
    <th class="table-sort__header">Персонал</th>
    <th class="table-sort__header">Заказы</th>
    <th class="table-sort__header">Сырье</th>
    <th class="table-sort__header">ИТОГО</th>
  </tr>
  </thead>
  <tbody class="table-sort__body">

  <tr class="table-sort__row row-data row-data--miraflex1">
    <th class="table-sort__header">miraflex1</th>
    <td><?= $miraflex1['electro'] ?></td>
    <td><?= $miraflex1['mechanical'] ?></td>
    <td></td>
    <td><?= $miraflex1['no_human'] ?></td>
    <td><?= $miraflex1['no_work'] ?></td>
    <td><?= $miraflex1['no_raw'] ?></td>
    <td><?= $miraflex1['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--miraflex2">
    <th class="table-sort__header">miraflex2</th>
    <td><?= $miraflex2['electro'] ?></td>
    <td><?= $miraflex2['mechanical'] ?></td>
    <td></td>
    <td><?= $miraflex2['no_human'] ?></td>
    <td><?= $miraflex2['no_work'] ?></td>
    <td><?= $miraflex2['no_raw'] ?></td>
    <td><?= $miraflex2['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--lemo">
    <th class="table-sort__header">ЛЕМО</th>
    <td><?= $lemo['electro'] ?></td>
    <td><?= $lemo['mechanical'] ?></td>
    <td></td>
    <td><?= $lemo['no_human'] ?></td>
    <td><?= $lemo['no_work'] ?></td>
    <td><?= $lemo['no_raw'] ?></td>
    <td><?= $lemo['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--fisher4">
    <th class="table-sort__header">Fisher4</th>
    <td><?= $fisher4['electro'] ?></td>
    <td><?= $fisher4['mechanical'] ?></td>
    <td></td>
    <td><?= $fisher4['no_human'] ?></td>
    <td><?= $fisher4['no_work'] ?></td>
    <td><?= $fisher4['no_raw'] ?></td>
    <td><?= $fisher4['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--fisher5">
    <th class="table-sort__header">Fisher5</th>
    <td><?= $fisher5['electro'] ?></td>
    <td><?= $fisher5['mechanical'] ?></td>
    <td></td>
    <td><?= $fisher5['no_human'] ?></td>
    <td><?= $fisher5['no_work'] ?></td>
    <td><?= $fisher5['no_raw'] ?></td>
    <td><?= $fisher5['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--fisher6">
    <th class="table-sort__header">Fisher6</th>
    <td><?= $fisher6['electro'] ?></td>
    <td><?= $fisher6['mechanical'] ?></td>
    <td></td>
    <td><?= $fisher6['no_human'] ?></td>
    <td><?= $fisher6['no_work'] ?></td>
    <td><?= $fisher6['no_raw'] ?></td>
    <td><?= $fisher6['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--laminator1">
    <th class="table-sort__header">laminator1</th>
    <td><?= $laminator1['electro'] ?></td>
    <td><?= $laminator1['mechanical'] ?></td>
    <td><?= $laminator1['tech_service'] ?></td>
    <td><?= $laminator1['no_human'] ?></td>
    <td><?= $laminator1['no_work'] ?></td>
    <td><?= $laminator1['no_raw'] ?></td>
    <td><?= $laminator1['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--laminator2">
    <th class="table-sort__header">laminator2</th>
    <td><?= $laminator2['electro'] ?></td>
    <td><?= $laminator2['mechanical'] ?></td>
    <td><?= $laminator2['tech_service'] ?></td>
    <td><?= $laminator2['no_human'] ?></td>
    <td><?= $laminator2['no_work'] ?></td>
    <td><?= $laminator2['no_raw'] ?></td>
    <td><?= $laminator2['sum'] ?></td>
  </tr>
  <tr class="table-sort__row row-data row-data--laminator3">
    <th class="table-sort__header">laminator3</th>
    <td><?= $laminator3['electro'] ?></td>
    <td><?= $laminator3['mechanical'] ?></td>
    <td><?= $laminator3['tech_service'] ?></td>
    <td><?= $laminator3['no_human'] ?></td>
    <td><?= $laminator3['no_work'] ?></td>
    <td><?= $laminator3['no_raw'] ?></td>
    <td><?= $laminator3['sum'] ?></td>
  </tr>

  </tbody>

</table>
