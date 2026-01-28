@extends('web.includes.master')
@section('addStyle')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lc-lightbox-lite@1.5.0/css/lc_lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/lc-lightbox-lite@1.5.0/skins/light.css">
@endsection
@section('content')

  <!-- Page content -->
    <main class="content-wrapper">

      <!-- Hero / page title -->
      <div class="position-relative py-5">
        <div class="container position-relative z-2 py-sm-2 py-md-4 py-lg-5 my-lg-3 my-xl-4">
          <h1 class="display-4 text-white mb-0 my-xxl-3">Gallery</h1>
        </div>
        <img src="{{URL::to('/public')}}/gallery.png" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip" alt="Background image">
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
                    <a class="nav-link text-nowrap" href="{{route('about.gallery.reels')}}">Reels</a>
                  </li>
                  <li class="nav-item me-1">
                    <a class="nav-link text-nowrap active" aria-current="page" href="javascript:void(0)">Images</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </section>


       <!-- Place details section -->
      <section class="container pt-4 pb-5 mb-xxl-3">

        <div class="row g-3 gallery-image-block">
          @foreach($data as $val)
          <div class="col-md-3">
            <article class="card h-100 hover-effect-scale bg-body-tertiary border-0">
              <div class="card-img-top position-relative overflow-hidden">
                <div class="d-flex flex-column gap-2 align-items-start position-absolute top-0 start-0 z-1 pt-1 pt-sm-0 ps-1 ps-sm-0 mt-2 mt-sm-3 ms-2 ms-sm-3">
                  <span class="badge text-bg-info d-inline-flex align-items-center">
                    <i class="fi-calendar ms-1"></i>&nbsp;
                    {{date('d M, Y', strtotime($val->created_at))}}
                  </span>
                  <span class="badge text-body-emphasis bg-body-secondary"><i class="fi-image ms-1"></i> {{count($val->images)}}</span>
                </div>
                <div class="ratio hover-effect-target" style="--fn-aspect-ratio: calc(204 / 306 * 100%)">
                  <img src="{{URL::to('/public/storage/gallery/images/'.$val->images[0]->image)}}" alt="Image">
                </div>
              </div>
              <div class="card-body pb-3">
                <h3 class="h6 mb-2">
                  <a class="hover-effect-underline stretched-link me-1 open-gallery-image" href="javascript:void(0)" data-id="{{base64_encode($val->id)}}">{{$val->title}}</a>
                </h3>
                <p class="image-para-desc">
                  {{$val->description}}
                </p>
              </div>
            </article>
          </div>
          @endforeach
          
        </div>
        <nav class="pt-3 mt-3" aria-label="Listings pagination">
          {{$data->links('vendor.pagination.default')}}
        </nav>

      </section>



    </main>

    <!-- Basic modal markup -->
    <div class="modal fade gallery-images-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

        </div>
      </div>
    </div>


@endsection
@section('addScript')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lc-lightbox-lite@1.5.0/js/lc_lightbox.lite.min.js"></script>
    <script>
      $(document).on('click', '.open-gallery-image', function() {
        var id = $(this).data('id');
        $('.gallery-images-modal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}"  style="margin:150px auto; height:40px">');
        $('.gallery-images-modal').modal('show');
        $.get("{{URL::to('/about/gallery/images/')}}/" + id, function(data) {
          $('.gallery-images-modal .modal-content').html(data);

          lc_lightbox('.lightbox', {
            wrap_class: 'lcl_fade_oc',
            gallery   : true,
            thumb: false,
            thumb_attr: 'data-lcl-thumb',
            skin      : 'light',
            radius    : 4,
            padding   : 0,
            border_w  : 0
          });

        });
      });


         
    </script>
@endsection