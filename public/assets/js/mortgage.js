$(document).ready(function(){


  calculateMortgage();

  $('.mortgage-total').on('keyup',function(){
    var per = $('.mortgage-down-payment-per').find(":selected").val();
    var propertyPrice = $('.mortgage-total').val();

    var result = ( propertyPrice / 100 ) * per;

    $('.mortgage-down-payment').val(result);

    calculateMortgage();
  });

  $('.mortgage-down-payment-per').on('change',function(){
    var per = $(this).val();
    var propertyPrice = $('.mortgage-total').val();

    var result = ( propertyPrice / 100 ) * per;

    $('.mortgage-down-payment').val(result);
    
    calculateMortgage();
  });


  $('input[name="rate"]').on('change',function(){
    
    calculateMortgage();
  });
});

function calculateMortgage() {
  var propertyPrice = $('.mortgage-total').val();
  var downPayment = $('.mortgage-down-payment').val();
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
  console.log(bpf);

  const upfrontFees = (((propertyPrice / 100 ) * 4 ) + 580) + 4410 + mrf + bpf + 3150;
  const upfront = parseFloat(downPayment) + parseFloat(upfrontFees);

  $('.mortgage-resut-monthly').html(
    'AED '+ Number(monthlyPayment).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
  );
  $('.mortgage-resut-upfront').html(
    'AED '+ Number(upfront).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
  );
}