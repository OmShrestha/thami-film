<form id="ajaxForm" class="modal-form"
      action="{{ isset($vehicle) ? route('admin.vehicles.update', $vehicle->id) : route('admin.vehicles.store')}}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($vehicle)) @method('PUT') @endif
    <div class="form-group">
        <label for="">Main Display Image ** </label>
        <br>
        <div class="thumb-preview" id="thumbPreview1">
            @if (isset($vehicle) && $vehicle->getMainImageAttribute())
                <img src="{{ loadImageFor($vehicle->getMainImageAttribute()) }}" alt="User Image">
                <input id="fileInput1" type="hidden" name="main_image" value="{{ $vehicle->getMainImageAttribute() }}">
            @else
                <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="User Image">
                <input id="fileInput1" type="hidden" name="main_image">
            @endif
        </div>
        <br><br>
        <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false"
                data-toggle="modal" data-target="#lfmModal1">Choose Image
        </button>
        <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
        <p class="em text-danger mb-0" id="errmain_image"></p>
    </div>

    {{-- START: slider part --}}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="">Vehicle Gallery Images ** </label><br>
                @if (isset($vehicle) && $vehicle->getSliderImagesAttribute())
                    <div class="slider-thumbs" id="sliderThumbs2">
                        @foreach($vehicle->getSliderImagesAttribute() as $key => $imagePath)
                        <div class="thumb-preview mr-2 mb-2">
                            <i class="fas fa-times-circle" onclick="document.getElementById('lfmIframe2').contentWindow.rmvImg({{$key}});"></i>
                            <img src="{{ loadImageFor($imagePath) }}" alt="Slider Image">
                        </div>
                        @endforeach
                    </div>
                    <input id="fileInput2" type="hidden" name="slider" value="{{ implode(',', $vehicle->getSliderImagesAttribute()) }}" />
                @else
                    <div class="slider-thumbs" id="sliderThumbs2"></div>
                    <input id="fileInput2" type="hidden" name="slider" value="" />
                @endif

                <button id="chooseImage2" class="choose-image btn btn-primary" type="button" data-multiple="true" data-toggle="modal" data-target="#lfmModal2">Choose Images</button>
                <p class="text-warning mb-0">Multiple images are allowed.</p>
                <p id="errgallery" class="mb-0 text-danger em"></p>
            </div>
        </div>
    </div>
    {{-- END: slider part --}}

    <div class="form-group">
        <label for="">Name **</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $vehicle->name ?? '' }}">
        <p id="errname" class="mb-0 text-danger em"></p>
    </div>

    <div class="form-group">
        <label for="">Price **</label>
        <input type="number" class="form-control" name="price" placeholder="Eg. 3000000" value="{{ $vehicle->price ?? '' }}">
        <p id="errprice" class="mb-0 text-danger em"></p>
    </div>

    <div class="row">
        <div class="col-lg-6 pr-1">
            <div class="form-group">
                <label for="">Brand **</label>
                <select id="vehicle_brand_id" class="form-control" name="vehicle_brand_id">
                    <option value="" selected disabled>Select Brand</option>
                    @foreach ($brands as $brand)
                        <option
                            value="{{$brand->id}}" {{ (isset($vehicle) && $vehicle->vehicle_brand_id == $brand->id) ? 'selected' : '' }}>{{$brand->name}}</option>
                    @endforeach
                </select>
                <p id="errvehicle_brand_id" class="mb-0 text-danger em"></p>
            </div>
        </div>
        <div class="col-lg-6 pl-1">
            <div class="form-group">
                <label for="">Vehicle Type **</label>
                <select id="vehicle_type_id" class="form-control" name="vehicle_type_id">
                    <option value="" selected disabled>Select Type</option>
                    @foreach ($types as $type)
                        <option
                            value="{{$type->id}}" {{ (isset($vehicle) && $vehicle->vehicle_type_id == $type->id) ? 'selected' : '' }}>{{$type->name}}</option>
                    @endforeach
                </select>
                <p id="errvehicle_type_id" class="mb-0 text-danger em"></p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Video Link (Optional)</label>
        <textarea id="video_url" class="form-control" name="video_url" rows="2" cols="80"
                  placeholder="Enter video url (eg. https://youtu.be/r7qovpFAGrQ)">{{ $vehicle->video_url ?? '' }}</textarea>
        <p id="errvideo_url" class="mb-0 text-danger em"></p>
    </div>

    <div class="form-group">
        <label for="">Description **</label>
        <textarea id="blogContent" class="form-control summernote" name="description" rows="12" cols="80"
                  placeholder="Enter content">{{ $vehicle->description ?? '' }}</textarea>
        <p id="errdescription" class="mb-0 text-danger em"></p>
    </div>

    <div class="row">
        <div class="col-lg-6 pr-1">
            <div class="form-group">
                <label for="">Model Name</label>
                <input type="text" class="form-control ltr" name="model" value="{{ $vehicle->model ?? '' }}" placeholder="Alt Text">
                <p id="errmodel" class="mb-0 text-danger em"></p>
                <p class="text-warning mb-0"><small>Displayed on the alt tag of the blog image.</small></p>
            </div>
        </div>

        <div class="col-lg-6 pl-1">
            <div class="form-group">
                <label for="">Model Year</label>
                <input type="text" class="form-control ltr" name="model_year" value="{{ $vehicle->model_year ?? '' }}"
                       placeholder="Image description">
                <p id="errmodel_year" class="mb-0 text-danger em"></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 pl-1">
            <div class="form-group">
                <label for="">Alt Image (Optional)</label>
                <input type="text" class="form-control ltr" name="alt_text" value="{{ $vehicle->alt_text ?? '' }}"
                       placeholder="Image description">
                <p id="erralt_text" class="mb-0 text-danger em"></p>
            </div>
        </div>
        <div class="col-lg-6 pl-1">
            <div class="form-group">
                <label for="">Image Description (Optional)</label>
                <input type="text" class="form-control ltr" name="image_description" value="{{ $vehicle->image_description ?? '' }}"
                       placeholder="Image description">
                <p id="errimage_description" class="mb-0 text-danger em"></p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="">Meta Keywords</label>
        <input type="text" class="form-control" name="meta_keywords" value="{{ $vehicle->meta_keywords ?? '' }}" data-role="tagsinput">
    </div>

    <div class="form-group">
        <label for="">Meta Description</label>
        <textarea type="text" class="form-control" name="meta_description" rows="5">{{ $vehicle->meta_description ?? '' }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label>Specifications</label>
        <div id="specificationsArea">
            <!-- Dynamic specifications will be added here -->
            @if(isset($vehicle) && $vehicle->specifications)
                @php $vehicle->specifications = json_decode($vehicle->specifications) @endphp
                    @foreach ($vehicle->specifications as $key => $value)
                        <div class="row mb-2">
                            <div class="col-lg-3 pr-1">
                                <input type="text" class="form-control" name="specifications[{{ $key }}][key]" placeholder="Key (eg. Engine Type)" value="{{ $key }}">
                            </div>
                            <div class="col-lg-8 pl-1">
                                <input type="text" class="form-control" name="specifications[{{ $key }}][value]" placeholder="Value (eg. V8)" value="{{ $value }}">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-danger btn-sm removeSpecification">X</button>
                            </div>
                        </div>
                    @endforeach
            @endif
        </div>
        <button type="button" class="btn btn-default btn-sm" id="addSpecification">Add Specification</button>
    </div>

</form>
