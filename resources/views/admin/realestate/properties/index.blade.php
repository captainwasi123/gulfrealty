@extends('admin.layout.main')
@section('title', 'Properties')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Properties</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Properties</li>
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
                  <input type="text" name="retailer" placeholder="Search for Properties..." class="form-control searchBlog">
                  <i class="fas fa-search"></i>
                </div>
                <div class="col-md-3">
                  <a href="javascript:void(0)" class="btn btn-primary pull-right addblogButton" title="Add Blog"><i class="fas fa-plus"></i> Add Property</a>
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
                    <th width="25%">Title</th>
                    <th width="10%">Type</th>
                    <th width="10%">Purpose</th>
                    <th width="10%">Price</th>
                    <th width="10%">Location</th>
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
                    <th>Title</th>
                    <th>Type</th>
                    <th>Purpose</th>
                    <th>Price</th>
                    <th>Location</th>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form method="post" action="{{route('admin.realestate.properties.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Property</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <!-- Section: Basic Info -->
          <div class="mb-4">
              <h5 class="section-title">Basic Info</h5>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="title" class="form-label">Property Title</label>
                      <input type="text" class="form-control blogHeading" id="title" name="title" required>
                  </div>
                  <div class="col-md-6">
                      <label for="slug" class="form-label">Slug (URL)</label>
                      <input type="text" class="form-control blogSlug" id="slug" name="slug" required>
                  </div>
              </div>

              <div class="row mb-3">
                  <div class="col-md-4">
                      <label for="type" class="form-label">Property Type</label>
                      <select class="form-control" id="type" name="type" required>
                          <option value="" selected disabled>Select Type</option>
                          <optgroup label="Residential">
                            @foreach($propertyTypes as $val)
                              @if($val->category == 'Residential')
                                <option value="{{$val->id}}">{{$val->name}}</option>
                              @endif
                            @endforeach
                          </optgroup>

                          <optgroup label="Commercial">
                            @foreach($propertyTypes as $val)
                              @if($val->category == 'Commercial')
                                <option value="{{$val->id}}">{{$val->name}}</option>
                              @endif
                            @endforeach
                          </optgroup>

                          <optgroup label="Plots">
                            @foreach($propertyTypes as $val)
                              @if($val->category == 'Plots')
                                <option value="{{$val->id}}">{{$val->name}}</option>
                              @endif
                            @endforeach
                          </optgroup>
                      </select>
                  </div>
                  <div class="col-md-4">
                      <label for="purpose" class="form-label">Purpose</label>
                      <select class="form-control" id="purpose" name="purpose" required>
                          <option value="">Select Purpose</option>
                          <option value="Sale">Sale</option>
                          <option value="Rent">Rent</option>
                      </select>
                  </div>
                  <div class="col-md-4">
                      <label for="price" class="form-label">Price</label>
                      <input type="number" class="form-control" id="price" name="price" required>
                  </div>
              </div>
          </div>

          <!-- Section: Address -->
          <div class="mb-4">
              <h5 class="section-title">Address & Location</h5>
              <div class="row mb-3">
                  <div class="col-md-4">
                      <label for="country" class="form-label">Country</label>
                      <input type="text" class="form-control" id="country" name="country" value="UAE" readonly>
                  </div>
                  <div class="col-md-4">
                      <label for="city" class="form-label">City</label>
                      <input type="text" class="form-control" id="city" name="city" value="Dubai" readonly>
                  </div>
                  <div class="col-md-4">
                      <label for="area_name" class="form-label">Area / Locality</label>
                      <select class="form-control" id="area_name" name="area" required>
                        <option value="" selected disabled>Select</option>
                        @foreach($locations as $val)
                          <option value="{{$val->id}}">{{$val->name}}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="address" class="form-label">Full Address</label>
                      <input type="text" class="form-control" id="address" name="address" required>
                  </div>
                  <div class="col-md-3">
                      <label for="latitude" class="form-label">Latitude</label>
                      <input type="text" class="form-control" id="latitude" name="latitude" required>
                  </div>
                  <div class="col-md-3">
                      <label for="longitude" class="form-label">Longitude</label>
                      <input type="text" class="form-control" id="longitude" name="longitude" required>
                  </div>
              </div>
          </div>

          <!-- Section: Features & Amenities -->
          <div class="mb-4">
              <h5 class="section-title">Amenities</h5>

              <!-- Amenities checkboxes (can load dynamically from DB) -->
              <div class="row mb-3">
                  @foreach($amenities as $val)
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="amenities{{$val->id}}" value="{{$val->id}}" name="amenities[]">
                            <label class="form-check-label" for="amenities{{$val->id}}">{{$val->name}}</label>
                        </div>
                    </div>
                  @endforeach
              </div>
          </div>

          <!-- Section: Images -->
          <div class="mb-4">
              <h5 class="section-title">Property Images</h5>
              <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*" required>
              <div class="image-preview" id="imagePreview"></div>
          </div>

          <!-- Section: Description -->
          <div class="mb-4">
              <h5 class="section-title">Property Description</h5>
              <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection

@section('addStyle')
    <style>
        .image-preview {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .image-preview img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .section-title {
          border-bottom: 1px solid #dee2e6;
          margin-bottom: 15px;
          color: #fff;
          background-color: #03334f;
          padding: 6px 10px;
        }
    </style>
<style type="text/css">
  input[type="file"]{
    opacity: 1;
    position: relative;
  }
</style>
@endsection
@section('addScript')

<!-- JS for Image Preview -->
<script>
    const imagesInput = document.getElementById('images');
    const imagePreview = document.getElementById('imagePreview');

    imagesInput.addEventListener('change', function() {
        imagePreview.innerHTML = '';
        const files = imagesInput.files;
        if(files) {
            [...files].forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    imagePreview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }
    });

</script>
<script>



    

  $(function() {

      

    loadBlogs();

    $(document).on('keyup', '.searchBlog', function() {
      var val = $(this).val();
      if (val == '') {
        val = '--empty--';
      }
      var url = "{{URL::to('/admin/panel/realestate/properties/search')}}/" + val;

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
          $.get("{{URL::to('/admin/panel/realestate/properties/delete')}}/" + id, function(data) {
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
      $.get("{{URL::to('/admin/panel/realestate/properties/edit')}}/" + id, function(data) {
        $('#editBlogFormModal .modal-content').html(data);
        

      });
    });

    $(document).on('change', '#images2', function() {
      const files = this.files;
      const preview = $('#imagePreview2');
      preview.empty(); // clear old previews

      if (files && files.length > 0) {
          $.each(files, function (i, file) {
              const reader = new FileReader();
              reader.onload = function (e) {
                  $('<img>').attr('src', e.target.result).appendTo(preview);
              };
              reader.readAsDataURL(file);
          });
      }
    });


  });




  function loadBlogs() {
    @php $pu = !empty($_GET['page']) ? $_GET['page'] : 0;
    $pu = ($pu == 0 ? '' : '?page='.$pu);
    @endphp
    var url = "{{route('admin.realestate.properties.load').$pu}}";

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