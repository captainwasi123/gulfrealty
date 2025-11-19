@extends('web.includes.master')

@section('content')
	
   <!-- Page content -->
    <main class="content-wrapper">

      <!-- Hero / page title -->
      <div class="position-relative py-5">
        <div class="container position-relative z-2 py-sm-2 py-md-4 py-lg-5 my-lg-3 my-xl-4">
          <h1 class="display-4 text-white mb-0 my-xxl-3">Mortgage Calculator</h1>
        </div>
        <img src="{{URL::To('/public')}}/assets/img/calculator1.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip" alt="Background image">
        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 rtl-flip" style="background: linear-gradient(-270deg, rgba(0,0,0, .60) 0%, rgba(0,0,0, 0) 100%)"></span>
      </div>

      <!-- Contact form -->
      <section class="container pt-5 pb-2 pb-sm-3 pb-md-4 pb-lg-5">
        <div class="bg-info-subtle rounded overflow-hidden">
          <div class="row g-0">

            <!-- Form -->
            <div class="col-md-7 p-5">
                <h2 class="h4 mb-0 text-center">Mortgage Calculator</h2>
                <p class=" mb-4 text-center">Work out your financing options with our free onlie mortgege calculator, estimate your monthly payments, and leave the rest to us!</p>

                <div class="calculator-block">
                  <div class="row">
                    <div class="col-md-12">
                      <h6>Mortgage Information</h6>  
                    </div>  
                    <div class="col-md-12">
                      <label>Property Price</label>
                      <input type="text" class="form-control form-control-lg mortgage-total calculator-field" value="1,000,000" placeholder="1,000,000" >
                      <input type="range" min="500000" max="10000000" value="1000000" step="50000"  class="calculator-slider" id="mortgage-total">
                    </div>
                    <div class="col-md-8 mt-3">
                      <label>Down Payment</label>
                      <input type="text" class="form-control form-control-lg mortgage-down-payment calculator-field" value="200,000" placeholder="50000000" readonly>
                      <input type="range" min="50000" max="10000000" value="1000000" class="calculator-slider" id="mortgage-down-payment" disabled>
                    </div>
                    <div class="col-md-4 mt-3">
                      <label>Percentage <small>(%)</small></label>
                      <input type="text" class="form-control form-control-lg mortgage-down-payment-per calculator-field" min="1" max="100" value="20" placeholder="20" >
                      <input type="range" min="1" max="100" value="20" class="calculator-slider" id="mortgage-down-payment-per">
                    </div> 
                    <div class="col-md-12 mt-3">
                      <label>Mortgage length <small><small>(years)</small></small></label>
                      <input type="text" class="form-control form-control-lg mortgage-length calculator-field" value="12" placeholder="12">
                      <input type="range" min="1" max="25" value="12" class="calculator-slider" id="mortgage-length">
                      <label class="mt-1"><small><small>Maximum of 25 years.</small></small></label>
                    </div>
                  </div>
                </div>

                <div class="calculator-block mt-3 mb-3">

                  <div class="row">
                    <div class="col-md-12 vertical-center">
                      <h6 class="mb-3 fs-13">Try our most popular mortgage products:</h6>  
                    </div>  
                    <div class="col-md-12">
                      <div class="rate-options">
                        <div class="rate-option">
                          <input type="radio" id="rate3" name="rate" value="3.99" checked>
                          <label for="rate3">
                            <span class="label">3 years fixed-rates</span>
                            <span class="value">3.99%</span>
                          </label>
                        </div>

                        <div class="rate-option">
                          <input type="radio" id="rate5" value="3.98" name="rate">
                          <label for="rate5">
                            <span class="label">5 years fixed-rates</span>
                            <span class="value">3.98%</span>
                          </label>
                        </div>

                        <div class="rate-option">
                          <input type="radio" id="rateV" value="5.51" name="rate">
                          <label for="rateV">
                            <span class="label">variable-rates</span>
                            <span class="value">5.51%</span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-md-6">
                    <h6 class="mb-0">Monthly Installment</h6>  
                  </div>  
                  <div class="col-md-6">
                    <h5 class="mb-0 text-right mortgage-resut-monthly">AED 10,000.56</h5>
                  </div>
                </div>
                <hr class="mb-1 mt-1 border-2">
                <div class="row relative">
                  <div class="col-md-7 ">
                    <h6 class="mb-0">
                      Upfront Cost 
                      <span class="upfront-wrapper">
                        &nbsp;&nbsp;<font>?</font>
                        <div class="box-shadow upfront-tooltip bg-white " bis_skin_checked="1">
                          <div class="d-flex w-full flex-1" bis_skin_checked="1">
                            <dl class="d-flex w-full flex-col items-start whitespace-nowrap text-black mb-0">
                              <span class="text-xl font-bold xl:text-2xl">Upfront cost breakdown</span>
                              
                              <dt class="text-body-small-bold md:text-body-medium mt-3 d-flex w-full justify-between md:text-lg lg:text-base xl:text-base"> 
                                Land department fee <span data-testid="landDepartmentFee" data-cy="landDepartmentFee" class="text-body-medium land-department-fees"> AED 40,580 </span>
                              </dt>
                              <span class="text-body-small whitespace-normal"> One-time tax paid to the government. </span>
                              <span class="text-body-small whitespace-normal"> 4% of the property value + AED 580 admin fee </span>
        
                              <dt class="text-body-small-bold md:text-medium mt-3 d-flex w-full justify-between font-bold md:text-lg lg:text-base xl:text-base"> 
                                Trustee fee <span data-testid="trusteeFee" data-cy="trusteeFee" class="text-body-medium"> AED 4,410 </span>
                              </dt>
                              <span class="text-body-small whitespace-normal"> Paid to the bank for a range of services. </span>
                              <span class="text-body-small whitespace-normal"> AED 2,000 + VAT for properties below AED 500,000 </span>
                              <span class="text-body-small whitespace-normal"> AED 4,200 + VAT for properties equal or above AED 500,000 </span>

                              <dt class="text-body-small-bold md:text-body-medium mt-3 d-flex w-full justify-between md:text-lg lg:text-base xl:text-base"> 
                                Mortgage registration fee <span data-testid="mortgageRegistrationFee" data-cy="mortgageRegistrationFee" class="text-body-medium mortgage-registration-fees"> AED 2,790 </span>
                              </dt>
                              <span class="text-body-small whitespace-normal"> Paid to the government to register your property as security for the home loan. </span>
                              <dd class="text-body-medium flex w-full justify-between">
                                <span class="text-body-small whitespace-normal italic"> 0.25% of the loan amount + AED 290 admin fee </span>
                              </dd>

                              <dt class="text-body-small-bold md:text-body-medium mt-3 d-flex w-full justify-between md:text-lg lg:text-base xl:text-base"> 
                                Bank processing fee <span data-testid="bankProcessingFee" data-cy="bankProcessingFee" class="text-body-medium bank-processing-fees"> AED 2,100 </span>
                              </dt>
                              <span class="text-body-small whitespace-normal"> Paid to the bank to process your mortgage. </span>
                              <span class="text-body-small whitespace-normal"> Up to 1% of the loan amount + 5% VAT </span>
                              
                              <dt class="text-body-small-bold md:text-body-medium mt-3 d-flex w-full justify-between md:text-lg lg:text-base xl:text-base"> 
                                Valuation fee <span data-testid="valuationFee" data-cy="valuationFee" class="text-body-medium"> AED 3,150 </span>
                              </dt>
                              <span class="text-body-small whitespace-normal"> Paid to the bank for a basic inspection of your property. </span>
                              <span class="text-body-small whitespace-normal"> Between AED 2,500 and AED 3,500 + 5 VAT </span>
                            </dl>
                          </div>
                        </div> 
                      </span>
                    </h6>    

                                     
                  </div>  
                  <div class="col-md-5">
                    <h5 class="mb-0 text-right mortgage-resut-upfront">AED 10,000.56</h5>
                  </div>
                  <div class="col-md-12">
                    <p class="fs-13 mb-0 mt-3">This values is an estimate. To get the precise amount, apply for a free consultation or contact us!</p>
                  </div>
                </div>

            </div>

            <!-- Image -->
            <div class="col-md-5 position-relative">
              <img src="{{URL::To('/public')}}/assets/img/calculator2.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
            </div>

          </div>
        </div>
      </section>

      <!-- Partner logos -->
      <section class="container pb-5 mb-xxl-3">
        <div class="row align-items-center pt-5 pb-sm-2 pb-md-3 pb-lg-5">
          <div class="col-lg-3">
            <h2 class="h5 text-center text-md-start mb-lg-0">Our Partners</h2>
          </div>
          <div class="col-lg-9 overflow-hidden">
            <!-- Row of logos that turns into carousel on screens < 1200px wide (xl breakpoint) -->
            <div class="swiper" data-swiper='{
              "slidesPerView": 1,
              "spaceBetween": 0,
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
              },
              "autoplay": {
                "delay": 2000,
                "disableOnInteraction": false
              },
              "breakpoints": {
                "400": {
                  "slidesPerView": 2
                },
                "600": {
                  "slidesPerView": 3,
                  "spaceBetween": 0
                },
                "900": {
                  "slidesPerView": 5,
                  "spaceBetween": 16
                },
                "1200": {
                  "slidesPerView": 7,
                  "spaceBetween": 16
                },
                "1400": {
                  "slidesPerView": 7,
                  "spaceBetween": 24
                }
              }
            }'>
              <div class="swiper-wrapper">
                @for($i=1; $i<=7; $i++)
                  <!-- Logo -->
                  <div class="swiper-slide">
                    <div class="nav justify-content-center">
                      <a class="nav-link text-body-secondary p-0" href="javascript:void(0)" aria-label="Partner">
                        <img src="{{URL::to('/public/assets/img/client-logos/'.$i.'.png')}}" width="90px" alt="Client Logo">
                      </a>
                    </div>
                  </div>
                @endfor

              </div>

              <!-- Pagination (Bullets) -->
              <div class="swiper-pagination position-static mt-sm-2"></div>
            </div>
          </div>
        </div>
      </section>
    </main>

	
@endsection

@section('addScript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{URL::to('/public/assets/js/mortgage.js')}}"></script>
@endsection