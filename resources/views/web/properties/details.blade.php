@extends('web.includes.master')
@section('metaAddition')

@endsection

@section('addStyle')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lc-lightbox-lite@1.5.0/css/lc_lightbox.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/lc-lightbox-lite@1.5.0/skins/light.css">
<link
    rel="stylesheet"
    type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.19.0/maps/maps.css"
  />
  <style>
    .detail-map {
        height: 450px;
        width: 100%;
    }
  </style>
@endsection

@section('content')
	
	 <!-- Page content -->
    <main class="content-wrapper">
      <div class="container pt-4 pb-5 mb-xxl-3">

        <!-- Breadcrumb -->
        <nav class="pb-2 pb-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('properties')}}">Properties</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$data->title}}</li>
          </ol>
        </nav>

        <!-- Image gallery -->
        <div class="row g-3 g-lg-4">
          <div class="col-md-8">
            <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden lightbox" href="{{URL::to('/public/storage/realestate/properties/'.$data->images[0]->image)}}" data-lcl-thumb="{{URL::to('/public/storage/realestate/properties/'.$data->images[0]->image)}}"
         data-lcl-title="{{$data->title }}">
              <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
              <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
              <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(450 / 856 * 100%)">
                <img src="{{URL::to('/public/storage/realestate/properties/'.$data->images[0]->image)}}" alt="Image">
              </div>
            </a>
          </div>
          <div class="col-md-4 vstack gap-3 gap-lg-4">
            <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden lightbox" href="{{URL::to('/public/storage/realestate/properties/'.$data->images[1]->image)}}" data-lcl-thumb="{{URL::to('/public/storage/realestate/properties/'.$data->images[1]->image)}}"
         data-lcl-title="{{$data->title }}">
              <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
              <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
              <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(213 / 416 * 100%)">
                <img src="{{URL::to('/public/storage/realestate/properties/'.$data->images[1]->image)}}" alt="Image">
              </div>
            </a>
            <a class="hover-effect-scale hover-effect-opacity position-relative d-flex rounded overflow-hidden lightbox" href="{{URL::to('/public/storage/realestate/properties/'.$data->images[2]->image)}}" data-lcl-thumb="{{URL::to('/public/storage/realestate/properties/'.$data->images[2]->image)}}"
         data-lcl-title="{{$data->title }}">
              <i class="fi-zoom-in hover-effect-target fs-3 text-white position-absolute top-50 start-50 translate-middle opacity-0 z-2"></i>
              <span class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 bg-black bg-opacity-25 opacity-0 z-1"></span>
              <div class="ratio hover-effect-target bg-body-tertiary rounded" style="--fn-aspect-ratio: calc(213 / 416 * 100%)">
                <img src="{{URL::to('/public/storage/realestate/properties/'.$data->images[2]->image)}}" alt="Image">
              </div>
              <div class="btn btn-sm btn-light pe-none position-absolute end-0 bottom-0 z-2 mb-3 me-3">
                <i class="fi-camera fs-sm me-1 ms-n1"></i>
                {{count($data->images)}}
              </div>
            </a>
          </div>
        </div>
        <div class="d-none">
          @php $imgCount = count($data->images); @endphp
          @for($i=3; $i<$imgCount; $i++)
            <a class="lightbox" href="{{URL::to('/public/storage/realestate/properties/'.$data->images[$i]->image)}}" data-lcl-thumb="{{URL::to('/public/storage/realestate/properties/'.$data->images[$i]->image)}}" data-lcl-title="{{$data->title }}"></a>
          @endfor
        </div>

        <!-- Listing details -->
        <div class="row pt-4 pb-2 pb-sm-3 pb-md-4 py-lg-5 mt-sm-2 mt-lg-0">

          <!-- Content sections -->
          <div class="col-lg-8 col-xl-7 pb-3 pb-sm-0 mb-4 mb-sm-5 mb-lg-0">

            <!-- Badges + Sharing and wishlist buttons -->
            <div class="d-flex align-items-center justify-content-between gap-4 mb-3">
              <div class="d-flex gap-2">
                <span class="badge text-bg-info d-inline-flex align-items-center">
                  Verified
                  <i class="fi-shield ms-1"></i>
                </span>
                @if(strtotime($data->created_at) > strtotime('-7 days'))
                  <span class="badge text-bg-primary">New</span>
                @endif
              </div>
              <div class="d-flex gap-2">
              </div>
            </div>

            <!-- Price + Address + Facilities -->
            <div class="d-flex justify-content-between">
              <div class="h3 pb-1 mb-2">{{$data->title}}</div>
              <div class="h5 pb-1 mb-2">AED - {{number_format_short($data->price)}}</div>
            </div>
            <p class="fs-sm pb-1 mb-2"><i class="fi-map-pin"></i> {{$data->full_address}}</p>
            
            <!-- About -->
            <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">About</h2>
            <p class="fs-sm">{{$data->description}}</p>

            <!-- Amenities -->
            <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">Amenities</h2>
            <div class="row row-cols-2 row-cols-sm-3 fs-sm gy-3">
              @foreach($data->amenities as $val)
                <div class="col d-flex align-items-center">
                  <i class="{{@$val->amen->icon}} fs-lg me-2"></i>
                  {{@$val->amen->name}}
                </div>
              @endforeach
            </div>

            <!-- Location -->
            <h2 class="h5 pt-4 pt-sm-5 mt-3 mt-sm-0">Location</h2>

            <!-- Google map -->
            <div id="map" class="detail-map"></div>

            <!-- Meta + Sharing and wishlist buttons -->
            <div class="d-flex align-items-center justify-content-between gap-3 pt-4">
              <div class="d-flex gap-3 fs-sm">
                <div>Published: <span class="fw-medium text-dark-emphasis">{{date('M d, Y', strtotime($data->created_at))}}</span></div>
              </div>
              <div class="d-flex gap-2">
              </div>
            </div>
          </div>


          <!-- Sidebar with contact form that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
          <aside class="col-lg-4 offset-xl-1">
            <div class="d-none d-lg-block" style="margin-top: -105px"></div>
            <div class="sticky-lg-top">
              <div class="d-none d-lg-block" style="height: 105px"></div>
              
              @if(!empty($data->brochure))
                <div class="bg-body-tertiary rounded p-4">
                  <h2 class="h4 mb-0">Download Project Brochure</h2>
                  <p>Explore layouts, pricing, features, and more at a glance.</p>
                  <p class="text-center m-0">
                    <a href="javascript:void(0)" class="btn btn-default btn-brochure">Brochure &nbsp;&nbsp;<i class="fi fi-download"></i></a>
                  </p>
                </div>
                <br>
              @endif
              <div class="bg-body-tertiary rounded p-4">
                <form id="property-enquiry-form" action="{{route('property.enquiry.submit')}}">
                  @csrf
                  <input type="hidden" name="property_name" value="{{$data->title}}">
                  <input type="hidden" name="property_slug" value="{{$data->slug}}">
                  <h2 class="h4 mb-0">Are you interested?</h2>
                  <p class="mb-4">Fill out the form and we will contact you withing 24 hours.</p>
                  <div class="mb-3">
                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Full name *" required>
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control form-control-lg text-start property-email" name="email" placeholder="Email *" required>
                  </div>
                  <div class="mb-3">
                    <input type="tel" class="form-control form-control-lg text-start" name="mainphone" id="phone-field" required="">
                    <input type="hidden" name="phone" id="fullphone-field" required="">
                  </div>
                  <div class="mb-4">
                    <textarea class="form-control form-control-lg" rows="5" name="description" placeholder="Your message *" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-lg btn-dark w-100">Schedule a tour</button>
                  <div class="loading">
                    <img src="{{URL::to('/public/loader-gif.gif')}}">
                  </div>
                </form>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </main>


    <div class="modal fade" id="DownloadBrochureModal" tabindex="-1" aria-labelledby="tourBookingLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
        <form class="modal-content" id="brochure-download-form" action="{{route('brochure.download.submit')}}">
          @csrf
          <input type="hidden" name="property_name" value="{{$data->title}}">
          <div class="modal-header border-0">
            <div>
              <h2 class="h4 mb-0">Get Instant Access</h2>
              <p class="mb-0">Fill in your basic details to download the complete project brochure.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-4 pt-0">
            <div class="mb-3">
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Full name *" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control form-control-lg text-start brochure-email" name="email" placeholder="Email *" required>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0 pb-4 px-4">
            <button type="submit" class="btn btn-lg btn-primary w-100 m-0 mb-3">Download</button>
            <div class="loading brochure-loading">
              <img src="{{URL::to('/public/loader-gif.gif')}}">
            </div>
          </div>
        </form>
      </div>
    </div>
