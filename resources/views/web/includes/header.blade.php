<!-- Navigation bar (Page header) -->
<header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element>
  <div class="container">

    <!-- Mobile offcanvas menu toggler (Hamburger) -->
    <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar brand (Logo) -->
    <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0" href="{{URL::to('/')}}">
      <img src="{{URL::to('/public/logo.png')}}" alt="brand logo">
    </a>

    <!-- Main navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
    <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
      <div class="offcanvas-header py-3">
        <h5 class="offcanvas-title" id="navbarNavLabel">Explore </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body pt-2 pb-4 py-lg-0 mx-lg-auto">
        <ul class="navbar-nav position-relative">
          
          <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
            <a class="nav-link" href="{{route('properties.buy')}}">Buy</a>
          </li>
          <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
            <a class="nav-link sellPropertyBtn" href="javascript:void(0)">Sell</a>
          </li>
          <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
            <a class="nav-link" href="{{route('properties.rent')}}">Rent</a>
          </li>

          <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">Calculators</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('calculators.mortgage')}}">Mortgage Calculator</a></li>
              <li><a class="dropdown-item" href="">Property Calculator</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">About us</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('about')}}">About Gulf Realty</a></li>
              <li><a class="dropdown-item" href="{{route('about.ceo')}}">CEO Message</a></li>
              <li><a class="dropdown-item" href="{{route('about.team')}}">Our Team</a></li>
              <li><a class="dropdown-item" href="{{route('about.gallery')}}">Gallery</a></li>
            </ul>
          </li>

          <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
            <a class="nav-link" href="{{route('blogs.category', 'latest-updates')}}">Latest Updates</a>
          </li>

          <li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
            <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Button group -->
    <div class="d-flex relative gap-sm-1 mob-hide">

      <!-- Search Bar  -->
      <div class="header-search">
        <input type="text" name="search" id="searchfield" class="form-control" placeholder="Search...">
        <i class="fi-search fs-lg "></i>
      </div>
      <div class="header-search-tray">
        
      </div>
    </div>
  </div>
</header>