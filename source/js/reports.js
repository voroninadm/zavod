const tableBody = document.querySelector('.table-sort__body');
const filters = document.querySelector('.filters');
const rowData = tableBody.querySelectorAll('.row-data');
const hidingClass = 'visually-hidden';

rowData.forEach((row) => row.classList.add(hidingClass));

filters.addEventListener('change', (evt) => {
  const target = evt.target.name;
  let rows = tableBody.querySelectorAll(`.row-data--${target}`);
  rows.forEach(element => element.classList.toggle(hidingClass))
});

