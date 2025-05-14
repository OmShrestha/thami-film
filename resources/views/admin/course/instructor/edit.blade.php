@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Instructor</h4>
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
                <a href="#">Instructor Page</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Instructor</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Edit Instructor</div>
                    <a
                        class="btn btn-info btn-sm float-right d-inline-block"
                        href="{{route('admin.instructor.index') . '?language=' . request()->input('language')}}"
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
                                action="{{route('admin.instructor.update')}}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf

                                <input type="hidden" name="instructor_id" value="{{$instructor->id}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instructor Name **</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="name"
                                                placeholder="Enter Instructor Name"
                                                value="{{ $instructor->name }}"
                                            >
                                            <p
                                                id="errname"
                                                class="mb-0 text-danger em"
                                            ></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instructor Occupation **</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="occupation"
                                                placeholder="Enter Instructor Occupation"
                                                value="{{ $instructor->occupation }}"
                                            >
                                            <p
                                                id="erroccupation"
                                                class="mb-0 text-danger em"
                                            ></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Instructor Details **</label>
                                    <textarea
                                        class="form-control summernote"
                                        name="description"
                                        rows="6"
                                        cols="80"
                                        placeholder="Enter Instructor Details"
                                    >{{ $instructor->description }}</textarea>
                                    <p
                                        id="errdescription"
                                        class="mb-0 text-danger em"
                                    ></p>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instructor Facebook</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="facebook"
                                                placeholder="Enter Faecbook ID"
                                                value="{{ $instructor->facebook }}"
                                            >
                                            <p class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instructor Instagram</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="instagram"
                                                placeholder="Enter Instagram ID"
                                                value="{{ $instructor->instagram }}"
                                            >
                                            <p class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instructor Twitter</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="twitter"
                                                placeholder="Enter Twitter ID"
                                                value="{{ $instructor->twitter }}"
                                            >
                                            <p class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instructor LinkedIn</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="linkedin"
                                                placeholder="Enter LinkedIn ID"
                                                value="{{ $instructor->linkedin }}"
                                            >
                                            <p class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>

                                    {{-- Instructor Image Part --}}
                                    <div class="col-12">

                                        <div class="form-group">
                                            <label for="">Instructor Image ** </label>
                                            <br>
                                            <div class="thumb-preview" id="thumbPreview2">
                                                <img src="{{ loadImageFor($instructor->image) }}"
                                                     alt="Instructor Image">
                                            </div>
                                            <br>
                                            <br>


                                            <input id="fileInput2" type="hidden" name="image">
                                            <button id="chooseImage2" class="choose-image btn btn-primary" type="button"
                                                    data-multiple="false" data-toggle="modal" data-target="#lfmModal2">Choose Image
                                            </button>


                                            <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                            <p class="em text-danger mb-0" id="errimage"></p>

                                            <!-- Image LFM Modal -->
                                            <div class="modal fade lfm-modal" id="lfmModal2" tabindex="-1" role="dialog"
                                                 aria-labelledby="lfmModalTitle" aria-hidden="true">
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
                                    type="submit"
                                    id="submitBtn"
                                    class="btn btn-success"
                                >Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
