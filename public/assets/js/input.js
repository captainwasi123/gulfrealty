var element4 =  document.getElementById('phone-field');

if (typeof(element4) != 'undefined' && element4 != null){
  const inputh5 = document.querySelector("#phone-field");
  inputh5.removeAttribute('placeholder');
  const hiddenInputh5 = document.querySelector("#fullphone-field");
  const itih5 = window.intlTelInput(inputh5, {
    initialCountry: "ae",
    separateDialCode: true,
  });

  inputh5.addEventListener('keyup', () => {
    const fullNumber = itih5.getNumber();
    hiddenInputh5.value = fullNumber;
  });
}