<?php
  function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
      // 0 - 900
      $n_format = number_format($n, $precision);
      $suffix = '';
    } else if ($n < 900000) {
      // 0.9k-850k
      $n_format = number_format($n / 1000, $precision);
      $suffix = 'K';
    } else if ($n < 900000000) {
      // 0.9m-850m
      $n_format = number_format($n / 1000000, $precision);
      $suffix = 'M';
    } else if ($n < 900000000000) {
      // 0.9b-850b
      $n_format = number_format($n / 1000000000, $precision);
      $suffix = 'B';
    } else {
      // 0.9t+
      $n_format = number_format($n / 1000000000000, $precision);
      $suffix = 'T';
    }

    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
    // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ( $precision > 0 ) {
      $dotzero = '.' . str_repeat( '0', $precision );
      $n_format = str_replace( $dotzero, '', $n_format );
    }

    return $n_format .' '. $suffix;
  }
?>

@endsection

@section('addScript')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lc-lightbox-lite@1.5.0/js/lc_lightbox.lite.min.js"></script>
<script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.19.0/maps/maps-web.min.js"></script>
<script src="{{URL::to('/public')}}/assets/js/enquiry.js"></script>
<script>
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


  $(document).on('click', '.btn-brochure', function(){

      $('#DownloadBrochureModal').modal('show');
  });

  $(document).on("submit", "#brochure-download-form", function (event) {

        $(".brochure-loading").css({display:"block"});
        var form = $(this);
        var formData = new FormData($("#brochure-download-form")[0]);

        let isValid = true;
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Email validation
        let email = $(".brochure-email").val().trim();
        if (email === "" || !emailPattern.test(email)) {
            Toast.fire({
                icon: "warning",
                title: "Please Enter valid Email address",
            });
            isValid = false;
        } else {
            isValid = true;
        }

        if (isValid) {
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: formData,
                dataType: "json",
                encode: true,
                processData: false,
                contentType: false,
            })
            .done(function (data) {
                if (data.success == "success") {
                  $(".brochure-loading").css({display:"none"});


                  $('#DownloadBrochureModal').modal('hide');

                  $("#brochure-download-form")[0].reset();

                  var link=document.createElement('a');
                   document.body.appendChild(link);
                   link.download = "GulfRealty - {{$data->title}}";
                   link.target = '_blank';
                   link.href= "{{URL::to('/public/storage/realestate/properties/brochure/'. $data->brochure)}}";
                   link.click();

                   
                } else {
                    Toast.fire({
                        icon: "warning",
                        title: data.message,
                    });
                }
            })
            .fail(function (e) {
                $(".brochure-loading").css({display:"none"});
                Toast.fire({
                    icon: "warning",
                    title: 'Something went wrong! Try again later.',
                });
            });
        }
        event.preventDefault();
    });
