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
                      <input type="text" class="form-control form-control-lg mortgage-total" value="1000000" placeholder="10000000" >
                    </div>
                    <div class="col-md-8 mt-3">
                      <label>Down Payment</label>
                      <input type="text" class="form-control form-control-lg mortgage-down-payment" value="200000" placeholder="50000000" readonly>
                    </div>
                    <div class="col-md-4 mt-3">
                      <label>Percentage</label>
                      <select class="form-control form-control-lg mortgage-down-payment-per" >
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="15">15%</option>
                        <option value="20" selected>20%</option>
                        <option value="25">25%</option>
                        <option value="30">30%</option>
                        <option value="35">35%</option>
                        <option value="40">40%</option>
                        <option value="45">45%</option>
                        <option value="50">50%</option>
                        <option value="55">55%</option>
                        <option value="60">60%</option>
                        <option value="65">65%</option>
                        <option value="70">70%</option>
                      </select>
                    </div> 
                    <div class="col-md-12 mt-3">
                      <label>Mortgage length <small><small>(years)</small></small></label>
                      <input type="text" class="form-control form-control-lg mortgage-length" value="12" placeholder="12">
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
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="mb-0">Upfront Cost ?</h6>  
                  </div>  
                  <div class="col-md-6">
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