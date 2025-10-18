<div class="col-lg-12">
  <br>
  <h2 class="text-thorn">Top Stories</h2>
</div>

@foreach($top_stories as $val)
  @if(!empty($val->blog->heading))
    <div class="col-lg-4 mt-0">
      <a href="{{URL::to('/blog/'.$val->blog->slug)}}">
        <div class="blog-portrait-card box-shadow">
          
          <div class="popular-card blog-card-2 flex-grow-1">
            <div class="card-image">
              <img src="{{URL::to('public/storage/blogs/'.$val->blog->banner)}}" alt="{{$val->blog->banner_alt}}">
            </div>
            <div class="popular-text padding-h-6">
              <h6 class="mt-2">{{$val->blog->heading}}</h6>
              <p class="line-break-3">{{$val->blog->short_description}}</p>
              <small>by <font class="text-theme2">{{@$val->blog->author->name}}</font> - <font class="text-bold">{{date('M d, Y', strtotime($val->blog->created_at))}}</font></small>
            </div>
          </div>
        </div>
      </a>
    </div>
  @endif
@endforeach