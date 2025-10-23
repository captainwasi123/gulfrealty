@extends('web.includes.master')
@section('addStyle')

@endsection
@section('content')


  <!-- Page content -->
  <main class="content-wrapper">
    <div class="container pt-4 pb-5 mb-xxl-3">

      <!-- Breadcrumb -->
      <nav class="pb-2 pb-sm-3 pb-lg-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('blogs')}}">Blog</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$data->heading}}</li>
        </ol>
      </nav>

      <div class="row pb-2 pb-sm-3 pb-md-4 pb-lg-5">

        <!-- Single post content -->
        <div class="col-lg-8">
          <h1 class="h3 mb-4">{{$data->heading}}</h1>

          <!-- Post meta + Sharing -->
          <div class="d-flex align-items-md-center justify-content-between border-bottom pb-4">
            <div class="nav flex-column flex-md-row fs-sm gap-2 gap-md-3 mb-lg-2">
              <a class="nav-link fw-semibold p-0" href="#!">by {{@$data->author->name}}</a>
              <span class="text-body-secondary">{{date('M d, Y', strtotime($data->created_at))}}</span>
            </div>
            <div class="d-flex mb-lg-2">

            </div>
          </div>

          <!-- Post content -->
          <div class="pt-4 mt-md-2">
            <p>{{$data->short_description}}</p>
            <figure class="figure w-100 pt-3 pt-lg-4 mb-3">
              <div class="ratio bg-body-tertiary mb-2" style="--fn-aspect-ratio: calc(370 / 856 * 100%)">
                <img src="{{URL::To('/public/storage/blogs/'.$data->banner)}}" class="figure-img rounded mb-0" alt="Image">
              </div>
            </figure>
            <div>
              {!! $data->description !!}
            </div>

          </div>
        </div>


        <!-- Sidebar that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
        <aside class="col-lg-4 col-xl-3 offset-xl-1">
          <div class="offcanvas-lg offcanvas-end ps-lg-4 ps-xl-0" id="blogSidebar">
            <div class="offcanvas-header border-bottom py-3">
              <h3 class="h5 offcanvas-title">Sidebar</h3>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#blogSidebar" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-block">

              <!-- Related posts list -->
              <h3 class="h5 mb-2">Related posts</h3>
              <ul class="nav flex-column gap-0">
                @foreach($related_blogs as $val)
                  <li class="nav-item">
                    <a class="nav-link hover-effect-underline fw-semibold border-bottom px-0 py-3" href="{{route('blogs.detail', $val->slug)}}">{{$val->heading}}</a>
                  </li>
                @endforeach
              </ul>
              <br>
              <!-- Related posts list -->
              <h3 class="h5 mb-2">Categories</h3>
              <ul class="nav flex-column gap-0">
                @foreach($categories as $val)
                  @if(count($val->blogs) > 0)
                    <li class="nav-item">
                      <a class="nav-link hover-effect-underline fw-semibold border-bottom px-0 py-3" href="{{route('blogs.category', $val->slug)}}">{{$val->name}} &nbsp;<small><small>({{count($val->blogs)}})</small></small></a>
                    </li>
                  @endif
                @endforeach
              </ul>

              <!-- Top offers -->
              <h3 class="h5 pt-4 mt-3">Recently Added</h3>
              <div class="vstack gap-3">
                  @foreach($properties as $val)
                    <!-- Listing -->
                    <div class="col">
                      <article class="card hover-effect-opacity h-100" data-map-bind-to-marker="1">
                        <div class="card-img-top position-relative bg-body-tertiary overflow-hidden">
                          <div class="swiper z-2" data-swiper='{
                            "pagination": {
                              "el": ".swiper-pagination"
                            },
                            "navigation": {
                              "prevEl": ".btn-prev",
                              "nextEl": ".btn-next"
                            },
                            "breakpoints": {
                              "991": {
                                "allowTouchMove": false
                              }
                            }
                          }'>
                            <a class="swiper-wrapper" href="{{URL::to('/properties/'.$val->slug)}}">
                              @foreach($val->images as $val2)
                              <div class="swiper-slide">
                                <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                                  <img src="{{URL::to('/public/storage/realestate/properties/'.$val2->image)}}" alt="Image">
                                  <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                                </div>
                              </div>
                              @endforeach
                            </a>
                            <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                              <span class="badge text-bg-info d-inline-flex align-items-center">
                                Verified
                                <i class="fi-shield ms-1"></i>
                              </span>
                              @if(strtotime($val->created_at) > strtotime('-7 days'))
                              <span class="badge text-bg-primary">&nbsp;&nbsp;New&nbsp;&nbsp;</span>
                              @endif
                            </div>

                            <div class="position-absolute top-50 start-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 ms-3">
                              <button type="button" class="btn btn-sm btn-prev btn-icon btn-light bg-light rounded-circle animate-slide-start" aria-label="Prev">
                                <i class="fi-chevron-left fs-lg animate-target"></i>
                              </button>
                            </div>
                            <div class="position-absolute top-50 end-0 z-1 translate-middle-y d-none d-lg-block hover-effect-target opacity-0 me-3">
                              <button type="button" class="btn btn-sm btn-next btn-icon btn-light bg-light rounded-circle animate-slide-end" aria-label="Next">
                                <i class="fi-chevron-right fs-lg animate-target"></i>
                              </button>
                            </div>
                            <div class="swiper-pagination bottom-0 mb-2" data-bs-theme="light"></div>
                          </div>
                        </div>
                        <div class="card-body p-3">
                          <div class="h5 mb-2 one-line-break">{{$val->title}}</div>
                          <h3 class="fs-sm fw-normal text-body mb-2">
                            <a class="stretched-link text-body one-line-break" href="{{URL::to('/properties/'.$val->slug)}}" title="{{$val->full_address}}">
                              <i class="fi-map-pin"></i> {{$val->full_address}}
                            </a>
                          </h3>
                          <div class="proper-block-footer">
                            <div>
                              <span class="badge text-bg-info">&nbsp;&nbsp;{{@$val->type->name}}&nbsp;&nbsp;</span>
                              <span class="badge text-bg-warning">&nbsp;&nbsp;{{$val->purpose}}&nbsp;&nbsp;</span>
                            </div>
                            <div class="h6 fs-sm mb-0">AED {{number_format($val->price)}}</div>
                          </div>
                        </div>
                      </article>
                    </div>
                    @endforeach
              </div>
            </div>
          </div>
        </aside>
      </div>

    </div>
  </main>

@endsection
@section('addScript')
  

@endsection