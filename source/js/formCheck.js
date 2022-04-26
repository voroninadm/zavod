'use strict'

const mainInputForm = document.querySelector('.form-block__form');
const inputReq = mainInputForm.querySelectorAll(".form-block__input[required]");
const btnSubmit = mainInputForm.querySelector(".form-footer__main-button");
const errorClass = "form-block__input--error";

const firstMaterialWidth = mainInputForm.querySelector('[name="width1"]');
const workoutLength = mainInputForm.querySelector('[name="workout_length"]');
const workoutM2 = mainInputForm.querySelector('[name="workout_m2"]');

const circulation = mainInputForm.querySelector('[name="circulation"]');
const workoutCirculation = mainInputForm.querySelector('[name="workout_mass"]');
const diffCirculation = mainInputForm.querySelector('[name="diff_circulation"]');
const PERCENTS = 5;


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

/**
 * listen and calculate material1 width and workout length
 * @return caclulated value to workout m2 input
 */
const calcM2OnChange = () => {
  let materialWidth = 0;
  let materialLength = 0;

  //on width change -> change m2
  firstMaterialWidth.addEventListener('input', () => {
    materialWidth = firstMaterialWidth.value;
    workoutM2.value = (materialWidth * materialLength / 1000).toFixed(2);
  });

  //on length change -> change m2
  workoutLength.addEventListener('input', () => {
    materialLength = workoutLength.value;
    workoutM2.value = (materialWidth * materialLength / 1000).toFixed(2);
  });
};

const calcDiffCirculation = () => {
  const percent = PERCENTS / 100; // 5 percents of plan circulation
  let planCirculation;
  let factCirculation;
  let delta;
  let diff;

  circulation.addEventListener('input', () => {
    planCirculation = circulation.value;
    delta = Math.abs(planCirculation * percent);
    diff = diffCirculation.value = Math.abs(planCirculation - factCirculation).toFixed(2);
    (diff >= delta) ? diffCirculation.style.backgroundColor = 'tomato' : diffCirculation.style.backgroundColor = 'inherit';
  })

  workoutCirculation.addEventListener('input', () => {
    factCirculation = workoutCirculation.value;
    diff = diffCirculation.value = Math.abs(planCirculation - factCirculation).toFixed(2);
    (diff >= delta) ? diffCirculation.style.backgroundColor = 'tomato' : diffCirculation.style.backgroundColor = 'inherit';
  })
}

//==call form functions
calcM2OnChange();
calcDiffCirculation();
