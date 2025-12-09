<!-- Page footer -->
    <footer class="footer bg-body border-top pt-5" data-bs-theme="dark">
      <div class="container pt-sm-2 pt-md-3 pt-lg-4 pb-4">
        <div class="accordion row pb-4 pb-md-3 pb-lg-4 mb-2 mb-sm-3 mb-md-2" id="footerLinks">

          <!-- Logo + Contacts -->
          <div class="col-sm-5 col-md-4 col-lg-3">
            <a class="d-inline-flex brand-footer-logo align-items-center text-dark-emphasis text-decoration-none mb-4" href="{{URL::to('/')}}">
              <img src="{{URL::to('/public/logo.png')}}" alt="brand logo">
            </a>
            <ul class="list-unstyled gap-3">
              <li>
                <div class="position-relative d-flex align-items-center">
                  <i class="fi-map-pin fs-lg text-body me-2"></i>
                  <a class="text-dark-emphasis text-decoration-none hover-effect-underline stretched-link" href="javascript:void(0)">806, Aspect Tower, Business Bay (Dubai)</a>
                </div>
              </li>
              <li>
                <div class="position-relative d-flex align-items-center">
                  <i class="fi-mail fs-lg text-body me-2"></i>
                  <a class="text-dark-emphasis text-decoration-none hover-effect-underline stretched-link" href="mailto:info@gulfrealty.ae">info@gulfrealty.ae</a>
                </div>
              </li>
              <li>
                <div class="position-relative d-flex align-items-center">
                  <i class="fi-phone-call fs-lg text-body me-2"></i>
                  <a class="text-dark-emphasis text-decoration-none hover-effect-underline stretched-link" href="tel:+971459147786">+971 459147786</a>
                </div>
              </li>
            </ul>
          </div>

          <!-- Columns with links that are turned into accordion on screens < 500px wide (sm breakpoint) -->
          <div class="accordion-item col-sm-4 col-md-4 col-lg-3 border-0">
            <h6 class="accordion-header" id="quickLinksHeading">
              <span class="h5 d-none d-sm-block">Quick links</span>
              <button type="button" class="accordion-button collapsed py-3 d-sm-none" data-bs-toggle="collapse" data-bs-target="#quickLinks" aria-expanded="false" aria-controls="quickLinks">Quick links</button>
            </h6>
            <div class="accordion-collapse collapse d-sm-block" id="quickLinks" aria-labelledby="quickLinksHeading" data-bs-parent="#footerLinks">
              <ul class="nav flex-column gap-2 pt-sm-1 pt-lg-2 pb-3 pb-sm-0 mt-n1 mb-1 mb-sm-0">
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('blogs')}}">Blogs</a>
                </li>
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{URL::to('/blogs/latest-updates')}}">Latest Updates</a>
                </li>
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('properties.buy')}}">Buy property</a>
                </li>
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('properties.rent')}}">Rent property</a>
                </li>
              </ul>
            </div>
            <hr class="d-sm-none my-0">
          </div>
          <div class="accordion-item col-sm-3 col-lg-2 col-xxl-3 border-0">
            <h6 class="accordion-header" id="profileLinksHeading">
              <span class="h5 d-none d-sm-block">Profile</span>
              <button type="button" class="accordion-button collapsed py-3 d-sm-none" data-bs-toggle="collapse" data-bs-target="#profileLinks" aria-expanded="false" aria-controls="profileLinks">Profile</button>
            </h6>
            <div class="accordion-collapse collapse d-sm-block" id="profileLinks" aria-labelledby="profileLinksHeading" data-bs-parent="#footerLinks">
              <ul class="nav flex-column gap-2 pt-sm-1 pt-lg-2 pb-3 pb-sm-0 mt-n1 mb-1 mb-sm-0">
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('about')}}">About Us</a>
                </li>
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('about.ceo')}}">CEO Message</a>
                </li>
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('calculators.mortgage')}}">Mortgage Calculator</a>
                </li>
                <li class="pt-1">
                  <a class="nav-link hover-effect-underline d-inline text-body fw-normal p-0" href="{{route('privacy-policy')}}">Privacy policy</a>
                </li>
              </ul>
            </div>
            <hr class="d-sm-none my-0">
          </div>

          <!-- Subscription + Social links -->
          <div class="col-lg-4 col-xxl-3 pt-4 pt-md-5 pt-lg-0 mt-3 mt-md-0">
            <div class="d-flex flex-column flex-sm-row flex-lg-column align-items-center justify-content-between justify-content-lg-center text-center text-sm-start text-lg-center">
              <h6 class="h5 mb-sm-0 mb-lg-3 me-sm-3 me-md-4 me-lg-0">Get exclusive advice</h6>
              <button type="button" class="btn btn-lg btn-outline-secondary w-100" style="max-width: 205px">Sign up</button>
              <div class="d-flex justify-content-center pt-2 pt-sm-0 pt-lg-3 ps-sm-3 ps-lg-0 mt-3 mt-sm-0 mt-lg-3">
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="https://www.instagram.com/gulfrealty_ae/" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-white opacity-75 p-0"></div></div>' title="Instagram" aria-label="Follow us on Instagram" target="_blank">
                  <i class="fi-instagram"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="https://m.facebook.com/gulfrealty.ae" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-white opacity-75 p-0"></div></div>' title="Facebook" aria-label="Follow us on Facebook" target="_blank">
                  <i class="fi-facebook"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="https://ae.linkedin.com/company/gulfrealty" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-white opacity-75 p-0"></div></div>' title="LinkedIn" aria-label="Follow us on LinkedIn" target="_blank">
                  <i class="fi-linkedin"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="https://www.youtube.com/channel/UCD5tR-8KZwPb-DCz2xkB01A/featuredy" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-white opacity-75 p-0"></div></div>' title="Youtube" aria-label="Follow us on Youtube" target="_blank">
                  <i class="fi-youtube"></i>
                </a>
                <a class="btn btn-icon fs-base btn-outline-secondary border-0" href="https://www.tiktok.com/@gulfrealty" data-bs-toggle="tooltip" data-bs-template='<div class="tooltip fs-xs mb-n2" role="tooltip"><div class="tooltip-inner bg-transparent text-white opacity-75 p-0"></div></div>' title="Tiktok" aria-label="Follow us on Tiktok" target="_blank">
                  <i class="fi-tiktok"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Mobile app CTA -->
        <div class="position-relative d-flex flex-column flex-md-row align-items-center overflow-hidden mb-md-2">
            <img src="{{URL::to('/public/footer-banner.jpg')}}" class="footer-banner" alt="Footer Banner">
        </div>

        <!-- Copyright -->
        <div class="text-center pt-4 pb-md-2">
          <p class="text-body-secondary fs-sm mb-0">&copy; {{date('Y')}} Gulf Realty. All rights reserved.
        </div>
      </div>
    </footer>