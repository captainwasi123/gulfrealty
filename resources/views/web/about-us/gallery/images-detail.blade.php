<div class="container pop-title-container pt-2">
  <h2 class="mb-4 text-center">{{$event->title}}</h2>
  <p class="image-pop-para">{{$event->description}}</p>
</div>
<div class="container py-2">
  <div class="row g-3 gallery-image-block">
    @foreach($data as $val)
    <div class="col-md-6">
      <a href="{{URL::to('/public/storage/gallery/images/'.$val->image)}}"
         class="lightbox"
         data-lcl-thumb="{{URL::to('/public/storage/gallery/images/'.$val->image)}}"
         data-lcl-title="Image {{$val->id}}">
        <img src="{{URL::to('/public/storage/gallery/images/'.$val->image)}}"
             alt="Image - {{$val->id}}"
             class="gallery-img img-fluid">
      </a>
    </div>
    @endforeach
  </div>
</div>