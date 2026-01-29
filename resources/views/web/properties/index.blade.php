@extends('web.includes.master')
@section('metaAddition')

@endsection

@section('addStyle')
<link
    rel="stylesheet"
    type="text/css"
    href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.19.0/maps/maps.css"
  />
  <style>
    .mapboxgl-popup-content {
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      padding: 0px;
      width: 220px;
    }

    .mapboxgl-popup-content img {
      width: 100% !important;
      height: 120px !important;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .mapboxgl-popup-content h4 {
      margin: 0;
      color: #03334f;
      text-align: left !important;
    }

    .mapboxgl-popup-content p {
      font-size: 12px;
      color: #555;
      margin: 5px 0 0 0;
      text-align: left;
    }
    .mapboxgl-popup-content a {
      font-size: 12px;
      color: #03334f;
      text-align: center;
      text-decoration: none;
      font-weight: 700;
    }
    .mapboxgl-popup-close-button {
        color: #fff;
        font-size: 22px;
    }
    .map-popup-data {
        padding: 4px 8px;
    }
  </style>
@endsection

@section('content')
	
	<!-- Page content -->
  <main class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sticky-top bg-body mb-2 mb-sm-1">
            <form method="get" action="{{route('properties.search')}}">

              <input type="hidden" name="purpose" value="{{empty($purpose) ? '' : $purpose}}">
              <div class="d-md-none" style="height: 64px;  margin-top: -64px"></div>
              <div class="d-none d-md-block d-lg-none" style="height: 72px;  margin-top: -72px"></div>
              <div class="d-none d-lg-block" style="height: 76px; margin-top: -76px"></div>
              <div class="d-flex gap-2 gap-sm-3 py-2 py-sm-3">
                <div class="position-relative w-100">
                  <select class="form-select border-1" name="location" data-select='{
                    "classNames": {
                      "containerInner": ["form-select"]
                    },
                    "searchEnabled": true,
                    "removeItemButton": false
                  }' aria-label="Location select">
                    <option value="" selected disabled><i class="fi-map-pin"></i> Location</option>
                    @foreach($locations as $val)
                      <option value="{{base64_encode($val->id)}}" {{!empty($request['location']) && $val->id == base64_decode($request['location']) ? 'selected' : ''}}><i class="fi-map-pin"></i> &nbsp;{{$val->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="dropdown flex-shrink-0 d-none d-xxl-block" style="width: 22%">
                  <select class="form-select border-1" name="type" data-select='{
                      "classNames": {
                        "containerInner": ["form-select"]
                      },
                    "removeItemButton": false
                    }' aria-label="Location select">
                      <option value="" selected disabled><i class="fi-home"></i> Property Types</option>
                      <optgroup label="Residential">
                        @foreach($propertyTypes as $val)
                          @if($val->category == 'Residential')
                            <option value="{{base64_encode($val->id)}}" {{!empty($request['type']) && $val->id == base64_decode($request['type']) ? 'selected' : ''}}><i class="fi-home"></i> &nbsp;{{$val->name}}</option>
                          @endif
                        @endforeach
                      </optgroup>

                      <optgroup label="Commercial">
                        @foreach($propertyTypes as $val)
                          @if($val->category == 'Commercial')
                            <option value="{{base64_encode($val->id)}}" {{!empty($request['type']) && $val->id == base64_decode($request['type']) ? 'selected' : ''}}><i class="fi-home"></i> &nbsp;{{$val->name}}</option>
                          @endif
                        @endforeach
                      </optgroup>

                      <optgroup label="Plots">
                        @foreach($propertyTypes as $val)
                          @if($val->category == 'Plots')
                            <option value="{{base64_encode($val->id)}}" {{!empty($request['type']) && $val->id == base64_decode($request['type']) ? 'selected' : ''}}><i class="fi-home"></i> &nbsp;{{$val->name}}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    </select>
                </div>
                <div class="dropdown flex-shrink-0 d-none d-xxl-block" style="width:20%">
                  <select class="form-select form-select-lg border-0 ps-3" data-select='{
                    "classNames": {
                      "containerInner": ["form-select"]
                    },
                    "removeItemButton": false
                  }' aria-label="Property type select" name="price_range">
                    <option value="" selected disabled><i class="fi-money-check"></i> Price</option>
                    <option value="under_500k" {{!empty($request['price_range']) && $request['price_range'] == 'under_500k' ? 'selected' : ''}}>Less than 500k</option>
                    <option value="500k_1m" {{!empty($request['price_range']) && $request['price_range'] == '500k_1m' ? 'selected' : ''}}>500k to 1M</option>
                    <option value="1m_5m" {{!empty($request['price_range']) && $request['price_range'] == '1m_5m' ? 'selected' : ''}}>1M to 5M</option>
                    <option value="5m_10m" {{!empty($request['price_range']) && $request['price_range'] == '5m_10m' ? 'selected' : ''}}>5M to 10M</option>
                    <option value="above_10m" {{!empty($request['price_range']) && $request['price_range'] == 'above_10m' ? 'selected' : ''}}>More than 10M</option>
                  </select>
                </div>
                <div class="dropdown flex-shrink-0 d-none d-xxl-block" style="width:15%">
                  <select class="form-select form-select-lg border-0 ps-3" data-select='{
                    "classNames": {
                      "containerInner": ["form-select"]
                    },
                    "removeItemButton": false
                  }' aria-label="Property type select" name="bedrooms">
                    <option value="" selected disabled><i class="fi-bed"></i> Bedrooms</option>
                    <option value="studio" {{!empty($request['bedrooms']) && $request['bedrooms'] == 'studio' ? 'selected' : ''}}>Studio</option>
                    <option value="1 Bedroom" {{!empty($request['bedrooms']) && $request['bedrooms'] == '1 Bedroom' ? 'selected' : ''}}>1 Bedroom</option>
                    <option value="2 Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '2 Bedrooms' ? 'selected' : ''}}>2 Bedrooms</option>
                    <option value="3 Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '3 Bedrooms' ? 'selected' : ''}}>3 Bedrooms</option>
                    <option value="4 Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '4 Bedrooms' ? 'selected' : ''}}>4 Bedrooms</option>
                    <option value="5 Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '5 Bedrooms' ? 'selected' : ''}}>5 Bedrooms</option>
                    <option value="6 Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '6 Bedrooms' ? 'selected' : ''}}>6 Bedrooms</option>
                    <option value="7 Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '7 Bedrooms' ? 'selected' : ''}}>7 Bedrooms</option>
                    <option value="7+ Bedrooms" {{!empty($request['bedrooms']) && $request['bedrooms'] == '7+ Bedrooms' ? 'selected' : ''}}>7+ Bedrooms</option>
                  </select>
                </div>
                

                <!-- Filters offcanvas toggle button -->
                <div class="position-relative">
                  <button type="submit" class="btn btn-icon btn-dark" data-bs-toggle="offcanvas" data-bs-target="#filters" aria-controls="filters" aria-label="Toogle filters">
                    <i class="fi-search fs-base"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </main>

  <main class="content-wrapper d-lg-flex">
    <div class="d-lg-flex flex-grow-1">

      <!-- Interactive map that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
      <div class="map-section">
        <div class="offcanvas-lg offcanvas-start d-flex flex-column w-100 h-100" id="map">
          <div class="offcanvas-body position-relative h-100 p-0">
            <div id="map"></div>
          </div>
        </div>
      </div>


      <!-- Listings with filters -->
      <div class="listings-section px-3 px-lg-4 pe-xxl-5">

        <!-- Sort selector -->
        <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3">
          {{$data->links('vendor.pagination.numbers')}}
          <div class="position-relative ms-auto" style="width: 150px">

          </div>
        </div>


        <!-- Listings grid -->
        <div class="row row-cols-1 row-cols-sm-2 g-4">
          @foreach($data as $val)
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
                    @php $i = 1; @endphp
                    @foreach($val->images as $val2)
                      @if($i <=3)
                        <div class="swiper-slide">
                          <div class="ratio d-block" style="--fn-aspect-ratio: calc(248 / 362 * 100%)">
                            <img src="{{URL::to('/public/storage/realestate/properties/'.$val2->image)}}" alt="Image">
                            <span class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background: linear-gradient(180deg, rgba(0,0,0, 0) 0%, rgba(0,0,0, .11) 100%)"></span>
                          </div>
                        </div>
                      @endif
                      @php $i++; @endphp
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
                  <div class="h6 fs-sm mb-0">AED - {{number_format_short($val->price)}}</div>
                </div>
              </div>
            </article>
          </div>
          @endforeach
        </div>
        @if(count($data) == 0)

          <div class="row">
            <div class="col-lg-12 text-center">
              <br><br><br><br>
                <img src="{{URL::to('/public/no-results.jpg')}}" width="280px" alt="No Results Found.">
            </div>
          </div>
        @endif

        <!-- Pagination -->
        <nav class="pt-3 mt-3" aria-label="Listings pagination">
          {{$data->links('vendor.pagination.default')}}
        </nav>
      </div>
    </div>
  </main>

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

    return $n_format  .' '. $suffix;
  }
