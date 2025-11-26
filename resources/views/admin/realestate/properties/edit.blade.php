<form method="post" action="{{route('admin.realestate.properties.update')}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="property_id" value="{{base64_encode($data->id)}}">
<div class="modal-header">
  <h4 class="modal-title">Edit Property</h4>
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
                <input type="text" class="form-control eblogHeading" id="title" name="title" value="{{$data->title}}" required>
            </div>
            <div class="col-md-6">
                <label for="slug" class="form-label">Slug (URL)</label>
                <input type="text" class="form-control eblogSlug" id="slug" name="slug" value="{{$data->slug}}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <label for="type" class="form-label">Property Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="" selected disabled>Select Type</option>
                    <optgroup label="Residential">
                      @foreach($propertyTypes as $val)
                        @if($val->category == 'Residential')
                          <option value="{{$val->id}}" {{$data->property_type == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                        @endif
                      @endforeach
                    </optgroup>

                    <optgroup label="Commercial">
                      @foreach($propertyTypes as $val)
                        @if($val->category == 'Commercial')
                          <option value="{{$val->id}}" {{$data->property_type == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                        @endif
                      @endforeach
                    </optgroup>

                    <optgroup label="Plots">
                      @foreach($propertyTypes as $val)
                        @if($val->category == 'Plots')
                          <option value="{{$val->id}}" {{$data->property_type == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                        @endif
                      @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="col-md-2">
                <label for="purpose" class="form-label">Purpose</label>
                <select class="form-control" id="purpose" name="purpose" required>
                    <option value="">Select Purpose</option>
                    <option value="Sale" {{$data->purpose == 'Sale' ? 'selected' : ''}}>Sale</option>
                    <option value="Rent" {{$data->purpose == 'Rent' ? 'selected' : ''}}>Rent</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$data->price}}" required>
            </div>
            <div class="col-md-2 vertical-bottom">
                <div class="form-control">
                  <input type="checkbox"  id="etrending" name="trending" {{$data->trending == '1' ? 'checked' : ''}}>
                  <label for="etrending" class="form-label">&nbsp;&nbsp;Trending</label>
                  
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Brochure &nbsp;&nbsp;<small class="text-success">{{!empty($data->brochure) ? '(Uploaded)' : ''}}</small></label>
                <input type="file" class="form-control form-control-sm" name="brochure" accept="application/pdf">
            </div>
        </div>
    </div>

    <!-- Section: Address -->
    <div class="mb-4">
        <h5 class="section-title">Address & Location</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{$data->country}}" readonly>
            </div>
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{$data->city}}" readonly>
            </div>
            <div class="col-md-4">
                <label for="area_name" class="form-label">Area / Locality</label>
                <select class="form-control" id="area_name" name="area" required>
                  <option value="" selected disabled>Select</option>
                  @foreach($locations as $val)
                    <option value="{{$val->id}}" {{$data->location == $val->id ? 'selected' : ''}}>{{$val->name}}</option>
                  @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="address" class="form-label">Full Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$data->full_address}}" required>
            </div>
            <div class="col-md-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="{{$data->latitude}}" required>
            </div>
            <div class="col-md-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="{{$data->longitude}}" required>
            </div>
        </div>
    </div>

    <!-- Section: Features & Amenities -->
    <div class="mb-4">
        <h5 class="section-title">Amenities</h5>

        <!-- Amenities checkboxes (can load dynamically from DB) -->
        <div class="row mb-3">
            @foreach($amenities as $val)
              @php
                $valid = 0;
                foreach($data->amenities as $val2){
                  if($val->id == $val2->amenity_id){
                    $valid = 1;
                  }
                }
              @endphp
              <div class="col-md-3">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="amenities2{{$val->id}}" value="{{$val->id}}" name="amenities[]" {{$valid == '1' ? 'checked' : ''}}>
                      <label class="form-check-label" for="amenities2{{$val->id}}">{{$val->name}}</label>
                  </div>
              </div>
            @endforeach
        </div>
    </div>

    <!-- Section: Images -->
    <div class="mb-4">
        <h5 class="section-title">Property Images</h5>
        <input type="file" class="form-control" id="images2" name="images[]" multiple accept="image/*">
        <br>
        <div class="image-preview" id="imagePreview2">
          @foreach($data->images as $val)
            <img src="{{URL::to('/public/storage/realestate/properties/'.$val->image)}}">
          @endforeach
        </div>
    </div>

    <!-- Section: Description -->
    <div class="mb-4">
        <h5 class="section-title">Property Description</h5>
        <textarea class="form-control" id="description" name="description" rows="5" required>{{$data->description}}</textarea>
    </div>

</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>