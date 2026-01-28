@extends('web.includes.master')

@section('content')
	 <!-- Page content -->
    <main class="content-wrapper">



       <section class="container py-3 sell-property-section" id="sell-property-section">
        <form method="post" enctype="multipart/form-data" action="{{route('properties.sell.submit')}}">
          @csrf
          <div class="row py-1 py-sm-2 py-md-3 py-lg-4 py-xl-5">
            <div class="col-md-12">
                <h2 class="display-6 text-center">List/Sell your property in Dubai</h2>
                <br>
            </div>
            <div class="col-md-12 ">
                <h2 class="h6 mb-3">Tell us about yourserf</h2>
                
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Your Name *</label>
                    <input type="text" class="form-control form-control-lg" name="name" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Your Email *</label>
                    <input type="text" class="form-control form-control-lg" name="email" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Your Mobile *</label>
                    <input type="tel" class="form-control form-control-lg text-start" name="mobile" id="phone-field" required="">
                    <input type="hidden" name="phone" id="fullphone-field" required="">
                  </div>
                </div>
                <hr>
            </div>

            <div class="col-md-12 ">
                <h2 class="h6 mb-3">Tell us about your property</h2>
                <div class="row">
                  <div class="col-md-4">
                      <div class="nav nav-pills flex-wrap gap-1">
                        <div>
                          <input type="radio" class="btn-check" value="Sale" id="sell" name="type" checked>
                          <label class="nav-link" for="sell">Sale Property</label>
                        </div>
                        <div>
                          <input type="radio" class="btn-check" value="Rent" id="rent" name="type">
                          <label class="nav-link" for="rent">Rent Property</label>
                        </div>
                      </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Location *</label>
                    <select class="form-select form-select-lg" name="location_name" data-select='{
                      "classNames": {
                        "containerInner": ["form-select", "form-select-lg"]
                      },
                      "searchEnabled": true
                    }' required>
                      <option value="">Select</option>
                      @foreach($locations as $val)
                        <option value="{{$val->name}}">{{$val->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Property Type *</label>
                    <select class="form-select form-select-lg" name="propertyType" data-select='{
                      "classNames": {
                        "containerInner": ["form-select", "form-select-lg"]
                      }
                    }' required>
                      <option value="">Select</option>
                      <optgroup label="Residential">
                        @foreach($propertyTypes as $val)
                          @if($val->category == 'Residential')
                            <option value="{{$val->name}}"><i class="fi-home"></i> &nbsp;{{$val->name}}</option>
                          @endif
                        @endforeach
                      </optgroup>

                      <optgroup label="Commercial">
                        @foreach($propertyTypes as $val)
                          @if($val->category == 'Commercial')
                            <option value="{{$val->name}}"><i class="fi-home"></i> &nbsp;{{$val->name}}</option>
                          @endif
                        @endforeach
                      </optgroup>

                      <optgroup label="Plots">
                        @foreach($propertyTypes as $val)
                          @if($val->category == 'Plots')
                            <option value="{{$val->name}}"><i class="fi-home"></i> &nbsp;{{$val->name}}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Bedroom *</label>
                    <select class="form-select form-select-lg" name="bedrooms" data-select='{
                      "classNames": {
                        "containerInner": ["form-select", "form-select-lg"]
                      }
                    }' required>
                      <option value="">Select</option>
                      <option value="Studio">Studio</option>
                      <option value="1 Bedroom">1 Bedroom</option>
                      <option value="2 Bedrooms">2 Bedrooms</option>
                      <option value="3 Bedrooms">3 Bedrooms</option>
                      <option value="4 Bedrooms">4 Bedrooms</option>
                      <option value="5 Bedrooms">5 Bedrooms</option>
                      <option value="6 Bedrooms">6 Bedrooms</option>
                      <option value="7 Bedrooms">7 Bedrooms</option>
                      <option value="7+ Bedrooms">7+ Bedrooms</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <label class="form-label">Size Sqft *</label>
                    <input type="text" class="form-control form-control-lg" value="" name="size" required>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Unit No <small>(Optional)</small></label>
                    <input type="text" class="form-control form-control-lg" value="" name="unit_no" >
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Price *</label>
                    <input type="text" class="form-control form-control-lg" value="" name="price" required>
                  </div>
                </div>
                <hr>
            </div>
            <div class="col-md-12">
              <div class="image-picker-card">

                  <label class="image-upload-box">
                      <input type="file" id="imageInput" name="images[]" multiple accept="image/*">
                      <div class="upload-content">
                          <i class="bi bi-cloud-upload"></i>
                          <p>Click or Drag Images Here</p>
                          <small>Multiple images allowed</small>
                      </div>
                  </label>

                  <div id="previewContainer" class="row mt-4"></div>
              </div>

              <div class="text-center">
                <button class="btn btn-primary" type="submit">&nbsp;&nbsp;<i class="fi-send fs-lg"></i> &nbsp;&nbsp; Submit&nbsp;&nbsp;</button>
              </div>
              <hr>
            </div>
          </div>
        </form>
      </section>

      
       <!-- Hero with looped video playback -->
      <section class="position-relative py-4 mt-n2 mt-sm-0">
        <div class="container pt-sm-2 pt-md-3 pt-lg-4">
          <div class="text-center mx-auto" style="max-width: 820px">
            <h1 class="display-6 pb-sm-3 pb-2 pb-lg-0 mb-4 mb-lg-5">Sell Your Property in Dubai | Residential & Commercial | Free Valuation</h1>
          </div>

          <div class="row g-4">
            <div class="col-md-12 col-lg-12">
              <div class="hover-effect-scale position-relative bg-body-tertiary rounded overflow-hidden">
                <div class="ratio d-none d-lg-block" style="--fn-aspect-ratio: calc(335 / 856 * 100%)"></div>
                <div class="ratio d-none d-md-block d-lg-none" style="--fn-aspect-ratio: calc(404 / 521 * 100%)"></div>
                <div class="ratio d-none d-sm-block d-md-none" style="--fn-aspect-ratio: calc(420 / 697 * 100%)"></div>
                <div class="ratio d-sm-none" style="--fn-aspect-ratio: calc(400 / 443 * 100%)"></div>
                <img src="{{URL::to('/public/sell-hero.jpg')}}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Image">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-2 p-3">
                  <div class="d-flex align-items-end h-100 p-2 p-lg-3">
                    <div class="d-sm-flex align-items-end justify-content-between w-100 gap-4 gap-lg-5">
                      <div class="pb-1 pb-sm-0 mb-2 mb-sm-0">
                        <h3 class="pb-sm-1 mb-2">
                          <a class="hover-effect-underline stretched-link text-white" href="#!">We provide a complete service for the sale, purchase or rental of real estate.</a>
                        </h3>
                        <p class="text-white mb-0">It offers a comfortable living area leading to a formal dining room, gorgeous hardwood floors throughout, spacious renovated Island kitchen with granite countertops and stainless steel appliances. Additionally, revel in the convenience of a master bedroom featuring a built-in dressing room, complemented by a private bath and shower for added comfort. This inviting apartment is conveniently located close to transportation hubs, ensuring easy access to the city's heartbeat. It offers a comfortable living area </p>
                      </div>
                      <a class="btn btn-light position-relative rounded-pill z-2" href="#sell-property-section" >
                        Register Your Interest
                      </a>
                    </div>
                  </div>
                </div>
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-sm-none"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 d-none d-sm-block" style="background: linear-gradient(0deg, rgba(64,64,64, .74) 20%, rgba(0,0,0, 0) 65%)"></span>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Values (Features) -->
      <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
        <h2 class="h1 pb-sm-3 pb-sm-2 pb-lg-0 mb-2 mb-md-3 mb-lg-4 mb-xl-5">The values we live by</h2>
        <div class="row row-cols-1 row-cols-sm-2 gy-3 gy-md-4 gy-xl-5 gx-sm-5">
          <div class="col">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center pe-xl-4">
              <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="148" height="148"><circle cx="64" cy="65" r="31" fill="currentColor" style="color: var(--fn-primary-bg-subtle)"/><path class="text-primary" d="M95.152 64.237c0-17.085-13.83-30.915-30.915-30.915S33.322 47.153 33.322 64.237s13.83 30.915 30.915 30.915 30.915-13.83 30.915-30.915zm6.509 0c0 1.627-.163 3.254-.326 4.881a37.71 37.71 0 0 1-6.508 16.759c-2.441 3.58-5.532 6.671-9.112 9.112-6.02 4.231-13.505 6.834-21.478 6.834-20.664 0-37.424-16.76-37.424-37.424s16.759-37.424 37.424-37.424c15.783 0 29.288 9.763 34.82 23.593 1.628 4.068 2.604 8.786 2.604 13.668z" fill="currentColor"/><path d="M107.844 98.732l-9.112 9.112-.163.163-12.692-12.692-.163-.326c3.58-2.441 6.671-5.532 9.112-9.112l.325.163 12.691 12.692z" fill="currentColor" style="color: var(--fn-primary-border-subtle)"/><path class="text-primary" d="M119.234 110.122a6.48 6.48 0 1 1-9.275 9.274l-11.39-11.389.163-.163 9.112-9.112 11.39 11.39z" fill="currentColor"/><path data-bs-theme="light" d="M117.932 60.983v17.898h-9.763v-9.763h-6.345-.489l.326-4.881c0-4.881-.976-9.6-2.603-13.83l.326-.163 3.905-3.905 14.644 14.644zm-39.051 0v17.898h-11.39v-9.763h-6.508v9.763h-11.39V60.983l14.644-14.644 14.644 14.644z" fill="currentColor" style="color: var(--fn-primary-border-subtle)"/><path d="M114.678 122c-1.953 0-3.742-.814-5.207-2.115l-19.2-19.363c-.325-.325-.325-.814 0-1.139s.814-.326 1.139 0l19.2 19.363c1.139 1.139 2.441 1.627 4.068 1.627 1.464 0 2.929-.651 4.068-1.627 1.138-1.139 1.627-2.441 1.627-4.068s-.651-2.929-1.627-4.068l-10.902-10.901-4.068 4.067c-.325.326-.813.326-1.139 0s-.325-.813 0-1.139l4.556-4.555c.163-.163.326-.163.651-.163.163 0 .488.163.651.163l11.389 11.389c1.465 1.302 2.116 3.255 2.116 5.207s-.814 3.743-2.116 5.207c-1.464 1.301-3.253 2.115-5.206 2.115zm-50.441-19.525C43.085 102.475 26 85.39 26 64.237S43.085 26 64.237 26s38.237 17.085 38.237 38.237-17.084 38.238-38.237 38.238zm0-74.848c-20.176 0-36.61 16.434-36.61 36.61s16.434 36.61 36.61 36.61 36.61-16.434 36.61-36.61-16.433-36.61-36.61-36.61zm0 68.339a31.67 31.67 0 0 1-31.729-31.729 31.67 31.67 0 0 1 31.729-31.729 31.67 31.67 0 0 1 31.729 31.729 31.67 31.67 0 0 1-31.729 31.729zm0-61.83c-16.597 0-30.102 13.505-30.102 30.102s13.505 30.102 30.102 30.102 30.102-13.505 30.102-30.102-13.505-30.101-30.102-30.101zm39.214 60.854c-.163 0-.488 0-.651-.163l-3.417-3.417c-.163-.163-.163-.326-.163-.651s0-.488.163-.651c.325-.325.814-.325 1.139 0l3.417 3.417c.162.163.162.326.162.651s0 .488-.162.651-.325.163-.488.163zm14.481-15.295h-9.763c-.488 0-.813-.326-.813-.814v-9.763c0-.488.325-.814.813-.814s.814.325.814.814v8.949h8.136V61.308l-14.482-14.481c-.162-.163-.162-.325-.162-.651s0-.488.162-.651c.326-.325.814-.325 1.139 0L118.42 60.17l3.255 3.254c.162.163.162.325.162.651s0 .488-.162.651c-.326.325-.814.325-1.139 0l-1.79-1.79v15.946c0 .488-.326.814-.814.814zm-39.051 0h-11.39c-.488 0-.814-.326-.814-.814v-8.949h-4.881v8.949c0 .488-.326.814-.814.814h-11.39c-.488 0-.814-.326-.814-.814V62.935l-1.79 1.79c-.326.325-.814.325-1.139 0s-.326-.814 0-1.139l17.898-17.898c.326-.325.814-.325 1.139 0l14.644 14.644 3.254 3.254c.326.326.326.814 0 1.139s-.814.325-1.139 0l-1.79-1.79v15.946c-.163.488-.488.814-.976.814zm-10.576-1.627h9.763V61.309l-13.83-13.83-13.831 13.83v16.759h9.763v-8.949c0-.488.325-.814.814-.814h6.508c.488 0 .814.325.814.814v8.949z" fill="#111827"/></svg>
              <div class="ps-xl-4">
                <h3 class="h5">Advanced property search</h3>
                <p class="fs-sm mb-0">Enable users to filter properties by location, price range, property type, and other key criteria for a customized search experience.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center ps-xl-4">
              <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="148" height="148"><path d="M92.137 103.186H50.443a5.58 5.58 0 0 1-5.559-5.559V86.508 55.932a5.58 5.58 0 0 1 5.559-5.559h52.813 5.559a5.58 5.58 0 0 1 5.56 5.559v41.695a5.58 5.58 0 0 1-5.56 5.559h-5.559v11.119l-11.119-11.119z" fill="currentColor" style="color: var(--fn-warning-border-subtle)"/><path d="M103.256 39.254v11.119H50.442a5.58 5.58 0 0 0-5.559 5.559v30.576h-5.559a5.58 5.58 0 0 1-5.559-5.559V39.254a5.58 5.58 0 0 1 5.559-5.559h58.373a5.58 5.58 0 0 1 5.559 5.559z" fill="currentColor" style="color: var(--fn-warning-bg-subtle)"/><path d="M103.306 115c-.14 0-.418-.139-.557-.139l-13.922-13.898a.67.67 0 1 1 .975-.973l12.669 12.647v-9.451c0-.417.279-.695.696-.695h5.569c2.645 0 4.873-2.223 4.873-4.864V55.932c0-2.641-2.228-4.864-4.873-4.864H50.263c-2.645 0-4.873 2.224-4.873 4.864v41.695c0 2.641 2.227 4.864 4.873 4.864h34.805c.418 0 .696.278.696.695s-.278.695-.696.695H50.263c-3.48 0-6.265-2.779-6.265-6.254V55.932c0-3.474 2.784-6.254 6.265-6.254h58.472c3.481 0 6.265 2.78 6.265 6.254v41.695c0 3.475-2.784 6.254-6.265 6.254h-4.873v10.424c0 .278-.139.556-.417.695h-.139zM39.265 87.203c-3.48 0-6.265-2.78-6.265-6.254V39.254C33 35.78 35.784 33 39.265 33h58.472c3.48 0 6.265 2.78 6.265 6.254v5.559c0 .417-.279.695-.696.695s-.697-.278-.697-.695v-5.559c0-2.641-2.227-4.864-4.872-4.864H39.265c-2.645 0-4.873 2.224-4.873 4.864v41.695c0 2.641 2.227 4.865 4.873 4.865.418 0 .696.278.696.695s-.279.695-.696.695z" fill="#111827"/><path class="text-warning" d="M79.191 85.232l-.282-.195-.284.193-6.931 4.723-.02.014-.019.015c-.22.184-.519.295-.809.295a1.35 1.35 0 0 1-.746-.222c-.482-.336-.656-.92-.477-1.42l.003-.009.003-.009 2.721-8.625.107-.339-.285-.212-7.085-5.288-.007-.005-.007-.005c-.485-.336-.674-.885-.52-1.462.144-.539.655-.912 1.211-.912h8.676.372l.107-.356 2.717-9.023c.195-.531.682-.889 1.219-.889.556 0 1.067.373 1.211.912h0l.004.014 2.67 8.984.106.358h.373 8.728c.556 0 1.067.373 1.211.912.154.577-.036 1.127-.52 1.462l-.007.005-.007.005-7.085 5.288-.285.212.107.339 2.721 8.625h0l.002.008c.185.555-.04 1.142-.47 1.428a1.35 1.35 0 0 1-.749.224c-.273 0-.532-.098-.839-.318h0l-.006-.004-6.828-4.723z" fill="currentColor" stroke="#111827"/></svg>
              <div class="ps-xl-4">
                <h3 class="h5">User reviews and ratings</h3>
                <p class="fs-sm mb-0">Allow users to leave reviews and ratings for properties and real estate agents, helping others make more informed choices based on previous experiences.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center pe-xl-4">
              <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="148" height="148"><path class="text-info" d="M74 120.4c-4.64 0-9.6-1.12-9.6-1.12-17.44-4.32-30.4-20-30.4-38.88 0-1.6 0-3.04.32-4.64 5.12-.16 11.2.8 9.44 2.56-2.72 2.72-1.44 13.76 4.16 9.6s8.32-9.6 6.88-13.76 9.6-5.44 9.6 1.44-2.72 5.44-4.16 9.6 1.44 4.16 2.72 5.6c1.44 1.44 5.44 4.16 1.44 13.76-3.2 7.2 4.32 12.48 9.6 15.84zm27.52-37.28c2.72 2.72-2.72 4.16-4.16 8.32s-6.88 4.16-8.32 2.72-4.16-2.72-6.88-4.16 0-4.16 2.72-2.72 3.84-4.16 6.88-4.16c1.6 0 7.04-2.72 9.76 0zM89.2 43.44C100.56 48.08 109.36 58 112.72 70c-5.12 2.24-13.28 3.2-15.2 2.24-2.72-1.44-2.72-8.32-7.68-8.48-1.92 0-4.16 8.32-6.88 9.6-2.72 1.44-4.16-4.16-6.88-8.32s4.16-8.32 6.88-8.32 2.72-6.88 2.72-8.32-2.72-3.04-1.92-6.88c3.04.96 5.44 1.92 5.44 1.92zm-13.44 62.08c1.44 1.44 2.72 4.16 1.44 5.44-1.44 1.44-4.16 1.44-5.44 0-2.08-1.92 2.72-6.88 4-5.44z" fill="currentColor"/><path d="M77.2 110.96c1.44-1.44 0-4.16-1.44-5.44-1.44-1.44-6.08 3.52-4.16 5.44 1.44 1.44 4.16 1.44 5.6 0zm20.16-19.52c1.44-4.16 6.88-5.6 4.16-8.32s-8.32 0-9.6 0c-3.04 0-4.16 5.44-6.88 4.16-2.72-1.44-5.44 1.44-2.72 2.72 2.72 1.44 5.44 2.72 6.88 4.16 1.28 1.44 6.88 1.44 8.16-2.72zm16.32-16.64c.32 1.76.32 3.68.32 5.6 0 22.08-17.92 40-40 40-5.28-3.36-12.8-8.64-9.6-15.84 4.16-9.6 0-12.48-1.44-13.76-1.44-1.44-4.16-1.44-2.72-5.6s4.16-2.72 4.16-9.6-11.04-5.44-9.6-1.44c1.44 4.16-1.44 9.6-6.88 13.76s-6.88-6.88-4.16-9.6c1.92-1.92-4.16-2.88-9.44-2.56l.96-4.96c1.12-5.28 5.28-13.12 8.8-16.64 0 0 2.08-2.24 4.48-4L54.8 58l6.4-8c1.28-1.44 3.84-5.76 4.64-9.28h.32c2.72-.48 7.36-.32 8-.32 3.36 0 6.72.48 9.76 1.28-.8 3.84 1.92 5.44 1.92 6.88s0 8.32-2.72 8.32-9.6 4.16-6.88 8.32 4.16 9.6 6.88 8.32c2.72-1.44 4.96-9.76 6.88-9.6 4.8.16 4.8 7.2 7.68 8.48 1.92.96 10.08 0 15.2-2.24l.8 4.64z" fill="currentColor" style="color: var(--fn-info-border-subtle)"/><path class="text-primary" d="M56.4 38.8c0-.8-.8-1.6-1.6-1.6s-1.6.8-1.6 1.6.8 1.6 1.6 1.6 1.6-.8 1.6-1.6zm9.6 0c0 .64-.16 1.28-.16 1.92-.8 3.52-3.2 7.84-4.64 9.28l-6.4 8-6.24-7.84-.16-.16c-1.6-2.08-4.8-7.2-4.8-11.2a11.13 11.13 0 0 1 11.2-11.2A11.13 11.13 0 0 1 66 38.8z" fill="currentColor"/><path d="M74 121.2c-.16 0-.32 0-.48-.16-4-2.56-13.6-8.48-9.92-16.8 3.68-8.48.64-11.04-.8-12.48l-.32-.32c-.32-.32-.64-.48-1.12-.8-1.28-.8-3.2-1.92-1.92-5.6.64-1.76 1.44-2.56 2.08-3.36 1.12-1.12 1.92-2.08 1.92-5.92 0-2.08-1.28-3.04-2.24-3.52-1.92-.8-4.48-.48-5.44.48-.64.48-.48 1.12-.48 1.44 1.44 4.48-1.44 10.4-7.2 14.72-2.72 2.08-4.48.64-5.12-.16-2.08-2.56-2.24-8.64 0-10.72l.16-.16c-.32-.48-3.84-1.28-8.16-1.12-.16 1.28-.16 2.56-.16 3.84 0 18.08 12.16 33.76 29.76 38.08.48.16.64.48.64.96-.16.48-.48.64-.96.64C46 115.76 33.2 99.44 33.2 80.56c0-1.76.16-3.2.32-4.8v-.16c0-.16.16-.16.16-.32.16-.16.16-.16.32-.16h.16c.48 0 9.28-.32 10.4 2.08.16.32.32 1.12-.48 1.76-1.6 1.6-1.44 6.72.16 8.64.48.48 1.28 1.12 3.04-.16 5.28-3.84 7.84-9.12 6.56-12.96-.32-1.12-.16-2.24.8-3.04 1.6-1.44 4.8-1.76 7.2-.8 2.08.96 3.2 2.72 3.2 4.96 0 4.64-1.28 5.92-2.4 7.04-.64.64-1.28 1.44-1.76 2.88-.8 2.56 0 3.04 1.28 3.68.48.32.96.64 1.28.96l.32.32c1.76 1.6 5.28 4.96 1.28 14.4-2.56 6.08 3.04 10.88 9.12 14.72 21.44-.16 39.04-17.6 39.04-39.2 0-1.76-.16-3.68-.32-5.44 0-.48.32-.8.64-.96.48 0 .8.32.96.64.32 1.92.32 3.84.32 5.6 0 22.72-18.24 40.96-40.8 40.96zm.48-8.32c-1.28 0-2.4-.48-3.36-1.28-.64-.64-.8-1.6-.64-2.72.48-1.92 2.4-4 4-4.32.96-.32 1.6.16 1.76.32 1.6 1.6 3.2 4.8 1.44 6.72-.8.8-1.92 1.28-3.2 1.28zm.64-6.88c-.32 0-1.6.64-2.4 2.08-.48.8-.96 1.92-.48 2.4 1.12 1.12 3.36 1.12 4.32 0 .96-.96-.16-3.2-1.44-4.48h0zm16.8-10.24c-1.44 0-2.72-.32-3.36-1.12-1.28-1.28-4-2.72-6.72-4-1.76-.8-1.76-2.24-1.44-3.04.64-1.44 2.72-2.08 4.8-1.12.8.32 1.28 0 2.56-1.6.96-1.28 2.24-2.72 4-2.72.16 0 .8-.16 1.44-.32 2.4-.64 6.4-1.76 8.8.64.64.64.96 1.28.96 2.08 0 1.28-.96 2.24-2.08 3.36-1.12.96-2.24 2.24-2.72 3.68-.64 2.08-2.24 3.36-4.48 4-.48.16-1.12.16-1.76.16zm-8.48-8c-.8 0-1.28.32-1.44.64s.32.64.64.96c2.72 1.44 5.6 2.88 7.04 4.32.48.48 1.92.8 3.68.48.96-.16 2.72-.96 3.36-2.88s2.08-3.36 3.2-4.32c.8-.8 1.6-1.6 1.6-2.08 0-.32-.16-.64-.48-.96-1.76-1.76-4.96-.8-7.2-.16-.8.32-1.44.48-1.92.48-1.12 0-1.92.96-2.72 2.08-1.12 1.28-2.4 3.04-4.48 1.92-.48-.48-.8-.48-1.28-.48zM82 74.32c-1.92 0-3.2-2.56-4.48-5.12-.64-1.28-1.28-2.56-2.08-3.84-.96-1.44-.96-3.04-.16-4.64 1.6-2.88 5.76-4.96 7.68-4.96.96 0 1.92-1.92 1.92-7.52 0-.16-.32-.64-.64-1.12C83.6 46 82.48 44.4 82.8 42c-3.36-.8-7.04-1.12-10.56-.96-.48 0-.8-.32-.8-.8s.32-.8.8-.8c3.84-.16 7.84.32 11.68 1.28.48.16.64.48.64.96-.48 2.24.32 3.52 1.12 4.64.48.64.8 1.28.8 1.92 0 6.08-1.12 9.12-3.52 9.12-1.6 0-5.12 1.76-6.4 4-.64 1.12-.48 2.08.16 3.04.8 1.28 1.6 2.72 2.24 3.84 1.6 3.2 2.56 4.64 3.68 4.16 1.12-.64 2.4-3.04 3.36-5.12 1.44-2.72 2.24-4.64 3.84-4.64 3.36.16 4.8 3.04 5.92 5.44.64 1.44 1.28 2.72 2.08 3.2 1.44.8 8.64 0 13.92-1.92C108.4 58 99.92 48.56 88.88 44.08c-.48-.16-.64-.64-.48-1.12s.64-.64 1.12-.48c11.68 4.8 20.64 14.88 24 27.04v.16.32c0 .16-.16.16-.16.32l-.16.16c-5.12 2.24-13.6 3.36-15.84 2.24-1.28-.64-2.08-2.24-2.88-3.84-1.12-2.24-2.08-4.32-4.48-4.48-.48.16-1.6 2.4-2.4 3.84-1.28 2.4-2.56 4.96-4.16 5.76-.64.16-.96.32-1.44.32zM35.12 71.6h-.16c-.48-.16-.64-.48-.64-.96 1.28-5.6 5.44-13.44 8.96-16.96a.77.77 0 1 1 1.12 1.12c-3.36 3.2-7.36 11.04-8.48 16.16 0 .32-.32.64-.8.64zM54.8 58.8c-.32 0-.48-.16-.64-.32l-6.4-8c-1.92-2.56-4.96-7.68-4.96-11.68 0-6.56 5.44-12 12-12s12 5.44 12 12c0 4.32-3.52 10.08-4.96 11.68l-6.4 8c-.16.16-.32.32-.64.32zm0-30.4a10.38 10.38 0 0 0-10.4 10.4c0 3.52 3.04 8.64 4.64 10.72l5.76 7.2 5.76-7.2c1.6-1.92 4.64-7.2 4.64-10.72a10.38 10.38 0 0 0-10.4-10.4zm0 12.8c-1.28 0-2.4-1.12-2.4-2.4s1.12-2.4 2.4-2.4 2.4 1.12 2.4 2.4-1.12 2.4-2.4 2.4zm0-3.2c-.48 0-.8.32-.8.8s.32.8.8.8.8-.32.8-.8-.32-.8-.8-.8z" fill="#111827"/></svg>
              <div class="ps-xl-4">
                <h3 class="h5">Interactive map view</h3>
                <p class="fs-sm mb-0">Provide an interactive map that allows users to visually explore properties in their desired areas and view important local amenities.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center ps-xl-4">
              <svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="148" height="148"><path d="M54.272 49.009v54.745H36.983a5.78 5.78 0 0 0 5.763-5.762V49.009c0-3.169 2.593-5.763 5.763-5.763s5.763 2.593 5.763 5.763z" fill="currentColor" style="color: var(--fn-primary-bg-subtle)"/><path class="d-none d-block-dark opacity-25" d="M54.272 49.009v54.745H36.983a5.78 5.78 0 0 0 5.763-5.762V49.009c0-3.169 2.593-5.763 5.763-5.763s5.763 2.593 5.763 5.763z" fill="currentColor" style="color: var(--fn-secondary-bg)"/><path class="text-primary" d="M97.492 64.856v15.847H87.407v-8.644h-5.763v8.644H71.56V64.856L84.526 51.89l12.966 12.966z" fill="currentColor"/><g fill="currentColor" style="color: var(--fn-primary-bg-subtle)"><path d="M97.492 64.856L84.526 51.89 71.56 64.856v15.847h10.085v-8.644h5.763v8.644h10.085V64.856zm17.288-15.847v43.22h-.144c-.288-.576-.576-1.153-1.153-1.585l-2.881-2.881c-1.729-1.729-4.034-1.729-5.763 0l-2.881 2.881-14.551 14.551-1.441 1.441v8.644H54.271v-11.526-54.745a5.78 5.78 0 0 0-5.763-5.763h43.22 17.288a5.78 5.78 0 0 1 5.763 5.763z"/><path d="M114.492 92.229c.576 1.441.144 2.881-1.153 4.178l-2.881 2.881-4.322-4.322-4.322-4.322 2.881-2.881c1.729-1.729 4.034-1.729 5.763 0l2.881 2.881c.72.432 1.009 1.008 1.153 1.585zm-18.441 21.61l-1.441 1.441h-8.644v-8.644l1.441-1.441 4.322 4.322 4.322 4.322z"/></g><g class="d-none d-block-dark opacity-25" fill="currentColor" style="color: var(--fn-secondary-bg)"><path d="M97.492 64.856L84.526 51.89 71.56 64.856v15.847h10.085v-8.644h5.763v8.644h10.085V64.856zm17.288-15.847v43.22h-.144c-.288-.576-.576-1.153-1.153-1.585l-2.881-2.881c-1.729-1.729-4.034-1.729-5.763 0l-2.881 2.881-14.551 14.551-1.441 1.441v8.644H54.271v-11.526-54.745a5.78 5.78 0 0 0-5.763-5.763h43.22 17.288a5.78 5.78 0 0 1 5.763 5.763z"/><path d="M114.492 92.229c.576 1.441.144 2.881-1.153 4.178l-2.881 2.881-4.322-4.322-4.322-4.322 2.881-2.881c1.729-1.729 4.034-1.729 5.763 0l2.881 2.881c.72.432 1.009 1.008 1.153 1.585zm-18.441 21.61l-1.441 1.441h-8.644v-8.644l1.441-1.441 4.322 4.322 4.322 4.322z"/></g><path class="text-info" d="M110.602 99.288l-14.551 14.551-4.322-4.322 14.551-14.551 4.322 4.322zm-4.322-4.322l-14.551 14.551-4.322-4.322 14.551-14.551 4.322 4.322z" fill="currentColor"/><path d="M91.729 31.72v11.525h-43.22a5.78 5.78 0 0 0-5.763 5.763v48.983a5.78 5.78 0 0 1-5.763 5.763 5.78 5.78 0 0 1-5.763-5.763V31.72h60.508z" fill="currentColor" style="color: var(--fn-primary-bg-subtle)"/><path class="d-none d-block-dark opacity-25" d="M91.729 31.72v11.525h-43.22a5.78 5.78 0 0 0-5.763 5.763v48.983a5.78 5.78 0 0 1-5.763 5.763 5.78 5.78 0 0 1-5.763-5.763V31.72h60.508z" fill="currentColor" style="color: var(--fn-secondary-bg)"/><path d="M95.11 116h-8.644c-.432 0-.72-.288-.72-.72v-8.644c0-.144.144-.433.144-.577l18.873-18.873c1.008-1.008 2.161-1.441 3.313-1.441 1.297 0 2.45.576 3.458 1.441l2.881 2.881c1.009 1.008 1.441 2.161 1.441 3.458s-.576 2.449-1.441 3.314l-18.873 18.873c0 .144-.288.288-.432.288zm-7.924-1.441h7.636l.72-.72-7.636-7.636-.72.721v7.635zm6.051-5.042l3.314 3.314 13.542-13.543-3.313-3.314-13.543 13.542zm-4.322-4.322l3.314 3.314 13.542-13.543-3.313-3.314-13.543 13.542zm14.551-14.551l7.636 7.636 2.305-2.305c1.44-1.441 1.44-3.314 0-4.754l-2.882-2.881c-.72-.72-1.584-1.153-2.305-1.153-.864 0-1.728.432-2.305 1.153l-2.449 2.305zM80.703 116H54.771c-.432 0-.72-.288-.72-.72v-10.805h-7.924a.68.68 0 0 1-.72-.721c0-.432.288-.72.72-.72h7.924V49.008c0-2.737-2.305-5.043-5.042-5.043s-5.042 2.305-5.042 5.043v48.983c0 3.602-2.881 6.483-6.483 6.483S31 101.593 31 97.992V31.72c0-.432.288-.72.72-.72h60.508c.432 0 .72.288.72.72v5.763c0 .432-.288.72-.72.72s-.72-.288-.72-.72v-5.042H32.441v65.551c0 2.737 2.305 5.043 5.042 5.043s5.043-2.305 5.043-5.043V49.009c0-3.602 2.881-6.483 6.483-6.483s6.483 2.881 6.483 6.483v65.551h25.212a.68.68 0 0 1 .72.721c0 .432-.288.72-.72.72zm5.763-17.288H66.297c-.432 0-.72-.288-.72-.72s.288-.72.72-.72h20.17c.432 0 .72.288.72.72s-.288.72-.721.72zm8.644-8.644h-8.644c-.432 0-.72-.288-.72-.72s.288-.72.72-.72h8.644c.432 0 .72.288.72.72s-.288.72-.72.72zm-14.407 0H66.297c-.432 0-.72-.288-.72-.72s.288-.72.72-.72h14.407c.432 0 .72.288.72.72s-.288.72-.72.72zm34.577-5.763c-.433 0-.721-.288-.721-.72V49.008c0-2.737-2.305-5.043-5.042-5.043H59.093c-.432 0-.72-.288-.72-.72s.288-.72.72-.72h50.424c3.602 0 6.483 2.881 6.483 6.483v34.576c0 .433-.288.721-.72.721zm-17.288-2.881H87.907c-.432 0-.72-.288-.72-.72V72.78h-4.322v7.924c0 .432-.288.72-.72.72H72.059c-.432 0-.72-.288-.72-.72V66.585l-1.585 1.585c-.288.288-.72.288-1.008 0s-.288-.72 0-1.008l15.847-15.848c.288-.288.72-.288 1.008 0L98.568 64.28l2.881 2.881c.288.288.288.72 0 1.008s-.72.288-1.008 0l-1.585-1.585v14.119c-.144.432-.432.72-.864.72zm-9.365-1.441h8.644V65.144L85.025 52.898 72.78 65.144v14.839h8.644v-7.924c0-.432.288-.72.72-.72h5.763c.432 0 .72.288.72.72v7.924h0z" fill="#111827"/></svg>
              <div class="ps-xl-4">
                <h3 class="h5">Detailed property listings</h3>
                <p class="fs-sm mb-0">Include comprehensive property details, high-quality photos, and floor plans, ensuring users have all the information they need to make informed decisions.</p>
              </div>
            </div>
          </div>
        </div>
      </section>





      <!-- CEO address + Stats -->
      <section class="container pt-2 pt-sm-3 pt-md-4 pt-lg-5 pb-5 my-xxl-3">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h1 pb-2 mb-4">Trusted Clients Reviews</h2>
            <br>
          </div>
          <div class="col-md-12">
            <div class="ps-md-4 ps-xl-0">
              
              <div class="swiper" data-swiper='{
              "slidesPerView": 3,
              "spaceBetween": 0,
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
              },
              "autoplay": {
                "delay": 2000,
                "disableOnInteraction": false
              }
            }'>
              <div class="swiper-wrapper">

                  <!-- Testimonial -->
                  <figure class="swiper-slide p-2">
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

                  <figure class="swiper-slide p-2">
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

                  <figure class="swiper-slide p-2">
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

                  
                  <figure class="swiper-slide p-2">
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
                  
                  <figure class="swiper-slide p-2">
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
                  
                  <figure class="swiper-slide p-2">
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
                  
                  <figure class="swiper-slide p-2">
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

              <!-- Pagination (Bullets) -->
              <div class="swiper-pagination position-static mt-sm-2"></div>
            </div>

            </div>
          </div>
        </div>
      </section>



      <!-- FAQ (Accordion) -->
      <section class="container py-5 mb-xxl-3">
        <div class="row py-1 py-sm-2 py-md-3 py-lg-4 py-xl-5">
          <div class="col-md-12">
              <h2 class="display-6 text-center">FAQs</h2>
              <br>
          </div>
          <div class="col-md-12 ">

            <!-- Accordion of questions -->
            <div class="accordion" id="faq">

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-1">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1" aria-expanded="false" aria-controls="faqCollapse-1">
                    <span class="me-2">How do I start the process of buying a home?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-1" aria-labelledby="faqHeading-1" data-bs-parent="#faq">
                  <div class="accordion-body">The first step is to assess your financial situation and get pre-approved for a mortgage. This will give you a clear understanding of your budget. After that, you can start searching for properties that match your criteria and work with a real estate agent to guide you through the process.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-2">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2" aria-expanded="false" aria-controls="faqCollapse-2">
                    <span class="me-2">What should I consider when choosing a neighborhood?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-2" aria-labelledby="faqHeading-2" data-bs-parent="#faq">
                  <div class="accordion-body">Consider factors such as the proximity to schools, work, public transportation, safety, and local amenities like shops and parks. It’s also important to research the neighborhood's future development plans and property value trends.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-3">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3" aria-expanded="false" aria-controls="faqCollapse-3">
                    <span class="me-2">How much should I budget for closing costs?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-3" aria-labelledby="faqHeading-3" data-bs-parent="#faq">
                  <div class="accordion-body">Closing costs typically range from 2% to 5% of the home's purchase price. These costs can include loan origination fees, title insurance, attorney fees, and other related expenses. It's advisable to set aside additional funds for these costs.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-4">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4" aria-expanded="false" aria-controls="faqCollapse-4">
                    <span class="me-2">Is it better to rent or buy a home?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-4" aria-labelledby="faqHeading-4" data-bs-parent="#faq">
                  <div class="accordion-body">This depends on your personal financial situation, lifestyle, and long-term goals. Buying is often considered a good investment, but it requires a significant upfront cost and ongoing maintenance. Renting offers more flexibility and fewer responsibilities, but you won't build equity.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-5">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5" aria-expanded="false" aria-controls="faqCollapse-5">
                    <span class="me-2">How do I determine the right price to offer on a home?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-5" aria-labelledby="faqHeading-5" data-bs-parent="#faq">
                  <div class="accordion-body">Research comparable properties in the area that have recently sold to get a sense of the market value. Your real estate agent can also provide a comparative market analysis (CMA) to help determine a fair offer based on the property's condition, location, and market demand.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-6">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-6" aria-expanded="false" aria-controls="faqCollapse-6">
                    <span class="me-2">What should I look for during a home inspection?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-6" aria-labelledby="faqHeading-6" data-bs-parent="#faq">
                  <div class="accordion-body">During a home inspection, focus on the structural integrity of the property, including the roof, foundation, plumbing, electrical systems, and HVAC. Look for signs of water damage, mold, and pests. The inspector will provide a detailed report, which can be used to negotiate repairs or price adjustments.</div>
                </div>
              </div>

              <!-- Question -->
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeading-7">
                  <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-7" aria-expanded="false" aria-controls="faqCollapse-7">
                    <span class="me-2">What are the benefits of getting a pre-approved mortgage?</span>
                  </button>
                </h3>
                <div class="accordion-collapse collapse" id="faqCollapse-7" aria-labelledby="faqHeading-7" data-bs-parent="#faq">
                  <div class="accordion-body">Getting pre-approved for a mortgage shows sellers that you are a serious buyer and can afford the property. It also helps you set a realistic budget and speeds up the home-buying process since your financial documents are already in order.</div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

    
    </main>
