@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Vehicle Brands</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{route('admin.dashboard')}}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Brands</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card-title d-inline-block">Brands</div>
                        </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#createModal"><i
                                    class="fas fa-plus"></i> Add Brand</a>
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                    data-href="{{route('admin.vehicle-brands.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($brands) == 0)
                                <h3 class="text-center">NO BRANDS FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($brands as $key => $brand)
                                            <tr>
                                                <td><input type="checkbox" class="bulk-check" data-val="{{$brand->id}}"></td>
                                                <td>{{convertUtf8($brand->name)}}</td>
                                                <td>
                                                    <img src="{{ loadImageFor($brand->logo) }}"
                                                         alt="{{$brand->name}}" width="80">
                                                </td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm editbtn" href="#editModal" data-toggle="modal"
                                                       data-name="{{$brand->name}}" data-brand_id="{{$brand->id}}" data-logo="{{$brand->logo}}">
                                                        <span class="btn-label"><i class="fas fa-edit"></i></span>Edit
                                                    </a>
                                                    <form class="deleteform d-inline-block"
                                                          action="{{route('admin.vehicle-brands.destroy', $brand->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                            <span class="btn-label"><i class="fas fa-trash"></i></span>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="d-inline-block mx-auto">
                            {{$brands->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Brands Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajaxForm" class="modal-form create" action="{{route('admin.vehicle-brands.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Logo ** </label>
                            <br>
                            <div class="thumb-preview" id="thumbPreview1">
                                <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="User Image">
                                <input id="fileInput1" type="hidden" name="logo">
                            </div>
                            <br><br>
                            <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false"
                                    data-toggle="modal" data-target="#lfmModal1">Choose Image
                            </button>
                            <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                            <p class="em text-danger mb-0" id="errlogo"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Name **</label>
                            <input type="text" class="form-control" name="name" value="" placeholder="Enter brand name">
                            <p id="errname" class="mb-0 text-danger em"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Brands Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="ajaxEditForm" class="" action="{{route('admin.vehicle-brands.update', 1)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input id="inbrand_id" type="hidden" name="brand_id" value="">
                        <div class="form-group">
                            <label for="">Logo ** </label>
                            <br>
                            <div class="thumb-preview" id="thumbPreview2">
                                <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="User Image">
                                <input id="fileInput2" type="hidden" name="logo">
                            </div>
                            <br><br>
                            <button id="chooseImage2" class="choose-image btn btn-primary" type="button" data-multiple="false"
                                    data-toggle="modal" data-target="#lfmModal2">Choose Image
                            </button>
                            <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                            <p class="em text-danger mb-0" id="eerrlogo"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Name **</label>
                            <input id="inname" type="name" class="form-control" name="name" value="" placeholder="Enter name">
                            <p id="eerrname" class="mb-0 text-danger em"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="updateBtn" type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
        <i class="fas fa-times-circle"></i>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <iframe src="{{url('laravel-filemanager')}}?serial=1"
                            style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade lfm-modal" id="lfmModal2" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
        <i class="fas fa-times-circle"></i>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <iframe src="{{url('laravel-filemanager')}}?serial=2"
                            style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
