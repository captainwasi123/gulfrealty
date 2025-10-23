@extends('web.includes.master')
@section('addStyle')

@endsection
@section('content')

  <!-- Page content -->
    <main class="content-wrapper">

      <!-- Featured post -->
      <section class="position-relative bg-info py-5">
        <div class="container position-relative z-2 py-4 py-sm-5 my-xl-4 my-xxl-5">
          <div class="row py-md-2 py-lg-5 my-xxl-1">
            <div class="col-sm-8 col-md-5">
              <h2 class="text-white pb-0 pb-sm-1 mb-0">{{$data[0]->heading}}</h2>
              <p class="fs-sm two-line-break text-white mb-4">{{$data[0]->short_description}}</p>
              <a class="btn btn-lg btn-outline-light" href="{{route('blogs.detail', $data[0]->slug)}}">
                Read more
                <i class="fi-chevron-right fs-lg ms-1 me-n1"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="row position-absolute top-0 end-0 w-100 h-100 justify-content-end g-0">
          <div class="col-md-6 position-relative">
            <img src="{{URL::To('/public/storage/blogs/'.$data[0]->banner)}}" class="position-absolute top-0 end-0 w-100 h-100 object-fit-cover" alt="Image">
          </div>
          <div class="position-absolute top-0 start-0 w-100 h-100 bg-black z-1 opacity-50 d-md-none"></div>
        </div>
      </section>


      @if(empty($categoryPage))
        <!-- Selected articles -->
        <section class="container py-4 mt-2 mt-md-3 mt-lg-4 mt-xl-5">
          <div class="row gy-5">
            <div class="col-lg-12">
              <h3 class="h5 mb-0">
                  <a class="position-relative d-inline-flex align-items-center" href="{{route('blogs.category', 'latest-updates')}}">
                    <span class="hover-effect-underline stretched-link">Latest Updates</span>
                    <i class="fi-chevron-right fs-xl ms-2"></i>
                  </a>
                </h3>
            </div>
            @foreach($latest_updates as $val)
              <div class="col-md-6 col-lg-4">
                <article class="d-flex align-items-center gap-3 pe-xl-4 me-md-2">
                  <a class="ratio ratio-1x1 d-flex flex-shrink-0 hover-effect-scale rounded-2 overflow-hidden" href="{{route('blogs.detail', $val->slug)}}" style="width: 96px">
                    <img src="{{URL::To('/public/storage/blogs/'.$val->banner)}}" class="hover-effect-target" alt="Image">
                  </a>
                  <div>
                    <h3 class="h6 pb-1 mb-2">
                      <a class="hover-effect-underline" href="{{route('blogs.detail', $val->slug)}}">{{$val->heading}}</a>
                    </h3>
                    <div class="fs-xs text-body-secondary">{{date('M d, Y', strtotime($val->created_at))}}</div>
                  </div>
                </article>
              </div>
            @endforeach

          </div>

          <br>
          <hr>
        </section>
      @endif


      <!-- Blog posts grid -->
      <section class="container pb-5 {{!empty($categoryPage) ? 'py-5' : ''}} mb-xxl-3">
        <div class="pb-2 pb-sm-3 pb-md-4 pb-lg-5">

          <!-- Categories + Sorting select -->
          <div class="d-flex align-items-center justify-content-between pb-3 mb-2 mb-md-3">
            <ul class="nav nav-pills gap-2 d-none d-md-flex">
              <li class="nav-item me-1">
                <a class="nav-link {{!empty($categoryAll) ? 'active' : ''}}" aria-current="page" href="{{route('blogs')}}">All</a>
              </li>
              @foreach($categories as $val)
                @if(count($val->blogs) > 0)
                  <li class="nav-item me-1">
                    <a class="nav-link {{ !empty($category->slug) && $category->slug == $val->slug ? 'active' : ''}}" href="{{route('blogs.category', $val->slug)}}">{{$val->name}}</a>
                  </li>
                @endif
              @endforeach
            </ul>          
          </div>


          <!-- Posts grid -->
          <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gy-5">
            @foreach($data as $val)
              <!-- Article -->
              <article class="col mb-xl-2">
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

          <!-- Pagination -->
          <div>
            <br><br>
            {{$data->links('vendor.pagination.default')}}
          </div>
        </div>
      </section>
    </main>

@endsection
@section('addScript')
  

@endsection