</script>
<script>
  const apiKey = "{{env('TOMTOM_API')}}";

  // 📍 Single location (example shown for one record)
  const propertyLocation = {
    name: "{{$data->title}}",
    lat: {{$data->latitude}},
    lng: {{$data->longitude}},
    image: "{{URL::to('/public/storage/realestate/properties/'.$data->images[0]->image)}}"
  };

  // 🗺️ Initialize map
  const map = tt.map({
    key: apiKey,
    container: "map",
    center: [propertyLocation.lng, propertyLocation.lat],
    zoom: 13,
    language: "en-GB"
  });

  map.on('load', () => {
    // Hide road numbers and shields
    map.getStyle().layers.forEach(layer => {
      const id = layer.id.toLowerCase();
      if (id.includes('road-number') || id.includes('shield')) {
        map.setLayoutProperty(layer.id, 'visibility', 'none');
      }
    });

    // 🧭 Add zoom controls
    map.addControl(new tt.NavigationControl());

    // 📍 Create custom marker
    const markerElement = document.createElement("div");
    markerElement.style.backgroundImage = "url('{{URL::to('/public/marker.png')}}')";
    markerElement.style.backgroundSize = "cover";
    markerElement.style.width = "40px";
    markerElement.style.height = "40px";
    markerElement.style.borderRadius = "50%";
    markerElement.style.cursor = "pointer";

    // Add marker to map (no popup)
    new tt.Marker({ element: markerElement })
      .setLngLat([propertyLocation.lng, propertyLocation.lat])
      .addTo(map);
  });
</script>
@endsection