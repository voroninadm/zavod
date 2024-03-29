const mainInputForm = document.querySelector('.form-block__form');
const inputReq = mainInputForm.querySelectorAll('.form-block__input[required]');
const btnSubmit = mainInputForm.querySelector('.form-footer__main-button');
const errorClass = 'form-block__input--error';

const firstMaterialWidth = mainInputForm.querySelector('[name="width1"]');
const workoutLength = mainInputForm.querySelector('[name="workout_length"]');
const workoutM2 = mainInputForm.querySelector('[name="workout_m2"]');

const circulation = mainInputForm.querySelector('[name="circulation"]');
const workoutCirculation = mainInputForm.querySelector('[name="workout_mass"]');
const diffCirculation = mainInputForm.querySelector('[name="diff_circulation"]');
const PERCENTS = 5;

const dateStart = mainInputForm.querySelector('[name="work_start"]');
const dateFinish = mainInputForm.querySelector('[name="work_finish"]');
const workFact = mainInputForm.querySelector('[name="work_fact"]');

//validate required inputs on submit button click
btnSubmit.addEventListener('click', () => {
  for (let i = 0; i < inputReq.length; i++) {
    if (inputReq[i].value === '') {
      inputReq[i].classList.add(errorClass);
    } else {
      inputReq[i].classList.remove(errorClass);
    }
  }
});

/**
 * listen and calculate material1 width and workout length
 * @return caclulated value to workout m2 input
 */
const calcM2OnChange = () => {
  let materialWidth;
  let materialLength;

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

/**
 * listen input of plan and fact circulation, calc diff and set error if diff > PERCENTS
 * @returns value of diff and set error background of input
 */
const calcDiffCirculation = () => {
  const percent = PERCENTS / 100; // 5 percents of plan circulation
  let planCirculation;
  let factCirculation;
  let delta;
  let diff;

  const calcDiff = (sub, value) => {
    if (value >= sub) {
      return (diffCirculation.style.backgroundColor = 'tomato');
    }
    return (diffCirculation.style.backgroundColor = 'inherit');
  };

  circulation.addEventListener('input', () => {
    planCirculation = circulation.value;
    delta = Math.abs(planCirculation * percent);
    diff = diffCirculation.value = Math.abs(planCirculation - factCirculation).toFixed(2);
    calcDiff(delta, diff);
  });

  workoutCirculation.addEventListener('input', () => {
    factCirculation = workoutCirculation.value;
    diff = diffCirculation.value = Math.abs(planCirculation - factCirculation).toFixed(2);
    calcDiff(delta, diff);
  });
};

const waste = {
  print: mainInputForm.querySelector('[name="waste_print"]'),
  raw: mainInputForm.querySelector('[name="waste_raw"]'),
  lam: mainInputForm.querySelector('[name="waste_lam"]'),
  sum: mainInputForm.querySelector('[name="waste_sum"]'),
  sumValueCalc() {
    if (this.raw) {
      this.print.addEventListener('input', () => {
        this.sum.value = Number(this.print.value) + Number(this.raw.value);
      });
      this.raw.addEventListener('input', () => {
        this.sum.value = Number(this.print.value) + Number(this.raw.value);
      });
    }
    if (this.lam) {
      this.print.addEventListener('input', () => {
        this.sum.value = Number(this.print.value) + Number(this.lam.value);
      });
      this.lam.addEventListener('input', () => {
        this.sum.value = Number(this.print.value) + Number(this.lam.value);
      });
    }
  }
};

const calcDateSum = () => {
  let t, e;
  dateStart.addEventListener("change", () => {
      (t = new Date(dateStart.value)), (workFact.value = ((e - t) / 36e5).toFixed(2));
  }),
      dateFinish.addEventListener("change", () => {
          (e = new Date(dateFinish.value)), (workFact.value = ((e - t) / 36e5).toFixed(2));
      });
};

const calcDateSumInput = () => {
  let t, e;
  dateStart.addEventListener("input", () => {
      (t = new Date(dateStart.value)), (workFact.value = ((e - t) / 36e5).toFixed(2));
  }),
      dateFinish.addEventListener("input", () => {
          (e = new Date(dateFinish.value)), (workFact.value = ((e - t) / 36e5).toFixed(2));
      });
};

//==call form functions
calcM2OnChange();
calcDiffCirculation();
waste.sumValueCalc();
calcDateSum();
calcDateSumInput();
