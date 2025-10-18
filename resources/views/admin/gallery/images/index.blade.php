@extends('admin.layout.main')
@section('title', 'Images')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Images</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Images</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-9 searchbar">
                  <input type="text" name="retailer" placeholder="Search for Images..." class="form-control searchBlog">
                  <i class="fas fa-search"></i>
                </div>
                <div class="col-md-3">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right addblogButton" title="Add Blog"><i class="fas fa-plus"></i> Add Images</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="blogsTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="45%">Title</th>
                    <th width="20%">Images</th>
                    <th width="10%">Created by</th>
                    <th width="10%" class="text-right">Created at</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="blogsTableBody">
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
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Images</th>
                    <th>Created by</th>
                    <th class="text-right">Created at</th>
                    <th class="text-right">Action</th>
                  </tr>
                </tfoot>
              </table>
              <div class="row ">
                <div class="col-lg-12 text-right">
                  <br>
                  {{ $data->links() }}
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<div class="modal fade" id="addBlogFormModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="{{route('admin.gallery.images.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Images</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" required></textarea>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Images</label>
                <input type="file" class="form-control" name="images[]" accept="image/png, image/jpg, image/jpeg" multiple required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="editBlogFormModal">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
@section('addStyle')

<style type="text/css">
  input[type="file"]{
    opacity: 1;
    position: relative;
  }
</style>
@endsection
@section('addScript')
<script>



    

  $(function() {

    

    $(document).on('keyup', '.searchBlog', function() {
      var val = $(this).val();
      if (val == '') {
        val = '--empty--';
      }
      var url = "{{URL::to('/admin/panel/gallery/images/search')}}/" + val;

      $('#blogsTableBody').html('<tr class="text-center"><td colspan="4"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
      $.get(url, function(data) {
        $('#blogsTableBody').html(data);
        //$('#categoryTable').DataTable();
      });
    });

    $(document).on('keyup', '.blogHeading', function() {
      var a = $(this).val();

      $('.blogMetaTitle').val(a);

      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.blogSlug').val(b);
    });

    $(document).on('keyup', '.eblogHeading', function() {
      var a = $(this).val();

      $('.eblogMetaTitle').val(a);

      var b = a.toLowerCase().replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
      $('.eblogSlug').val(b);
    });


    $(document).on('submit', "#add_blog_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#add_blog_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $(".ck-blurred p").html("");
          $('#addBlogFormModal').modal('hide');
          setTimeout(function(){
            location.reload(true);
          }, 1000);
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });


    $(document).on('submit', "#edit_blog_form", function(event) {
      var form = $(this);
      var formData = new FormData($("#edit_blog_form")[0]);
      //console.log(formData);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        processData: false,
        contentType: false,
      }).done(function(data) {
        if (data.success == 'success') {
          Toast.fire({
            icon: 'success',
            title: data.message
          });
          $('.close-btn').click();
          form.trigger("reset");
          $(".ck-blurred p").html("");
          $('#editBlogFormModal').modal('hide');
          loadBlogs();
        } else {
          Toast.fire({
            icon: 'error',
            title: data.errors
          });
        }
      });

      event.preventDefault();
    });



    $(document).on('click', '.deleteEpisode', function() {
      var id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.get("{{URL::to('/admin/panel/gallery/images/delete')}}/" + id, function(data) {
            Toast.fire({
              icon: 'success',
              title: 'Success! Video Successfully Deleted.'
            });
            setTimeout(function(){

              location.reload();
            }, 1000);
          });
        }
      });
    });


    $(document).on('click', '.addblogButton', function() {
      $('#addBlogFormModal').modal({
        focus: false
      });
    });

    $(document).on('click', '.editBlog', function() {
      var id = $(this).data('id');
      $('#editBlogFormModal .modal-content').html('<img src="{{URL::to('/public/loader.gif')}}" height="50px" style="margin:150px auto;">');
      $('#editBlogFormModal').modal({
        focus: false
      });
      $.get("{{URL::to('/admin/panel/gallery/images/edit')}}/" + id, function(data) {
        $('#editBlogFormModal .modal-content').html(data);
        make_editor("content2");
        
        $('#edit-tagsinput').tagsinput();
        $("#edit_blog_form .bootstrap-tagsinput>input").autocomplete({
            source: availableTags
        });
      });
    });


  });

</script>
@endsection