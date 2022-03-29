const tableBody = document.querySelector('.table-sort__body');
const filters = document.querySelector('.filters');
const hidingClass = 'visually-hidden';


filters.addEventListener('change', (evt) => {
  const target = evt.target.name;
  tableBody.querySelector(`.row-data--${target}`).classList.toggle(hidingClass);
});
