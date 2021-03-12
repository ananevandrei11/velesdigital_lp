let phoneCall = document.getElementById('phoneCall');
let phoneService = document.getElementById('phoneService');
let phoneLetter = document.getElementById('phoneLetter');
let maskOptionsPhone = {
  mask: '+{7}(000)000-00-00'
};
let mask1 = IMask(phoneService, maskOptionsPhone);
let mask2 = IMask(phoneCall, maskOptionsPhone);
let mask3 = IMask(phoneLetter, maskOptionsPhone);