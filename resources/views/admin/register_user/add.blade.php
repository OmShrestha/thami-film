@extends('admin.layout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Add New User</h4>
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
                <a href="#">New User</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Create User</div>
                    <a
                        class="btn btn-info btn-sm float-right d-inline-block"
                        href="{{route('admin.register.user') . '?language=' . request()->input('language')}}"
                    >
          <span class="btn-label">
            <i
                class="fas fa-backward"
                style="font-size: 12px;"
            ></i>
          </span>
                        Back
                    </a>
                </div>

                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-12">

                            <form
                                id="ajaxForm"
                                action="{{route('admin.register.user.store')}}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name **</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="full_name"
                                                placeholder="Enter Name"
                                                value=""
                                            >
                                            <p id="errfull_name" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email **</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="email"
                                                placeholder="Enter email"
                                                value=""
                                            >
                                            <p id="erremail" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="number"
                                                placeholder="Enter Phone"
                                                value=""
                                            >
                                            <p id="errnumber" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="address"
                                                placeholder="Enter Address"
                                                value=""
                                            >
                                            <p id="erraddress" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="username"
                                                placeholder="Enter Username"
                                                value=""
                                            >
                                            <p id="errusername" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Password (Optional)</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                name="password"
                                                placeholder="Enter Password"
                                                value=""
                                            >
                                            <p id="errpassword" class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Image ** </label>
                                            <br>
                                            <div class="thumb-preview" id="thumbPreview1">
                                                <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="User Image">
                                            </div>
                                            <br>
                                            <br>
                                            <input id="fileInput1" type="hidden" name="image">
                                            <button id="chooseImage1" class="choose-image btn btn-primary" type="button"
                                                    data-multiple="false"
                                                    data-toggle="modal" data-target="#lfmModal1">Choose Image
                                            </button>
                                            <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                            <p class="em text-danger mb-0" id="errimage"></p>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button
                                    id="submitBtn"
                                    type="button"
                                    class="btn btn-success"
                                >Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image LFM Modal -->
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
@endsection

