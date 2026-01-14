@extends('web.includes.master')

@section('content')
	 
  

    <!-- Page content -->
    <main class="content-wrapper">
      <div class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2 pb-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('about')}}">About</a></li>
            <li class="breadcrumb-item active" aria-current="page">CEO Message</li>
          </ol>
        </nav>



        <!-- Gallery -->
        <div class="row g-3 g-sm-4 g-md-3 g-xl-4 pb-sm-2 mb-2">

          <div class="col-md-5">
            <h2 class="h4 mb-lg-4">Message from the <strong>CEO</strong></h2>
              <p class="fs-sm mb-0">
                At <strong>Gulf Realty</strong>, our vision has always been simple yet powerful — to redefine the real estate experience through trust, transparency, and innovation. What began as a small initiative has today grown into a brand recognized for its commitment to excellence and customer satisfaction.
                <br><br>
                In a constantly evolving market like the UAE, we believe success comes not just from selling properties, but from building relationships that last a lifetime. Every project we take on reflects our dedication to quality, detail, and value — ensuring that our clients find more than just a home, they find a lifestyle.
                <br><br>
                Our team’s passion and professionalism are the foundation of everything we do. Together, we aim to empower investors, inspire homeowners, and contribute to shaping Dubai’s ever-growing skyline.
                <br><br>
                As we continue to move forward, our promise remains the same — to deliver trust, integrity, and results in every transaction. The future of real estate is bright, and we’re proud to be leading the way.

              </p>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-5">
            <a class="hover-effect-scale position-relative d-flex rounded overflow-hidden" href="javascript:void(0)" data-glightbox data-gallery="image-gallery">
              <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
              <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(160 / 196 * 100%)">
                <img src="{{URL::to('/public')}}/CEO1.jpg" alt="Image">
              </div>
            </a>
          </div>
          <div class="col-md-12 text-center">
            <p class="py-3">
              "We don’t just build properties — we build trust, value, and lasting relationships"
              <br>
              <strong><i>-Abdul Qadir Suria</i></strong>
            </p>
          </div>

        </div>

        <!-- Hero with looped video playback -->
      <section class="position-relative mt-n2 mt-sm-0 mb-xxl-3">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4">
          <!-- Video -->
          <div class="ratio ratio-16x9 border rounded-5 overflow-hidden">
            <video muted loop playsinline autoplay poster="{{URL::to('/')}}/gulf-poster.png">
              <source src="{{URL::to('/public')}}/gulf-video.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </section>


        <!-- Hero with looped video playback -->
      <section class="position-relative mt-n2 mt-sm-0 mb-xxl-3">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4">
          
              <!-- Stats -->
              <div class="row row-cols-3 text-center">
                <div class="col">
                  <div class="h2 pb-1 mb-2">95%</div>
                  <div class="text-dark-emphasis">Satisfied Clients</div>
                </div>
                <div class="col">
                  <div class="h2 pb-1 mb-2">100+</div>
                  <div class="text-dark-emphasis">Sold Properties</div>
                </div>
                <div class="col">
                  <div class="h2 pb-1 mb-2">$100 M</div>
                  <div class="text-dark-emphasis">Sold Properties Worth</div>
                </div>
              </div>
        </div>
      </section>


      <!-- Testimonials -->
      <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
        <div class="d-flex justify-content-between gap-4 pt-1 pt-sm-2 pt-lg-0 pb-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">
          <h2 class="h1 mb-0">
            Customers
            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="36" height="31" fill="currentColor"><path d="M18.455 30.455L3.852 15.852a8.64 8.64 0 0 1-2.33-4.062c-.379-1.544-.374-3.078.014-4.602.388-1.534 1.16-2.869 2.315-4.006C5.036 2.017 6.385 1.245 7.901.866a9.07 9.07 0 0 1 4.56 0c1.525.388 2.879 1.16 4.063 2.315l1.932 1.875 1.932-1.875c1.193-1.155 2.547-1.927 4.063-2.315s3.03-.388 4.545 0c1.525.379 2.879 1.151 4.063 2.315 1.155 1.136 1.927 2.472 2.315 4.006a9.24 9.24 0 0 1 0 4.602c-.379 1.543-1.151 2.898-2.315 4.063L18.455 30.455z"/></svg>
            Gulf Realty
          </h2>

          <!-- Carousel controls (Prev/next buttons) -->
          <div class="d-flex gap-2">
            <button type="button" class="btn btn-icon btn-lg btn-outline-secondary animate-slide-start rounded-circle me-1" id="prevTestimonial" aria-label="Prev">
              <i class="fi-chevron-left fs-xl animate-target"></i>
            </button>
            <button type="button" class="btn btn-icon btn-lg btn-outline-secondary animate-slide-end rounded-circle" id="nextTestimonial" aria-label="Next">
              <i class="fi-chevron-right fs-xl animate-target"></i>
            </button>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-0 bg-body-tertiary rounded overflow-hidden">

          <!-- Image -->
          <div class="col position-relative bg-body-secondary">
            <img src="{{URL::to('/public')}}/assets/img/about/v1/testimonials.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
          </div>

          <!-- Testimonials carousel -->
          <div class="col py-5 px-4 px-sm-5">
            <div class="p-lg-4 p-xl-5 my-xxl-3">
              <div class="swiper" data-swiper='{
                "slidesPerView": 1,
                "spaceBetween": 48,
                "loop": true,
                "autoHeight": true,
                "navigation": {
                  "prevEl": "#prevTestimonial",
                  "nextEl": "#nextTestimonial"
                },
                "autoplay": {
                  "delay": 2000,
                  "disableOnInteraction": false
                }
              }'>
                <div class="swiper-wrapper">

                  <!-- Testimonial -->
                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>It was really great working with Gulf estate, because in last week I was looking for an apartment to move in with my partner, but i was very much confused with which property should I choose, but thanks to Gulf Estate to providing and selecting the best property of my choice and requirement.</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Satish Pednekar</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>

                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>we were looking for an apartment near dubai marina and with the help of manojj I got a good deal.. .</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Cornelis dewi Ratnawati</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>

                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>Gave me such an amazing unit, earned 117% in just 11 months on my investment , in a community called lagoons</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Abhay Ruhal</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>

                  
                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>It was one of the best decisions to get consultation from Gulf Realty. Best company to start your investment with.</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Dolledup Diva</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>
                  
                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>The best company to take your dream home from. They guided me in a very good way shown me so many options and they are very transparent in terms of property detailing.</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Arman mirza model</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>
                  
                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>Wonderful experience and I am happy to join gulf realty family.
                        You guys are really supportive, Thank you Rashid bhai for giving me a beautiful property.</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Kshitij Ahuja</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>
                  
                  <figure class="swiper-slide">
                    <svg class="text-primary mt-n3" xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor"><path d="M14.1 53.1c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5-2.1 2.1-4.5 3-7.5 3-3.3 0-6.3-1.5-8.1-3.3zm30 0c-3-3.3-4.8-6.9-4.8-12.9 0-10.5 7.5-19.8 18-24.6l2.7 3.9c-9.9 5.4-12 12.3-12.6 16.8 1.5-.9 3.6-1.2 5.7-.9 5.4.6 9.6 4.8 9.6 10.5 0 2.7-1.2 5.4-3 7.5s-4.5 3-7.5 3c-3.3 0-6.3-1.5-8.1-3.3z"/></svg>
                    <blockquote class="fs-lg text-dark-emphasis pt-3 mt-lg-2 mt-xl-3">
                      <p>I had been living in dubai for years and finally when I decided to buy a property i was scared and a little confused and i got connected with gulf realty which was referred by a friend and they explaIned me the potential and advised me guided me for investing, Made my first purchase as off plan property and its just been six month and i am getting offer with premium!</p>
                    </blockquote>
                    <figcaption class="d-flex align-items-center pt-2 pt-lg-3">
                      <div class="ratio ratio-1x1 flex-shrink-0 bg-body-secondary rounded-circle overflow-hidden" style="width: 64px">
                        <img src="{{URL::to('/public')}}/user-placeholder.jpg" alt="Avatar">
                      </div>
                      <div class="ps-3">
                        <div class="h6 mb-1">Suhaib Vindhani</div>
                        <div class="fs-sm text-body-secondary">Local Guide</div>
                      </div>
                    </figcaption>
                  </figure>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



      </div>
    </main>

@endsection