?>

@endsection
@section('addStyle')
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
@endsection
@section('addScript')
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<script>
  mapboxgl.accessToken = "{{ env('MAPBOX_API') }}";

  // 📍 Property Locations
  const locations = [
    @foreach($data as $val)
      {
        name: "{{$val->title}}",
        slug: "{{$val->slug}}",
        price: "AED - {{ number_format_short($val->price) }}",
        lat: {{$val->latitude}},
        lng: {{$val->longitude}},
        image: "{{ URL::to('/public/storage/realestate/properties/'.$val->images[0]->image) }}"
      },
    @endforeach
  ];

  // 🗺️ Initialize Map
  const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/navigation-night-v1',
    center: [55.2744, 25.1972],
    zoom: 13,
    pitch: 65,
    bearing: -30,
    antialias: true
  });


  map.addControl(new mapboxgl.NavigationControl());

  map.on('load', () => {

     // 🔴 DEFAULT SCROLL ZOOM OFF
      map.scrollZoom.disable();

      // 🟢 CURSOR = CENTER ZOOM
      map.getCanvas().addEventListener(
        'wheel',
        (e) => {
          e.preventDefault();

          const zoomStep = e.deltaY < 0 ? 0.3 : -0.3;
          const newZoom = map.getZoom() + zoomStep;

          // 🖱️ Cursor wali location
          const cursorLngLat = map.unproject([e.offsetX, e.offsetY]);

          // 🔥 Cursor ko center bana do
          map.easeTo({
            center: cursorLngLat,
            zoom: newZoom,
            duration: 250,
            easing: (t) => t
          });
        },
        { passive: false }
      );
      
    /* =================================================
       REMOVE ALL LABELS (INCLUDING HIGHWAY NUMBERS)
       KEEP ONLY AREA / PLACE NAMES
    ================================================= */

    map.getStyle().layers.forEach(layer => {
      if (!layer.id) return;

      const id = layer.id.toLowerCase();

      if (
        // Roads & highways
        id.includes('motorway') ||
        id.includes('highway') ||

        // Highway numbers & shields (E311, D61, etc.)
        id.includes('shield') ||
        id.includes('route') ||
        id.includes('road-number') ||
        id.includes('ref') ||

        // POIs & transport
        id.includes('poi') ||
        id.includes('transit') ||
        id.includes('rail') ||
        id.includes('airport') ||

        // Other clutter
        id.includes('building-label') ||
        id.includes('waterway') ||
        id.includes('housenumber') ||
        id.includes('bridge') ||
        id.includes('tunnel')
      ) {
        try {
          map.setLayoutProperty(layer.id, 'visibility', 'none');
        } catch (e) {}
      }
    });

    // ✅ Explicitly KEEP only area names
    const areaLayers = [
      'place-label',
      'settlement-label',
      'locality-label',
      'district-label',
      'neighborhood-label'
    ];

    areaLayers.forEach(layerId => {
      if (map.getLayer(layerId)) {
        map.setLayoutProperty(layerId, 'visibility', 'visible');
      }
    });

    /* =================================================
       3D BUILDINGS
    ================================================= */
    map.addLayer({
      id: '3d-buildings',
      source: 'composite',
      'source-layer': 'building',
      filter: ['==', 'extrude', 'true'],
      type: 'fill-extrusion',
      minzoom: 13,
      paint: {
        'fill-extrusion-color': '#6b6b6b',
        'fill-extrusion-height': [
          'interpolate',
          ['linear'],
          ['zoom'],
          13, 0,
          15, ['get', 'height']
        ],
        'fill-extrusion-base': [
          'interpolate',
          ['linear'],
          ['zoom'],
          13, 0,
          15, ['get', 'min_height']
        ],
        'fill-extrusion-opacity': 0.85
      }
    });

    /* =================================================
       ATMOSPHERIC FOG (PREMIUM LOOK)
    ================================================= */
    map.setFog({
      color: 'rgb(15,15,25)',
      'high-color': 'rgb(36,92,223)',
      'space-color': 'rgb(11,11,25)',
      'horizon-blend': 0.2
    });

    /* =================================================
       MARKERS & POPUPS
    ================================================= */
    @if(count($data) > 0)
      const bounds = new mapboxgl.LngLatBounds();

      locations.forEach(loc => {

        const el = document.createElement('div');
        el.style.backgroundImage = "url('{{ URL::to('/public/marker.png') }}')";
        el.style.width = '36px';
        el.style.height = '36px';
        el.style.backgroundSize = 'cover';
        el.style.borderRadius = '50%';
        el.style.cursor = 'pointer';

        const popup = new mapboxgl.Popup({ offset: 25 }).setHTML(`
          <div>
            <img src="${loc.image}" style="width:100px;height:70px;border-radius:8px;object-fit:cover;margin-bottom:6px;">
            <h4 style="margin:0;font-size:14px;">${loc.name}</h4>
            <p style="margin:0;font-size:12px;">${loc.price}</p>
            <a href="{{ route('properties') }}/${loc.slug}" target="_blank" style="font-size:12px;">View Details</a>
          </div>
        `);

        new mapboxgl.Marker(el)
          .setLngLat([loc.lng, loc.lat])
          .setPopup(popup)
          .addTo(map);

        bounds.extend([loc.lng, loc.lat]);
      });

      map.fitBounds(bounds, { padding: 120, maxZoom: 15 });
    @endif
  });
</script>
@endsection