<form method="post" action="{{route('admin.team.staff.update')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="staff_id" value="{{base64_encode($data->id)}}">
<div class="modal-header">
  <h4 class="modal-title">Edit Staff</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-md-12">
      <img src="{{URL::to('/public/storage/team/staff/'.$data->image)}}" height="120px">
      <br>
      <div class="form-group">
        <input type="file" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Designation</label>
        <input type="text" class="form-control" name="designation" value="{{$data->designation}}" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Experience</label>
        <input type="text" class="form-control" name="experience" value="{{$data->experience}}" required>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" rows="5" required>{{$data->description}}</textarea>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>