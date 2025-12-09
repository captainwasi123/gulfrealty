<ul>
  @foreach($data as $key => $val)
    <li>
      <a href="{{route('blogs.detail', $val->slug)}}" target="_blank"><p>{{$val->heading}}</p></a>
    </li>
  @endforeach
</ul>