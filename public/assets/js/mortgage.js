$(document).ready(function(){


  calculateMortgage();

  $('.mortgage-total').on('change paste keyup',function(){
    if (this.value !== null && this.value !== undefined && this.value !== '') {
      this.value = this.value.replace(/\D/g,'');
      var x = removeCommas(this.value);
      var per = $('.mortgage-down-payment-per').val();
      var propertyPrice = x;
      var result = ( propertyPrice / 100 ) * per;
      
      $('#mortgage-total').val(x);

      $('.mortgage-down-payment').val(addCommas(result));
      $('#mortgage-down-payment').attr('max', x);
      $('#mortgage-down-payment').val(result);

      calculateMortgage();
      this.value = addCommas(x);
    }else{

      $('.mortgage-down-payment').val('0');
    }
  });

  $('#mortgage-total').on('input',function(){
    $('.mortgage-total').val(addCommas(this.value));

    var x = removeCommas(this.value);
    var per = $('.mortgage-down-payment-per').val();
    var propertyPrice = x;
    var result = ( propertyPrice / 100 ) * per;
    
    $('#mortgage-total').val(x);

    $('.mortgage-down-payment').val(addCommas(result));
    $('#mortgage-down-payment').attr('max', x);
    $('#mortgage-down-payment').val(result);

    calculateMortgage();
  });

  $('.mortgage-down-payment-per').on('change paste keyup',function(){
    if (this.value !== null && this.value !== undefined && this.value !== '') {
      this.value = this.value.replace(/\D/g,'');
      var per = $(this).val();

      var x = removeCommas($('.mortgage-total').val());
      var propertyPrice = x;

      var result = ( propertyPrice / 100 ) * per;

      $('.mortgage-down-payment').val(addCommas(result));
      

      $('#mortgage-down-payment-per').val(per);

      calculateMortgage();
    }else{

      $('.mortgage-down-payment').val('0');
    }
  });

  $('#mortgage-down-payment-per').on('input',function(){

    $('.mortgage-down-payment-per').val(this.value);
    var per = $(this).val();

    var x = removeCommas($('.mortgage-total').val());
    var propertyPrice = x;

    var result = ( propertyPrice / 100 ) * per;

    $('.mortgage-down-payment').val(addCommas(result));
    
    calculateMortgage();
  });


  $('input[name="rate"]').on('change',function(){
    
    calculateMortgage();
  });

  $('.mortgage-length').on('change paste keyup',function(){
    
    if (this.value !== null && this.value !== undefined && this.value !== '') {

      this.value = this.value.replace(/\D/g,'');
      calculateMortgage();
    }else{

      this.value = '1';
    }
  });


  $('#mortgage-length').on('input',function(){

    $('.mortgage-length').val(this.value);
    
    calculateMortgage();
  });
});

function calculateMortgage() {
  var propertyPrice = removeCommas($('.mortgage-total').val());
  var downPayment = removeCommas($('.mortgage-down-payment').val());
  var mortgageYears = $('.mortgage-length').val();
  var annualInterestRate = $('input[name="rate"]:checked').val();

  // Convert values
  const loanAmount = propertyPrice - downPayment;
  const monthlyRate = (annualInterestRate / 100) / 12;
  const totalMonths = mortgageYears * 12;

  // Mortgage formula: M = P * [r(1 + r)^n] / [(1 + r)^n – 1]
  const monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, totalMonths)) /
                         (Math.pow(1 + monthlyRate, totalMonths) - 1);

  // Calculate totals
  const totalPayment = monthlyPayment * totalMonths;
  const totalInterest = totalPayment - loanAmount;

  var bpf = ((propertyPrice / 100 ) * 0.2 );
  bpf = bpf + ((bpf / 100) * 5);

  var mrf = ((propertyPrice/100)*0.25) + 290;

  var ldf = (((propertyPrice / 100 ) * 4 ) + 580);

  const upfrontFees = ldf + 4410 + mrf + bpf + 3150;
  const upfront = parseFloat(downPayment) + parseFloat(upfrontFees);

  $('.mortgage-resut-monthly').html(
    'AED '+ Number(monthlyPayment).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
  );
  $('.mortgage-resut-upfront').html(
    'AED '+ Number(upfront).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
  );


  $('.land-department-fees').html(
    'AED '+ Number(ldf).toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 })
  );

  $('.mortgage-registration-fees').html(
    'AED '+ Number(mrf).toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 })
  );

  $('.bank-processing-fees').html(
    'AED '+ Number(bpf).toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 2 })
  );
}



function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function addCommas(nStr)
{
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}

function removeCommas(value){
  value=value.replace(/\,/g,'');
  value=parseInt(value,10);
  return value;
}