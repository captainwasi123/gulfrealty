<p class="text-bold">Search Results:</p>
@foreach($data as $key => $val)
    <a href="{{URL::to('/blog/'.$val->slug)}}" target="_blank">
      <div class="popular-card blog-card-2 flex-grow-1">
        <div class="card-image">
          <img src="{{URL::to('public/storage/blogs/'.$val->banner)}}" alt="{{$val->banner_alt}}">
        </div>
        <div class="popular-text">
          <h6 class="mt-2">{{$val->heading}}</h6>
          <p>{{$val->short_description}}</p>
          <small>by <font class="text-theme2">{{@$val->author->name}}</font> - <font class="text-bold">{{date('d-M-Y', strtotime($val->created_at))}}</font></small>
        </div>
      </div>
    </a>
@endforeach