<form id="edit_blog_form" action="{{route('admin.gallery.videos.update')}}">
  @csrf
  <input type="hidden" name="video_id" value="{{base64_encode($data->id)}}">
  <div class="modal-header">
    <h4 class="modal-title">Edit Video</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">

    <div class="row">
      <div class="col-md-7">
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" value="{{$data->title}}" name="title" required>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label>Type</label>
          <select class="form-control" name="type" required>
            <option value="" disabled>Select</option>
            <option value="1" {{$data->type == '1' ? 'selected' : ''}}>Video</option>
            <option value="2" {{$data->type == '2' ? 'selected' : ''}}>Podcast</option>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Video Link</label>
          <input type="text" class="form-control" value="{{$data->video_link}}" name="video_link" required>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>