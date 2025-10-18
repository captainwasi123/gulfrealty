@extends('web.includes.master')
@section('addStyle')

@endsection
@section('content')

  <!-- Page content -->
    <main class="content-wrapper">

      <!-- Hero / page title -->
      <div class="position-relative py-5">
        <div class="container position-relative z-2 py-sm-2 py-md-4 py-lg-5 my-lg-3 my-xl-4">
          <h1 class="display-4 text-white mb-0 my-xxl-3">Gallery</h1>
        </div>
        <img src="{{URL::to('/public')}}/assets/img/contact/v2/hero.jpg" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip" alt="Background image">
        <span class="position-absolute top-0 start-0 w-100 h-100 z-1 rtl-flip" style="background: linear-gradient(-270deg, rgba(0,0,0, .60) 0%, rgba(0,0,0, 0) 100%)"></span>
      </div>



      <!-- Reviews + Places nearby -->
      <section class="container mt-5">
        <div class="row">

          <!-- Reviews -->
          <div class="col-md-12 mb-5 mb-md-0">
            <div class="d-flex align-items-center justify-content-between gap-4">
              <div class="overflow-x-auto">
                <ul class="nav nav-pills flex-nowrap gap-2">
                  <li class="nav-item me-1">
                    <a class="nav-link text-nowrap" href="{{route('about.gallery')}}">Videos</a>
                  </li>
                  <!-- <li class="nav-item me-1">
                    <a class="nav-link text-nowrap" href="{{route('about.gallery.podcasts')}}">Podcasts</a>
                  </li> -->
                  <li class="nav-item me-1">
                    <a class="nav-link text-nowrap active" aria-current="page" href="javascript:void(0)">Reels</a>
                  </li>
                  <li class="nav-item me-1">
                    <a class="nav-link text-nowrap" href="{{route('about.gallery.images')}}">Images</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </section>



       <!-- Place details section -->
      <section class="container pt-4 pb-5 mb-xxl-3">

        
        <div class="row">
          @foreach($data as $val)
            <div class="col-lg-3">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/{{$val->reel_link}}/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">

              </blockquote>
              <script async src="{{URL::to('/public/assets/js/insta.js')}}"></script>
            </div>
          @endforeach

        </div>

      </section>

    </main>

@endsection
@section('addScript')

@endsection