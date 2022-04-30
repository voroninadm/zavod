const mainInputForm = document.querySelector('.simple-form');

mainInputForm.addEventListener('submit', (evt) => {
  evt.preventDefault();
  const data = new URLSearchParams();
  for (const param of new FormData(mainInputForm)) {
    data.append(param[0], param[1]);
  }
  fetch('../../php/create_master.php', {
    method: 'POST',
    body: data
  })
    .then((response) => response.text())
    .then((response) => {
      document.querySelector('.alert').innerHTML = response;
    })
    .catch((error) => console.log(error));
  mainInputForm.reset();
});
