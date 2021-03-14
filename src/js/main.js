// MASK FOR PHONE
let phoneCall = document.getElementById('phoneCall');
let phoneService = document.getElementById('phoneService');
let phoneLetter = document.getElementById('phoneLetter');
let maskOptionsPhone = {
  mask: '+{7}(000)000-00-00'
};
let mask1 = IMask(phoneService, maskOptionsPhone);
let mask2 = IMask(phoneCall, maskOptionsPhone);
let mask3 = IMask(phoneLetter, maskOptionsPhone);

// VALIDATION ORDER CALL
let formOrderCall = document.querySelector('#formOrderCall');
let phoneOrderCall = formOrderCall.elements.phoneCall;
let btnOrderCall = formOrderCall.querySelector('button[type="submit"]');
phoneOrderCall.oninput = () => {
  if (phoneOrderCall.value.length < 16) {
    btnOrderCall.setAttribute('disabled', 'disabled');
  } else {
    btnOrderCall.removeAttribute('disabled', 'disabled');
  }
}

// VALIDATION ORDER SERVICE
let formOrderService = document.querySelector('#formOrderService');
let phoneOrderService = formOrderService.elements.phoneService;
let emailOrderService = formOrderService.elements.emailService;
let btnOrderService = formOrderService.querySelector('button[type="submit"]');
let regexMail = /[A-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[A-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[A-z0-9](?:[A-z0-9-]*[A-z0-9])?\.)+[A-z0-9](?:[A-z0-9-]*[A-z0-9])?/;
let arrServicePhone = [];
let arrServiceEmail = [];
let arrServiceTotal = [];

function validPhone(elem, arr) {
  if (elem.value.length == 16) {
    arr[0] = 'true';
  } else {
    arr[0] = 'false';
  }
  return arr;
}

function validEmail(elem, arr) {
  if (elem.value.match(regexMail) && elem.value.length > 0) {
    arr[0] = 'true';
  } else {
    arr[0] = 'false';
  }
  return arr;
}

function validBtn(arrTotal, arrPhone, arrEmail) {
  arrTotal = arrPhone.concat(arrEmail);
  let check = 0;
  for (let i in arrTotal) {
    if (arrTotal[i] === 'true') {
      check += 1;
    }
    check += 0;
  }
  return check;
}

phoneOrderService.oninput = () => {
  validPhone(phoneOrderService, arrServicePhone);
  if (validBtn(arrServiceTotal, arrServicePhone, arrServiceEmail) === 2) {
    btnOrderService.removeAttribute('disabled', 'disabled');
  } else {
    btnOrderService.setAttribute('disabled', 'disabled');
  }
}
emailOrderService.oninput = () => {
  validEmail(emailOrderService, arrServiceEmail);
  if (validBtn(arrServiceTotal, arrServicePhone, arrServiceEmail) === 2) {
    btnOrderService.removeAttribute('disabled', 'disabled');
  } else {
    btnOrderService.setAttribute('disabled', 'disabled');
  }
}

// VALIDATION ORDER LETTER
let formLetter = document.querySelector('#formLetter');
let phoneOrderLetter = formLetter.elements.phoneLetter;
let emailOrderLetter = formLetter.elements.emailLetter;
let btnOrderLetter = formLetter.querySelector('button[type="submit"]');
let arrLetterPhone = [];
let arrLetterEmail = [];
let arrLetterTotal = [];

phoneOrderLetter.oninput = () => {
  validPhone(phoneOrderLetter, arrLetterPhone);
  if (validBtn(arrLetterTotal, arrLetterPhone, arrLetterEmail) === 2) {
    btnOrderLetter.removeAttribute('disabled', 'disabled');
  } else {
    btnOrderLetter.setAttribute('disabled', 'disabled');
  }
}
emailOrderLetter.oninput = () => {
  validEmail(emailOrderLetter, arrLetterEmail);
  if (validBtn(arrLetterTotal, arrLetterPhone, arrLetterEmail) === 2) {
    btnOrderLetter.removeAttribute('disabled', 'disabled');
  } else {
    btnOrderLetter.setAttribute('disabled', 'disabled');
  }
}