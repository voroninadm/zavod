
const form = document.querySelector('.simple-form');
const url = form.getAttribute('action');

const showAlert = (message) => {
  const DELAY = 2000;
  const alertContainer = document.createElement('div');
  alertContainer.style.zIndex = 1000;
  alertContainer.style.position = 'absolute';
  alertContainer.style.left = '50%';
  alertContainer.style.transform = 'translateX(-50%)';
  alertContainer.style.top = '300px';
  alertContainer.style.right = 0;
  alertContainer.style.padding = '20px 30px';
  alertContainer.style.fontSize = '30px';
  alertContainer.style.textAlign = 'center';
  alertContainer.style.backgroundColor = '#035d7b7b';
  alertContainer.style.borderRadius = '6px';
  alertContainer.style.color = 'white';
  alertContainer.textContent = message;

  document.body.appendChild(alertContainer);
  setTimeout(() => document.body.removeChild(alertContainer), DELAY);
};

function sendToPHP (evt) {
  evt.preventDefault();
  const data = new URLSearchParams();
  for (const param of new FormData(evt.target)) {
    data.append(param[0], param[1]);
  }
  fetch(url, {
    method: 'POST',
    body: data
  })
    .then((response) => response.text())
    .then((response) => {
      showAlert(response);
    })
    .catch((error) => console.log(error));
  form.reset();
}

form.addEventListener('submit', sendToPHP);
