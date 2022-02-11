//Проверка формы
let inputReq = document.querySelectorAll(".form-block__input[required]");
let btnSubmit = document.querySelector(".form-footer__main-button");
let error = "form-block__input--error";


btnSubmit.addEventListener("click", function (event) {
  for (let i = 0; i < inputReq.length; i++) {
    if (inputReq[i].value == "") {
      inputReq[i].classList.add(error);
    } else {
      inputReq[i].classList.remove(error);
    }
  }
});
