@foreach($data as $key => $val)
<tr>
  <td>{{++$key}}</td>
  <td>{{$val->title}}</td>
  <td><small><i class="fas fa-images"></i></small>&nbsp;&nbsp; {{count($val->images)}}</td>
  <td>{{$val->user ? $val->user->username : ""}}</td>
  <td class="text-right"><small>{{date('d-M-Y | h:i A', strtotime($val->created_at))}}</small></td>

  <td class="text-right">
    <a class="btn btn-danger btn-sm deleteEpisode" href="javascript:void(0)" title="Delete Episode" data-id="{{base64_encode($val->id)}}"><small><i class="fas fa-trash"></i></small> &nbsp;Delete</a>
  </td>
</tr>
@endforeach
@if(count($data) == 0)
  <tr>
    <td colspan="8" class="text-center">No Record Found.</td>
  </tr>
@endif