@endsection

@section('addStyle')
  
  <style>
    .image-picker-card {
        background: #fff;
        border-radius: 14px;
        text-align: center;
    }

    .image-picker-card h4 {
        color: #03334f;
        font-weight: 600;
    }

    .image-upload-box {
        border: 2px dashed #03334f;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
        background: #fff;
    }

    .image-upload-box:hover {
        background: #03334f;
        color: #fff;
    }

    .image-upload-box:hover p,
    .image-upload-box:hover small,
    .image-upload-box:hover i {
        color: #fff;
    }

    .image-upload-box input {
        display: none;
    }

    .upload-content i {
        font-size: 45px;
        color: #03334f;
    }

    .upload-content p {
        font-size: 18px;
        margin-bottom: 5px;
        color: #000;
    }

    .upload-content small {
        color: #000;
    }

    /* Preview Images */
    .preview-box {
        position: relative;
        margin-bottom: 20px;
    }

    .preview-box img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #03334f;
    }

    .remove-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        background: #000;
        color: #fff;
        border-radius: 50%;
        border: none;
        width: 30px;
        height: 30px;
        font-size: 14px;
        cursor: pointer;
    }


  </style>

@endsection

@section('addScript')
  @if(session()->has('success') && session()->get('success') == 'property_sale')
      <script>
        $(document).ready(function () {
            Swal.fire({
              title: "Submission Successful!",
              text: "Thank you for sharing your property details. One of our expert agents will review the information and contact you shortly to guide you through the next steps.",
              icon: "success",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: () => {
                  // Change success icon color
                  const icon = Swal.getIcon();
                  if (icon) {
                      icon.style.color = "#03334f";
                      icon.style.borderColor = "#03334f";
                  }
              }
          });
        });
      </script>
  @endif
  <script>
    
    $(document).ready(function () {

        $("#imageInput").on("change", function () {
            let files = this.files;
            $("#previewContainer").html("");

            if (files.length > 0) {
                $.each(files, function (index, file) {
                    if (!file.type.startsWith("image/")) return;

                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let preview = `
                            <div class="col-md-3 col-sm-6 preview-box">
                                <button class="remove-btn">&times;</button>
                                <img src="${e.target.result}" alt="Image">
                            </div>
                        `;
                        $("#previewContainer").append(preview);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

        // Remove image preview
        $(document).on("click", ".remove-btn", function () {
            $(this).closest(".preview-box").remove();
        });

    });


  </script>

@endsection