@extends('web.includes.master')
@section('metaAddition')

@endsection

@section('addStyle')

@endsection

@section('content')
	
	<!-- Page content -->
    <main class="content-wrapper">
      <div class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('about')}}">About Us</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Team</li>
          </ol>
        </nav>

        <!-- Page title -->
        <h1 class="h2 pb-lg-2 mb-4">Agents</h1>

    
        <!-- Listings grid views -->
        <div class="row row-cols-1 row-cols-lg-2 g-4">

          <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

                <!-- Listing -->
          <div class="col">
            <article class="card h-100 border-0 z-1 staff-card">
              <div class="card-body position-relative d-flex">
                <div class="flex-shrink-0">
                  <div class="d-md-none" style="width: 48px"></div>
                  <div class="d-none d-sm-block d-xl-none" style="width: 100px"></div>
                  <div class="d-none d-xl-block" style="width: 150px"></div>
                  <div class="ratio" style="--fn-aspect-ratio: calc(164 / 150 * 100%)">
                    <img src="{{URL::to('/public')}}/furqan.png" class="bg-body-secondary rounded" alt="Image">
                  </div>
                </div>
                <div class="w-100 ps-sm-4">
                  <div class="d-flex flex-wrap align-items-center justify-content-between ms-3 ms-sm-0 mb-2">
                    <h3 class="h5 me-2 mb-0">
                      <a class="hover-effect-underline stretched-link" href="javascript:void(0)">Furqan Shakir</a>
                    </h3>
                    <div class="d-flex align-items-center gap-1">
                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#bookAppointment" aria-controls="bookAppointment">
                        Request a call back
                      </button>
                    </div>
                  </div>
                  <div class="h6 fs-sm ms-3 ms-sm-0 mb-0">Agent</div>
                  <ul class="list-unstyled flex-row flex-wrap align-items-center gap-3 pt-3 ms-n5 ms-sm-0 mb-3">
                    <li class="badge text-bg-info d-inline-flex align-items-center me-n1">
                      Verified
                      <i class="fi-shield ms-1"></i>
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-star fs-base me-1"></i>
                      <strong>7</strong> &nbsp;Years experience
                    </li>
                    <li class="d-flex align-items-center fs-sm">
                      <i class="fi-award fs-base me-1"></i>
                      24 Sold
                    </li>
                  </ul>
                  <p class="fs-sm ms-n5 ms-sm-0 staff-desc">Dr. Davis is highly respected in her field, known for her innovative treatment plans and her ability to connect with young patients and their families.</p>
                </div>
              </div>
            </article>
          </div>

        </div>

      </div>
    </main>


@endsection

@section('addScript')

@endsection