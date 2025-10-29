@extends('web.includes.master')

@section('content')
	 <!-- Page content -->
    <main class="content-wrapper">

       <!-- Hero with looped video playback -->
      <section class="position-relative py-5 mt-n2 mt-sm-0 mb-xxl-3">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4">
          <div class="text-center mx-auto" style="max-width: 820px">
            <div class="text-dark-emphasis text-uppercase mb-3">About us</div>
            <h1 class="display-3 pb-sm-3 pb-2 pb-lg-0 mb-4 mb-lg-5">Redefining Real Estate with Integrity and Innovation</h1>
          </div>

          <!-- Video -->
          <div class="ratio ratio-16x9 border rounded-5 overflow-hidden">
            <video muted loop playsinline autoplay poster="assets/img/about/v1/video-poster.jpg">
              <source src="{{URL::To('/public')}}/assets/img/about/v1/video.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </section>


      <!-- Hero -->
      <section class="container">
        <div class="row align-items-center justify-content-center pb-2 pb-sm-3 pb-md-4 pb-lg-5">

          <!-- Image -->
          <div class="col-12">
              <h2>About Us</h2>
              <p>
                <strong>Gulf Realty</strong> is a trusted name in Dubai’s real estate market, dedicated to turning aspirations into reality. With a deep understanding of the UAE property landscape, we specialize in offering end-to-end real estate solutions — from buying and selling to investments and property management.
                <br>
                Since our inception, our mission has been to deliver more than just properties — we deliver peace of mind. Every project we handle is backed by market expertise, transparency, and a genuine commitment to client satisfaction.
                <br>
                At <strong>Gulf Realty</strong>, we take pride in our team of experienced professionals who guide clients through every step of their real estate journey. Whether you’re an investor looking for high returns or a family searching for your dream home, we ensure your experience is seamless, rewarding, and personalized.
                <br>
                Driven by innovation and integrity, Gulf Realty continues to set new standards in the real estate industry — offering opportunities that go beyond expectations and building relationships that stand the test of time.

                <br><br>
                <strong>Your vision, our expertise — together, we build the future.</strong>

              </p>
          </div>

        </div>
      </section>

      <!-- Our story (Timeline) -->
      <section class="container">
        <h2>Gulf Realty Story</h2>
        <div class="overflow-y-auto pb-4 mb-4">
          <div class="d-flex gap-4" style="min-width: 860px">
            <div class="w-100">
              <div class="d-flex align-items-center gap-3">
                <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2022</div>
                <div class="w-100 border-top border-info-subtle me-n2"></div>
              </div>
              <h3 class="h5 pt-3 pb-1 mt-3 mb-2">The vision begins</h3>
              <p class="mb-0">In 2022, a passionate team of real estate professionals came together with a shared goal — to redefine property services in the UAE through trust, innovation, and transparency.</p>
            </div>
            <div class="w-100">
              <div class="d-flex align-items-center gap-3">
                <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2023</div>
                <div class="w-100 border-top border-info-subtle me-n2"></div>
              </div>
              <h3 class="h5 pt-3 pb-1 mt-3 mb-2">Building the foundation</h3>
              <p class="mb-0">With a strong focus on client satisfaction and local market expertise, Gulf Realty quickly established itself as a trusted name among buyers, sellers, and investors across Dubai.</p>
            </div>
            <div class="w-100">
              <div class="d-flex align-items-center gap-3">
                <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2024</div>
                <div class="w-100 border-top border-info-subtle me-n2"></div>
              </div>
              <h3 class="h5 pt-3 pb-1 mt-3 mb-2">Expanding horizons</h3>
              <p class="mb-0">As the team grew, so did the brand’s reputation. Gulf Realty partnered with top developers and launched exclusive projects, strengthening its position as a leading real estate agency in the region.</p>
            </div>
            <div class="w-100">
              <div class="d-flex align-items-center gap-3">
                <div class="btn btn-lg btn-outline-info rounded-pill pe-none">2025</div>
              </div>
              <h3 class="h5 pt-3 pb-1 mt-3 mb-2">Shaping the future</h3>
              <p class="mb-0">Today, Gulf Realty continues to grow with the same passion that started it all — delivering value, creating opportunities, and helping clients turn their real estate dreams into reality.</p>
            </div>
          </div>
        </div>
        <p>Helping you buy, sell, and rent with confidence and ease</p>
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



      <!-- CEO address + Stats -->
      <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
        <div class="row">
          <div class="col-md-5">
            <h2 class="h1 pb-2 mb-4">We provide a complete service for the sale, purchase or rental of real estate.</h2>
          </div>
          <div class="col-md-7 col-xl-6 offset-xl-1">
            <div class="ps-md-4 ps-xl-0">
              <div class="position-relative rtl-flip" style="max-width: 148px">
                <div class="ratio ratio-1x1 bg-body-tertiary rounded-circle overflow-hidden">
                  <img src="{{URL::To('/public')}}/assets/img/about/v1/avatar/01.jpg" alt="Avatar">
                </div>
                <svg class="position-absolute" style="right: 0; bottom: 0; margin: 0 -5px 5px 0" xmlns="http://www.w3.org/2000/svg" width="44" height="44"><path class="text-primary" d="M21.031 41.497l.059.003h.059.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002.002H22h10.625c4.887 0 8.875-3.988 8.875-8.875V21.894C41.5 11.143 32.71 2.5 22 2.5 11.269 2.5 2.5 11.269 2.5 22c0 10.479 8.28 19.009 18.531 19.497z" fill="currentColor" stroke-width="5" style="stroke: var(--fn-body-bg)"/><path d="M22 18.258c-3.101 0-5.655 2.554-5.655 5.655S18.9 29.567 22 29.567s5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397A9.36 9.36 0 0 1 22 33.345c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"/><g fill="#fff"><path d="M21.894 15.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zm-10.046 6.741a10.05 10.05 0 0 1 10.046-10.046A10.05 10.05 0 0 1 31.94 21.894 10.05 10.05 0 0 1 21.894 31.94a10.05 10.05 0 0 1-10.046-10.047z"/><path d="M27.525 27.525c.645-.645 1.692-.645 2.337 0l3.187 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"/></g><path d="M28.162 19.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"/><path class="text-primary" d="M28.163 13.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"/></svg>
              </div>
              <figure class="pt-2 pt-md-3 pb-4 pb-xl-5 my-3">
                <blockquote class="fs-lg">
                  <p>At Finder, we pride ourselves on our extensive knowledge of the local market and our ability to connect clients with their dream homes, investment properties, and rental opportunities.</p>
                </blockquote>
                <figcaption class="h6 mb-0">Liza Rogers, CEO of Finder</figcaption>
              </figure>

              <!-- Stats -->
              <div class="row row-cols-3">
                <div class="col">
                  <div class="h2 pb-1 mb-2">10+</div>
                  <div class="text-dark-emphasis">Years on the market</div>
                </div>
                <div class="col">
                  <div class="h2 pb-1 mb-2">600k</div>
                  <div class="text-dark-emphasis">Users per week</div>
                </div>
                <div class="col">
                  <div class="h2 pb-1 mb-2">90%</div>
                  <div class="text-dark-emphasis">Satisfied customers</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



      <!-- Create account CTA -->
      <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
        <h2 class="h1 pt-1 pt-sm-2 pt-lg-0 pb-md-2 pb-lg-3 pb-xl-0 mb-sm-4 mb-xl-5" style="max-width: 525px">Get new customers with Finder easily!</h2>
        <div class="row">
          <div class="col-md-8">
            <div class="position-relative w-100 h-100 bg-body-tertiary rounded overflow-hidden">
              <img src="{{URL::To('/public')}}/assets/img/about/v1/account-cta.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
            </div>
          </div>

          <!-- Accordion + CTA button -->
          <div class="col-md-4">
            <p class="fs-sm mb-0">Complete this form so we can get in touch</p>
            <h4 class="modal-title">Learn more about this property</h4>
            <br>
            <div class="vstack gap-3">
              <input type="text" class="form-control" placeholder="Name *" required="">
              <input type="email" class="form-control" placeholder="Email *" required="">
              <input type="tel" class="form-control" data-input-format="{&quot;numericOnly&quot;: true, &quot;delimiters&quot;: [&quot;+1 &quot;, &quot; &quot;, &quot; &quot;], &quot;blocks&quot;: [0, 3, 3, 2]}" placeholder="Phone number">
              <textarea class="form-control" rows="5" placeholder="Write your message" required=""></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-lg btn-primary w-100 m-0 mb-3">Send message</button>
            <p class="fs-xs m-0">This site is protected by reCAPTCHA and the Google <a class="hover-effect-underline text-decoration-none" href="#!">Privacy Policy</a> and <a class="hover-effect-underline text-decoration-none" href="#!">Terms of Service</a> apply.</p>
          </div>
        </div>
      </section>


      <!-- Testimonials -->
      <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
        <div class="d-flex justify-content-between gap-4 pt-1 pt-sm-2 pt-lg-0 pb-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5">
          <h2 class="h1 mb-0">
            Customers
            <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="36" height="31" fill="currentColor"><path d="M18.455 30.455L3.852 15.852a8.64 8.64 0 0 1-2.33-4.062c-.379-1.544-.374-3.078.014-4.602.388-1.534 1.16-2.869 2.315-4.006C5.036 2.017 6.385 1.245 7.901.866a9.07 9.07 0 0 1 4.56 0c1.525.388 2.879 1.16 4.063 2.315l1.932 1.875 1.932-1.875c1.193-1.155 2.547-1.927 4.063-2.315s3.03-.388 4.545 0c1.525.379 2.879 1.151 4.063 2.315 1.155 1.136 1.927 2.472 2.315 4.006a9.24 9.24 0 0 1 0 4.602c-.379 1.543-1.151 2.898-2.315 4.063L18.455 30.455z"/></svg>
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

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Latest blog posts -->
      <section class="container py-2 py-sm-3 py-md-4 py-lg-5 my-xxl-3">
        <div class="d-flex align-items-start justify-content-between gap-4 pb-3 mb-2 mb-sm-3 mb-lg-4">
          <h2 class="h1 mb-0">Latest blogs</h2>
          <div class="nav">
            <a class="nav-link position-relative fs-base text-nowrap py-1 px-0" href="{{route('blogs')}}">
              <span class="hover-effect-underline stretched-link me-1">View all</span>
              <i class="fi-chevron-right fs-lg"></i>
            </a>
          </div>
        </div>

         <!-- Row of articles that turns into carousel on screens < 992px wide (lg breakpoint) -->
         <div class="swiper pb-5" data-swiper='{
          "slidesPerView": 1,
          "spaceBetween": 24,
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 2
            },
            "992": {
              "slidesPerView": 3
            }
          }
        }'>
          <div class="swiper-wrapper">

            @foreach($latest_blogs as $val)
              <!-- Article -->
              <article class="swiper-slide">
                <a class="ratio d-flex hover-effect-scale rounded overflow-hidden mb-3 mb-sm-4" href="{{route('blogs.detail', $val->slug)}}" style="--fn-aspect-ratio: calc(300 / 416 * 100%)">
                  <img src="{{URL::To('/public/storage/blogs/'.$val->banner)}}" class="hover-effect-target" alt="Image">
                </a>
                <h3 class="h5 mb-2">
                  <a class="hover-effect-underline" href="{{route('blogs.detail', $val->slug)}}">{{$val->heading}}</a>
                </h3>
                <p class="fs-sm two-line-break">{{$val->short_description}}</p>
                <div class="nav fs-sm gap-3">
                  <a class="nav-link fw-semibold p-0" href="javascript:void(0)">by {{@$val->author->name}}</a>
                  <span class="text-body-secondary">{{date('M d, Y', strtotime($val->created_at))}}</span>
                </div>
              </article>
            @endforeach

          </div>

          <!-- Pagination (Bullets) -->
          <div class="swiper-pagination position-static mt-3 mt-sm-4"></div>
        </div>
      </section>
    </main>
@endsection