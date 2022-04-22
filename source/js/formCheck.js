const mainInputForm = document.querySelector('.form-block__form');
const inputReq = mainInputForm.querySelectorAll(".form-block__input[required]");
const btnSubmit = mainInputForm.querySelector(".form-footer__main-button");
const errorClass = "form-block__input--error";

const firstMaterialWidth = mainInputForm.querySelector('[name="width1"]');
const workoutLength = mainInputForm.querySelector('[name="workout_length"]');
const workoutM2 = mainInputForm.querySelector('[name="workout_m2"]');

//validate required inputs on submit button click
btnSubmit.addEventListener('click', () => {
  for (let i = 0; i < inputReq.length; i++) {
    if (inputReq[i].value == "") {
      inputReq[i].classList.add(errorClass);
    } else {
      inputReq[i].classList.remove(errorClass);
    }
  };
})

//on width change -> change m2
let materialWidth = 0;
firstMaterialWidth.addEventListener('input', () => {
  materialWidth = firstMaterialWidth.value;
  workoutM2.value = (materialWidth * materialLength / 1000).toFixed(2);
});

//on length change -> change m2
let materialLength = 0;
workoutLength.addEventListener('input', () => {
  materialLength = workoutLength.value;
  workoutM2.value = (materialWidth * materialLength / 1000).toFixed(2);
});
