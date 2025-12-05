<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-pwa="true">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{@$metaTags->title}}{{@$ametaTags['title']}}{{empty($metaTags->title) && empty($ametaTags['title']) ? env('APP_NAME') : ''}}</title>
    <meta name="description" content="{{@$metaTags->description}}{{@$ametaTags['description']}}">
    <meta name="keywords" content="{{@$metaTags->keywords}}{{@$ametaTags['keywords']}}">
    <meta name="host" content="{{URL::to('/')}}">
    @yield('metaAddition')
    <!-- Basic OG Tags -->
    <meta property="og:title" content="{{@$metaTags->title}}{{@$ametaTags['title']}}{{empty($metaTags->title) && empty($ametaTags['title']) ? env('APP_NAME') : ''}}" />
    <meta property="og:description" content="{{@$metaTags->description}}{{@$ametaTags['description']}}" />
    <meta property="og:url" content="{{@URL::current()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Rahaal - The Explorer" />

    <!-- Image OG Tag -->
    <meta property="og:image" content="{{empty($og_img) ? URL::to('/public/youtube-cover.jpg') : $og_img}}" />
    <meta property="og:image:alt" content="Image - {{@$metaTags->title}}{{@$ametaTags['title']}}{{empty($metaTags->title) && empty($ametaTags['title']) ? env('APP_NAME') : ''}}" />
    <meta property="og:image:type" content="image/*" />
    <meta property="og:image:width" content="620" />
    <meta property="og:image:height" content="340" />


    <!-- Additional Tags for Social Platforms -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{@$metaTags->title}}{{@$ametaTags['title']}}{{empty($metaTags->title) && empty($ametaTags['title']) ? env('APP_NAME') : ''}}" />
    <meta name="twitter:description" content="{{@$metaTags->description}}{{@$ametaTags['description']}}" />
    <meta name="twitter:image" content="{{empty($og_img) ? URL::to('/public/youtube-cover.jpg') : $og_img}}" />
    <meta name="twitter:site" content="@RahaalTheExplorer" />

    <link rel="canonical" href="{{@URL::current()}}" />
    
    <meta name="home_url" content="{{@URL::to('/')}}">
    
    <!-- Favicons -->
    <link href="{{URL::to('/public')}}/efavicon.png" rel="icon">
    <link href="{{URL::to('/public')}}/efavicon.png" rel="apple-touch-icon">

    @include('web.includes.style')
    @yield('addStyle')
    
    @foreach($headSnippet as $val)
      @if($val->position == 'Head')
        <!-- {{$val->name}} // Start -->
            {!! $val->snippet_code !!}
        <!-- {{$val->name}} // End -->
      @endif
    @endforeach


  </head>


  <!-- Body -->
  <body>

    @include('web.includes.header')

    @yield('content')

    
    @include('web.includes.footer')



    <div class="modal fade" id="sellPropertyModal" tabindex="-1" aria-labelledby="tourBookingLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
        <form class="modal-content" id="sell-enquiry-form" action="{{route('sell.enquiry.submit')}}">
          @csrf
          <input type="hidden" name="type" value="3">
          <div class="modal-header border-0">
            <div>
              <h2 class="h4 mb-0">Want to sell your Property?</h2>
              <p class="mb-0">Fill out the form and we will contact you withing 24 hours.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pb-4 pt-0">
            <div class="mb-3">
              <input type="text" class="form-control form-control-lg" name="name" placeholder="Full name *" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control form-control-lg text-start sell-email" name="email" placeholder="Email *" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control form-control-lg text-start" name="mainphone" id="phone-field" required="">
              <input type="hidden" name="phone" id="fullphone-field" required="">
            </div>
            <div class="mb-0">
              <textarea class="form-control form-control-lg" rows="5" name="description" placeholder="Your message *" required></textarea>
            </div>
          </div>
          <div class="modal-footer border-0 pt-0 pb-4 px-4">
            <button type="submit" class="btn btn-lg btn-primary w-100 m-0 mb-3">Submit</button>
            <div class="loading">
              <img src="{{URL::to('/public/loader-gif.gif')}}">
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Back to top button -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
      <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
        Top
        <i class="fi-arrow-right fs-base ms-1 me-n1 animate-target"></i>
        <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
        <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"/>
        </svg>
      </a>
    </div>

    <a href="https://api.whatsapp.com/send/?phone=97145914786" aria-label="Whatsapp Chat" id="whatsapp-chat" class="whatsapp-chat" target="_blank">
      <div class="whatsapp-icon-position">
        <img src="https://datamysite.com/public/whatsapp-icon.png" alt="Whatsapp Chat">
      </div>
    </a>
    @include('web.includes.scripts')
    @yield('addScript')
    
  </body>

</html>
