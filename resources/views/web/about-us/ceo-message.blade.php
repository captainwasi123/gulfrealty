@extends('web.includes.master')

@section('content')
	 
  <!-- Page content -->
    <main class="content-wrapper">
      <div class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('about')}}">About</a></li>
            <li class="breadcrumb-item active" aria-current="page">CEO Message</li>
          </ol>
        </nav>

        <div class="row pb-2 pb-sm-3 pb-md-4 pb-lg-5">

          <!-- Doctor information + Reviews -->
          <div class="col-lg-8">

            <!-- Doctor information -->
            <div class="position-relative p-4 mb-4">
              <div class="position-relative z-1 p-xl-2">
                <div class="d-flex align-items-">
                  <div class="flex-shrink-0">
                    <div class="d-md-none" style="width: 48px"></div>
                    <div class="d-none d-sm-block d-md-none" style="width: 100px"></div>
                    <div class="d-none d-md-block" style="width: 172px"></div>
                    <div class="ratio" style="--fn-aspect-ratio: calc(214 / 172 * 100%)">
                      <img src="{{URL::to('/public')}}/assets/img/listings/doctors/01.jpg" class="rounded" alt="Image">
                    </div>
                  </div>
                  <div class="vstack ps-sm-4 ps-xl-5 ms-md-2 ms-xl-0">
                    <div class="d-flex align-items-start justify-content-between gap-3 pb-1 ms-3 ms-sm-0 mb-2">
                      <h1 class="h4 mb-0">Dr. Michael Johnston</h1>
                      <div class="d-flex align-items-center position-relative gap-1 mt-1">
                        <i class="fi-star-filled text-warning"></i>
                        <a class="fs-sm text-secondary-emphasis hover-effect-underline stretched-link text-decoration-none" href="#reviews">4.5</a>
                        <span class="fs-xs text-body-secondary align-self-end">(176)</span>
                      </div>
                    </div>
                    <div class="h6 fs-sm ms-3 ms-sm-0 pb-1 mb-2">Cardiologist</div>
                    <ul class="list-unstyled flex-row flex-wrap align-items-center text-nowrap pt-2 pt-sm-0 ms-n5 ms-sm-0 mb-0">
                      <li class="d-flex align-items-center gap-2 me-2">
                        <span class="badge text-bg-primary">21</span>
                        <span class="fs-sm text-dark-emphasis">years experience</span>
                      </li>
                      <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                        <i class="fi-user fs-base"></i>
                        Adults
                      </li>
                      <li class="d-flex align-items-center gap-1 fs-sm text-dark-emphasis me-2">
                        <i class="fi-baby fs-base"></i>
                        Children
                      </li>
                    </ul>
                    <figure class="pt-4 mt-auto ms-n5 ms-sm-0 mb-0">
                      <blockquote class="blockquote fs-base fw-medium">
                        <p>Dr. Johnston is a very knowledgeable cardiologist. He provided excellent care, improving my heart health. I'm very grateful!</p>
                      </blockquote>
                      <figcaption class="blockquote-footer d-flex mb-1">
                        Jerome Bell
                        <i class="fi-bullet align-self-center mx-1"></i>
                        Sep 13, 2024
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">About doctor</h2>
                <p class="fs-sm mb-0">Dr. Michael Johnston, a highly experienced cardiologist with over two decades in the field, provides comprehensive and advanced cardiovascular care. Known for his expertise in diagnosing and treating a wide range of heart conditions, Dr. Johnston combines cutting-edge medical techniques with personalized treatment plans to ensure the best possible outcomes for his patients. Whether it's managing chronic heart disease, performing complex procedures, or offering preventative care, Dr. Johnston's meticulous diagnostic analysis and patient-centered approach make him a trusted leader in cardiovascular health. Rely on his expertise to safeguard your heart health and improve your quality of life.</p>
                <dl class="pt-4 pt-md-5 mt-3 mt-md-0 mb-0">
                  <dt class="fs-sm mb-2">Citywide Heart Clinic</dt>
                  <dd class="d-flex flex-wrap gap-2 fs-sm mb-3">
                    <div class="d-flex align-items-center gap-1 me-2">
                      <i class="fi-map-pin fs-base"></i>
                      1.4 mi
                    </div>
                    <div class="me-2">201 E Randolph St, Chicago, IL 60602</div>
                    <div class="nav mt-n1">
                      <a class="nav-link position-relative gap-2 fs-xs py-1 px-0" href="#!">
                        <i class="fi-map fs-sm"></i>
                        <span class="hover-effect-underline stretched-link">Show on map</span>
                      </a>
                    </div>
                  </dd>
                  <dt class="fs-sm mb-2">Skyline Medical Center</dt>
                  <dd class="d-flex flex-wrap gap-2 fs-sm mb-0">
                    <div class="d-flex align-items-center gap-1 me-2">
                      <i class="fi-map-pin fs-base"></i>
                      3.2 mi
                    </div>
                    <div class="me-2">233 S Wacker Dr, Chicago, IL 60606</div>
                    <div class="nav mt-n1">
                      <a class="nav-link position-relative gap-2 fs-xs py-1 px-0" href="#!">
                        <i class="fi-map fs-sm"></i>
                        <span class="hover-effect-underline stretched-link">Show on map</span>
                      </a>
                    </div>
                  </dd>
                </dl>
                <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Procedures</h2>
                <div class="row row-cols-1 row-cols-sm-2 fs-sm gy-2">
                  <div class="col">
                    <ul class="mb-0">
                      <li>Electrocardiogram (ECG/EKG)</li>
                      <li>Echocardiogram</li>
                      <li>Stress Test</li>
                      <li>Cardiac Catheterization</li>
                      <li>Coronary Angiography</li>
                    </ul>
                  </div>
                  <div class="col">
                    <ul class="mb-0">
                      <li>Pacemaker Implantation</li>
                      <li>Balloon Angioplasty and Stenting</li>
                      <li>Holter Monitoring</li>
                      <li>Cardioversion</li>
                      <li>Heart Valve Repair/Replacement</li>
                    </ul>
                  </div>
                </div>
                <h2 class="h4 pt-4 pt-md-5 mt-3 mt-md-0">Education</h2>
                <ul class="list-unstyled fs-sm">
                  <li>
                    <span class="fw-medium text-body-emphasis">Harvard Medical School</span> - Doctor of Medicine (MD)
                  </li>
                  <li>
                    <span class="fw-medium text-body-emphasis">Johns Hopkins University</span> - Residency in Cardiovascular Medicine
                  </li>
                </ul>
              </div>
              <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow d-none-dark"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none d-block-dark"></span>
            </div>


            <!-- Reviews -->
            <div class="position-relative p-4 mt-4" id="reviews" style="scroll-margin-top: 98px">
              <div class="position-relative z-1 p-xl-2">
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <h2 class="h4 mb-0">Reviews</h2>
                  <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#reviewForm">
                    <i class="fi-edit-3 fs-base ms-n1 me-2"></i>
                    Add review
                  </button>
                </div>

                <!-- Rating breakdown -->
                <div class="row g-4 pb-3 mb-3">
                  <div class="col-sm-5 col-md-3 col-lg-4">
                    <div class="vstack h-100 position-relative">
                      <div class="d-flex flex-column align-items-center justify-content-center h-100 position-relative z-1 p-4">
                        <div class="h1 pb-2 mb-1">4.5</div>
                        <div class="hstack justify-content-center gap-1 fs-sm mb-2">
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-filled text-warning"></i>
                          <i class="fi-star-half text-warning"></i>
                        </div>
                        <div class="fs-sm">176 reviews</div>
                      </div>
                      <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none-dark"></span>
                      <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary rounded opacity-50 d-none d-block-dark"></span>
                    </div>
                  </div>
                  <div class="col-sm-7 col-md-9 col-lg-8">
                    <div class="vstack gap-3">
                      <div class="hstack gap-2">
                        <div class="hstack fs-sm gap-1">
                          5<i class="fi-star-filled text-warning"></i>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Five stars" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                          <div class="progress-bar bg-warning rounded-pill" style="width: 65%"></div>
                        </div>
                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">128</div>
                      </div>
                      <div class="hstack gap-2">
                        <div class="hstack fs-sm gap-1">
                          4<i class="fi-star-filled text-warning"></i>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Four stars" aria-valuenow="21" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                          <div class="progress-bar bg-warning rounded-pill" style="width: 21%"></div>
                        </div>
                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">27</div>
                      </div>
                      <div class="hstack gap-2">
                        <div class="hstack fs-sm gap-1">
                          3<i class="fi-star-filled text-warning"></i>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Three stars" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                          <div class="progress-bar bg-warning rounded-pill" style="width: 10%"></div>
                        </div>
                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">13</div>
                      </div>
                      <div class="hstack gap-2">
                        <div class="hstack fs-sm gap-1">
                          2<i class="fi-star-filled text-warning"></i>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Two stars" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                          <div class="progress-bar bg-warning rounded-pill" style="width: 5%"></div>
                        </div>
                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">6</div>
                      </div>
                      <div class="hstack gap-2">
                        <div class="hstack fs-sm gap-1">
                          1<i class="fi-star-filled text-warning"></i>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="One star" aria-valuenow="2.6" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
                          <div class="progress-bar bg-warning rounded-pill" style="width: 2.6%"></div>
                        </div>
                        <div class="fs-sm text-nowrap text-end" style="width: 40px;">2</div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Reviews -->
                <div class="vstack gap-4">

                  <!-- Rreview -->
                  <div class="vstack gap-2 mb-sm-2">
                    <div class="d-flex align-items-center gap-3 mb-1">
                      <h6 class="mb-0">Randy W.</h6>
                      <span class="fs-xs text-body-secondary">November 19, 2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm mb-1">
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                    </div>
                    <p class="fs-sm mb-1">Dr. Michael Johnston is truly a life-saver. His expertise and attention to detail are unmatched. He took the time to explain everything clearly and made sure I felt comfortable every step of the way. Thanks to him, my heart health is now better than ever. I highly recommend him!</p>
                    <div class="nav align-items-center">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                        <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                        6
                      </button>
                      <hr class="vr my-2 mx-3">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                        <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                        0
                      </button>
                    </div>
                  </div>

                  <!-- Rreview -->
                  <div class="vstack gap-2 mb-sm-2">
                    <div class="d-flex align-items-center gap-3 mb-1">
                      <h6 class="mb-0">Lora Palmer</h6>
                      <span class="fs-xs text-body-secondary">November 10, 2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm mb-1">
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                    </div>
                    <p class="fs-sm mb-1">From the first consultation, Dr. Johnston showed exceptional care and professionalism. His thorough approach to diagnosing my heart condition was impressive, and his treatment plan has worked wonders. I feel fortunate to have found such a knowledgeable and compassionate cardiologist.</p>
                    <div class="nav align-items-center">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                        <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                        13
                      </button>
                      <hr class="vr my-2 mx-3">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                        <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                        2
                      </button>
                    </div>
                  </div>

                  <!-- Rreview -->
                  <div class="vstack gap-2 mb-sm-2">
                    <div class="d-flex align-items-center gap-3 mb-1">
                      <h6 class="mb-0">Melissa Smith</h6>
                      <span class="fs-xs text-body-secondary">November 5, 2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm mb-1">
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                    </div>
                    <p class="fs-sm mb-1">Dr. Johnston was incredibly attentive and reassuring during a very stressful time for me. He made complex medical concepts easy to understand and guided me through the entire process. His expertise gave me confidence, and my heart is now in great shape. Five stars for sure!</p>
                    <div class="nav align-items-center">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                        <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                        8
                      </button>
                      <hr class="vr my-2 mx-3">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                        <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                        0
                      </button>
                    </div>
                  </div>

                  <!-- Rreview -->
                  <div class="vstack gap-2 mb-sm-2">
                    <div class="d-flex align-items-center gap-3 mb-1">
                      <h6 class="mb-0">Alice Cooper</h6>
                      <span class="fs-xs text-body-secondary">October 23, 2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm mb-1">
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                    </div>
                    <p class="fs-sm mb-1">I can't say enough good things about Dr. Johnston. His calm demeanor, vast knowledge, and caring nature set him apart. He listens carefully to all concerns and tailors treatments to each patient's needs. I'm grateful for the care I've received and highly recommend him to anyone seeking a top-notch cardiologist.</p>
                    <div class="nav align-items-center">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                        <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                        27
                      </button>
                      <hr class="vr my-2 mx-3">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                        <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                        3
                      </button>
                    </div>
                  </div>

                  <!-- Rreview -->
                  <div class="vstack gap-2 mb-sm-2">
                    <div class="d-flex align-items-center gap-3 mb-1">
                      <h6 class="mb-0">Natalia D.</h6>
                      <span class="fs-xs text-body-secondary">October 7, 2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm mb-1">
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star-filled text-warning"></i>
                      <i class="fi-star text-warning"></i>
                    </div>
                    <p class="fs-sm mb-1">Dr. Johnston is an excellent cardiologist and clearly knows his field well. My treatment has been effective, and I feel much healthier. The only reason for 4 stars is that the wait time for my appointment was longer than expected, but once I saw him, the care was outstanding.</p>
                    <div class="nav align-items-center">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 me-n1">
                        <i class="fi-thumbs-up fs-base animate-target me-1"></i>
                        15
                      </button>
                      <hr class="vr my-2 mx-3">
                      <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                        <i class="fi-thumbs-down fs-base animate-target me-1"></i>
                        0
                      </button>
                    </div>
                  </div>

                  <!-- Pagination -->
                  <nav class="pt-1 pt-sm-2 pb-2" aria-label="Reviews pagination">
                    <ul class="pagination">
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">
                          1
                          <span class="visually-hidden">(current)</span>
                        </span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">4</a>
                      </li>
                      <li class="page-item">
                        <span class="page-link pe-none">...</span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#!">36</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow d-none-dark"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none d-block-dark"></span>
            </div>
          </div>


          <!-- Sidebar with appointment booking form that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
          <div class="col-lg-4" style="margin-top: -100px">
            <div class="offcanvas-lg offcanvas-end sticky-lg-top" id="bookAppointment">
              <div class="d-none d-lg-block" style="height: 100px"></div>
              <div class="offcanvas-header pt-3">
                <h5 class="offcanvas-title">Book an appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#bookAppointment" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body position-relative d-block pt-0 p-lg-4">
                <div class="position-relative z-1 p-xl-2">
                  <h2 class="h5 mb-4 d-none d-lg-block">Book an appointment</h2>
                  <ul class="list-unstyled gap-1 fs-sm text-body-secondary mb-4">
                    <li>
                      <span class="fs-6 fw-semibold text-primary me-1">$75.00</span>
                      Online consultation
                    </li>
                    <li>
                      <span class="fs-6 fw-semibold text-dark-emphasis me-1">$90.00</span>
                      Visiting the clinic
                    </li>
                  </ul>
                  <div class="d-flex gap-4 pb-2 mb-1">
                    <div class="form-check form-switch">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="visit-method" checked>
                        Online
                      </label>
                    </div>
                    <div class="form-check form-switch">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="visit-method">
                        Visit clinic
                      </label>
                    </div>
                  </div>
                  <div class="btn-group w-100" role="group" aria-label="Date/time selection">
                    <input type="radio" class="btn-check" name="visit-day" id="visit-day-1" checked>
                    <label class="btn btn-outline-info w-100 px-2" for="visit-day-1">Mon, 11</label>
                    <input type="radio" class="btn-check" name="visit-day" id="visit-day-2" checked>
                    <label class="btn btn-outline-info w-100 px-2" for="visit-day-2">Tue, 12</label>
                    <input type="radio" class="btn-check" name="visit-day" id="visit-day-3">
                    <label class="btn btn-outline-info w-100 px-2" for="visit-day-3">Wed, 13</label>
                    <button type="button" class="btn btn-icon btn-outline-info flex-grow-0 px-2" aria-label="Next">
                      <i class="fi-chevron-right fs-lg"></i>
                    </button>
                  </div>
                  <div class="row row-cols-4 g-2 pt-4 pb-2">
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-1">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-1">10:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-2">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-2">10:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-3">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-3">11:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-4">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-4">11:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-5">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-5">12:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-6" checked>
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-6">12:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-7">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-7">13:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-8">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-8">13:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-9">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-9">14:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-10">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-10">14:30</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-11">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-11">15:00</label>
                    </div>
                    <div class="col">
                      <input type="radio" class="btn-check" name="visit-time" id="visit-time-12">
                      <label class="btn btn-outline-secondary w-100 rounded-pill px-2" for="visit-time-12">15:30</label>
                    </div>
                  </div>
                  <button type="button" class="btn btn-lg btn-primary w-100 mt-4">
                    <i class="fi-clock fs-lg me-2 ms-n1 d-lg-none d-xl-inline-flex"></i>
                    Next appointment 12:30, Tue, 12
                  </button>
                </div>
                <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block">
                  <span class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded shadow d-none-dark"></span>
                  <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded d-none d-block-dark"></span>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Nearby doctors -->
        <div class="d-flex align-items-start justify-content-between gap-4 pt-5 pb-3 mt-xxl-3 mb-2 mb-sm-3">
          <h2 class="h1 mb-0">Doctors nearby</h2>
          <div class="nav">
            <a class="nav-link position-relative text-nowrap py-1 px-0" href="listings-grid-doctors.html">
              <span class="hover-effect-underline stretched-link me-1">View all</span>
              <i class="fi-chevron-right fs-lg"></i>
            </a>
          </div>
        </div>

        <!-- Row of cards that turns into carousel on screens < 992px wide (lg breakpoint) -->
        <div class="swiper pb-2 pb-sm-3 pb-md-4 pb-lg-5" data-swiper='{
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
            "768": {
              "slidesPerView": 3
            },
            "992": {
              "slidesPerView": 4
            }
          }
        }'>
          <div class="swiper-wrapper">

            <!-- Card (Doctor listing) -->
            <div class="swiper-slide h-auto">
              <article class="card h-100 hover-effect-scale z-1 border-0">
                <div class="card-img-top bg-body-tertiary overflow-hidden">
                  <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(200 / 306 * 100%)">
                    <img src="{{URL::to('/public')}}/assets/img/listings/doctors/18.jpg" alt="Image">
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center gap-1 mb-2">
                    <i class="fi-star-filled text-warning"></i>
                    <span class="fs-sm text-secondary-emphasis">4.3</span>
                    <span class="fs-xs text-body-secondary align-self-end">(37)</span>
                  </div>
                  <h3 class="h5 mb-2">
                    <a class="hover-effect-underline stretched-link" href="#!">Dr. Peter Parker</a>
                  </h3>
                  <p class="fs-sm fw-semibold text-dark-emphasis mb-2">Orthopedic Surgeon</p>
                  <ul class="list-unstyled flex-wrap flex-row gap-2 fs-sm mb-0">
                    <li class="d-flex align-items-center me-2">
                      <i class="fi-map-pin me-1"></i>
                      1.5 mi
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="fi-user me-1"></i>
                      Adults
                    </li>
                  </ul>
                </div>
                <div class="card-footer bg-transparent border-0 h6 text-dark-emphasis pt-0 pb-4 mb-0">
                  $80.00
                </div>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-white rounded shadow d-none-dark"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-body-tertiary rounded d-none d-block-dark"></span>
              </article>
            </div>

            <!-- Card (Doctor listing) -->
            <div class="swiper-slide h-auto">
              <article class="card h-100 hover-effect-scale z-1 border-0">
                <div class="card-img-top bg-body-tertiary overflow-hidden">
                  <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(200 / 306 * 100%)">
                    <img src="{{URL::to('/public')}}/assets/img/listings/doctors/19.jpg" alt="Image">
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center gap-1 mb-2">
                    <i class="fi-star-filled text-warning"></i>
                    <span class="fs-sm text-secondary-emphasis">4.7</span>
                    <span class="fs-xs text-body-secondary align-self-end">(112)</span>
                  </div>
                  <h3 class="h5 mb-2">
                    <a class="hover-effect-underline stretched-link" href="#!">Dr. Gloria Fox</a>
                  </h3>
                  <p class="fs-sm fw-semibold text-dark-emphasis mb-2">Pediatrician</p>
                  <ul class="list-unstyled flex-wrap flex-row gap-2 fs-sm mb-0">
                    <li class="d-flex align-items-center me-2">
                      <i class="fi-map-pin me-1"></i>
                      1.3 mi
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="fi-baby me-1"></i>
                      Children
                    </li>
                  </ul>
                </div>
                <div class="card-footer bg-transparent border-0 h6 text-dark-emphasis pt-0 pb-4 mb-0">
                  $40.00
                </div>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-white rounded shadow d-none-dark"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-body-tertiary rounded d-none d-block-dark"></span>
              </article>
            </div>

            <!-- Card (Doctor listing) -->
            <div class="swiper-slide h-auto">
              <article class="card h-100 hover-effect-scale z-1 border-0">
                <div class="card-img-top bg-body-tertiary overflow-hidden">
                  <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(200 / 306 * 100%)">
                    <img src="{{URL::to('/public')}}/assets/img/listings/doctors/20.jpg" alt="Image">
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center gap-1 mb-2">
                    <i class="fi-star-filled text-warning"></i>
                    <span class="fs-sm text-secondary-emphasis">5.0</span>
                    <span class="fs-xs text-body-secondary align-self-end">(43)</span>
                  </div>
                  <h3 class="h5 mb-2">
                    <a class="hover-effect-underline stretched-link" href="#!">Dr. Peter Grokovski</a>
                  </h3>
                  <p class="fs-sm fw-semibold text-dark-emphasis mb-2">Dermatologist</p>
                  <ul class="list-unstyled flex-wrap flex-row gap-2 fs-sm mb-0">
                    <li class="d-flex align-items-center me-2">
                      <i class="fi-map-pin me-1"></i>
                      1.4 mi
                    </li>
                    <li class="d-flex align-items-center me-2">
                      <i class="fi-user me-1"></i>
                      Adults
                    </li>
                  </ul>
                </div>
                <div class="card-footer bg-transparent border-0 h6 text-dark-emphasis pt-0 pb-4 mb-0">
                  $55.00
                </div>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-white rounded shadow d-none-dark"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-body-tertiary rounded d-none d-block-dark"></span>
              </article>
            </div>

            <!-- Card (Doctor listing) -->
            <div class="swiper-slide h-auto">
              <article class="card h-100 hover-effect-scale z-1 border-0">
                <div class="card-img-top bg-body-tertiary overflow-hidden">
                  <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(200 / 306 * 100%)">
                    <img src="{{URL::to('/public')}}/assets/img/listings/doctors/21.jpg" alt="Image">
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center gap-1 mb-2">
                    <i class="fi-star-filled text-warning"></i>
                    <span class="fs-sm text-secondary-emphasis">4.8</span>
                    <span class="fs-xs text-body-secondary align-self-end">(95)</span>
                  </div>
                  <h3 class="h5 mb-2">
                    <a class="hover-effect-underline stretched-link" href="#!">Dr. Emily Johnson</a>
                  </h3>
                  <p class="fs-sm fw-semibold text-dark-emphasis mb-2">General Practitioner</p>
                  <ul class="list-unstyled flex-wrap flex-row gap-2 fs-sm mb-0">
                    <li class="d-flex align-items-center me-2">
                      <i class="fi-map-pin me-1"></i>
                      1.3 mi
                    </li>
                    <li class="d-flex align-items-center me-2">
                      <i class="fi-user me-1"></i>
                      Adults
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="fi-baby me-1"></i>
                      Children
                    </li>
                  </ul>
                </div>
                <div class="card-footer bg-transparent border-0 h6 text-dark-emphasis pt-0 pb-4 mb-0">
                  $35.00
                </div>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-white rounded shadow d-none-dark"></span>
                <span class="position-absolute top-0 start-0 w-100 h-100 z-n1 bg-body-tertiary rounded d-none d-block-dark"></span>
              </article>
            </div>
          </div>

          <!-- Pagination (Bullets) -->
          <div class="swiper-pagination position-static mt-3"></div>
        </div>
      </div>
    </main>


@endsection