@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td><img src="{{URL::to('/public/storage/team/agents/'.$val->image)}}" height="45px"></td>
  <td>{{$val->name}}</td>
  <td><strong>{{$val->experience}}</strong> <small>years</small></td>
  <td><strong>{{$val->property_sold}}</strong> <small>Property Sold</small></td>
  <td>{{$val->user ? $val->user->username : ""}}</td>
  <td class="text-right"><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></td>

  <td class="text-right">
    <div class="btn-group">
      <button type="button" class="btn btn-info btn-sm">Action</button>
      <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
        <span class="sr-only">Action</span>
      </button>
      <div class="dropdown-menu dropdown-menu-right table-dropdown" role="menu">

        <a class="dropdown-item editBlog" href="javascript:void(0)" title="Edit Episode" data-id="{{base64_encode($val->id)}}"><i class="fas fa-edit"></i>Edit</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item text-danger deleteEpisode" href="javascript:void(0)" title="Delete Episode" data-id="{{base64_encode($val->id)}}"><i class="fas fa-trash"></i>Delete</a>


      </div>
    </div>
  </td>
</tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="8" class="text-center">No Record Found.</td>
  </tr>
@endif