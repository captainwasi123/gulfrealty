@extends('admin.layout.main')
@section('title', 'Staff')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Staff</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Staff</li>
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
                  <input type="text" name="retailer" placeholder="Search for Staff..." class="form-control searchBlog">
                  <i class="fas fa-search"></i>
                </div>
                <div class="col-md-3">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right addblogButton" title="Add Blog"><i class="fas fa-plus"></i> Add Staff</a>
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
                    <th width="10%">Image</th>
                    <th width="40%">Name</th>
                    <th width="15%">Experience</th>
                    <th width="10%">Created by</th>
                    <th width="10%" class="text-right">Created at</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody id="blogsTableBody">
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Experience</th>
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
      <form method="post" action="{{route('admin.team.staff.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Staff</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Designation</label>
                <input type="text" class="form-control" name="designation" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Experience</label>
                <input type="text" class="form-control" name="experience" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="5" required></textarea>
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

      

    loadBlogs();

    $(document).on('keyup', '.searchBlog', function() {
      var val = $(this).val();
      if (val == '') {
        val = '--empty--';
      }
      var url = "{{URL::to('/admin/panel/team/staff/search')}}/" + val;

      $('#blogsTableBody').html('<tr class="text-center"><td colspan="4"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
      $.get(url, function(data) {
        $('#blogsTableBody').html(data);
        //$('#categoryTable').DataTable();
      });
    });

    $('input[name="coupon_image"]').on('change', function() {
      readURL(this, $('.coupon-image-wrapper')); //Change the image
    });

    $(document).on('change', 'input[name="edit_mblog_image"]', function() {
      readURL(this, $('.edit-mblog-image-wrapper')); //Change the image
    });

    $(document).on('click', '.close-btn', function() { //Unset the image
      let file = $('input[name="coupon_image"]');
      $('.coupon-image-wrapper').css('background-image', 'unset');
      $('.coupon-image-wrapper').removeClass('file-set');
      file.replaceWith(file = file.clone(true));

      let file2 = $('input[name="edit_mblog_image"]');
      $('.edit-mblog-image-wrapper').css('background-image', 'unset');
      $('.edit-mblog-image-wrapper').removeClass('file-set');
      file2.replaceWith(file2 = file2.clone(true));
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
          $.get("{{URL::to('/admin/panel/team/staff/delete')}}/" + id, function(data) {
            Toast.fire({
              icon: 'success',
              title: 'Success! Video Successfully Deleted.'
            });
            loadBlogs();
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
      $.get("{{URL::to('/admin/panel/team/staff/edit')}}/" + id, function(data) {
        $('#editBlogFormModal .modal-content').html(data);
        make_editor("content2");
        
        $('#edit-tagsinput').tagsinput();
        $("#edit_blog_form .bootstrap-tagsinput>input").autocomplete({
            source: availableTags
        });
      });
    });


  });




  function loadBlogs() {
    @php $pu = !empty($_GET['page']) ? $_GET['page'] : 0;
    $pu = ($pu == 0 ? '' : '?page='.$pu);
    @endphp
    var url = "{{route('admin.team.staff.load').$pu}}";

    $('#blogsTableBody').html('<tr class="text-center"><td colspan="8"><img src="{{URL::to('/public/loader.gif')}}" height="30px"></td></tr>');
    $.get(url, function(data) {
      $('#blogsTableBody').html(data);
      //$('#categoryTable').DataTable();
    });
  }

  //FILE
  function readURL(input, obj) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        obj.css('background-image', 'url(' + e.target.result + ')');
        obj.addClass('file-set');
      }
      reader.readAsDataURL(input.files[0]);
    }
  };

</script>
@endsection