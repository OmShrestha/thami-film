@extends('admin.layout')

@if(!empty($course->language) && $course->language->rtl == 1)
    @section('styles')
        <style>
            form input,
            form textarea,
            form select {
                direction: rtl;
            }

            form .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }
        </style>
    @endsection
@endif

@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Course</h4>
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
                <a href="#">Course Page</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Course</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Edit Course</div>
                    <a
                        class="btn btn-info btn-sm float-right d-inline-block"
                        href="{{route('admin.course.index') . '?language=' . request()->input('language')}}"
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
                                action="{{route('admin.course.update')}}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf

                                <input type="hidden" name="course_id" value="{{$course->id}}">

                                {{-- Image Part --}}
                                <div class="form-group">
                                    <label for="">Image ** </label>
                                    <br>
                                    <div class="thumb-preview" id="thumbPreview1">
                                        <img src="{{loadImageFor($course->course_image)}}" alt="Course Image">
                                    </div>
                                    <br>
                                    <br>

                                    <input id="fileInput1" type="hidden" name="image">
                                    <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false"
                                            data-toggle="modal" data-target="#lfmModal1">Choose Image
                                    </button>


                                    <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                    <p class="em text-danger mb-0" id="errimage"></p>

                                    <!-- Image LFM Modal -->
                                    <div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog"
                                         aria-labelledby="lfmModalTitle" aria-hidden="true">
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
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Course Category **</label>
                                            <select
                                                id="course_category_id"
                                                class="form-control"
                                                name="course_category_id"
                                            >
                                                <option
                                                    value=""
                                                    selected
                                                    disabled
                                                >Select a Category
                                                </option>
                                                @foreach ($course_categories as $course_category)
                                                    <option
                                                        value={{ $course_category->id }}
                                                        {{ $course_category->id == $course->course_category_id ? 'selected' : '' }}
                                                    >{{ $course_category->name }}</option>
                                                @endforeach
                                            </select>
                                            <p
                                                id="errcourse_category_id"
                                                class="mb-0 text-danger em"
                                            ></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Course Title **</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="title"
                                                placeholder="Enter Title"
                                                value="{{ $course->title }}"
                                            >
                                            <p
                                                id="errtitle"
                                                class="mb-0 text-danger em"
                                            ></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Current Price ({{$bs->base_currency_text}})</label>
                                            <input
                                                type="number"
                                                class="form-control ltr"
                                                name="current_price"
                                                placeholder="Enter Current Price"
                                                value="{{ $course->current_price }}"
                                            >
                                            <p class="mb-0 text-danger em"></p>
                                            <p class="mb-0 text-warning">Leave it blank if it's a free course</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Previous Price ({{$bs->base_currency_text}})</label>
                                            <input
                                                type="number"
                                                class="form-control ltr"
                                                name="previous_price"
                                                placeholder="Enter Previous Price"
                                                value="{{ $course->previous_price }}"
                                            >
                                            <p class="mb-0 text-danger em"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Course Duration **</label>
                                            <input
                                                type="text"
                                                class="form-control ltr"
                                                name="duration"
                                                placeholder="eg: 10h 15m"
                                                value="{{ $course->duration }}"
                                            >
                                            <p
                                                id="errduration"
                                                class="mb-0 text-danger em"
                                            ></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Course Summary</label>
                                    <textarea
                                        class="form-control"
                                        name="summary"
                                        rows="6"
                                        cols="80"
                                        placeholder="Enter Course Summary"
                                    >{{ $course->summary }}</textarea>
                                    <p class="mb-0 text-danger em"></p>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="">Course Video **</label>
                                    <input
                                        type="text"
                                        class="form-control ltr"
                                        name="video_link"
                                        placeholder="Enter YouTube Video Link"
                                        value="{{ $course->video_link }}"
                                    >
                                    <p
                                        id="errvideo_link"
                                        class="mb-0 text-danger em"
                                    ></p>
                                </div>

                                <div class="form-group">
                                    <label for="">Course Overview **</label>
                                    <textarea
                                        class="form-control summernote"
                                        name="overview"
                                        rows="8"
                                        cols="80"
                                        placeholder="Enter Overview"
                                    >{{ $course->overview }}</textarea>
                                    <p
                                        id="erroverview"
                                        class="mb-0 text-danger em"
                                    ></p>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Choose Instructor **</label>
                                            <select name="course_instructor_id" class="form-control">
                                                <option value="" selected disabled>Select an Instructor</option>
                                                @foreach ($instructors as $instructor)
                                                    <option
                                                        value="{{$instructor->id}}" {{ $course->course_instructor_id == $instructor->id ? 'selected' : '' }}>
                                                        {{$instructor->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p id="errcourse_instructor_id" class="mb-0 text-danger em"></p>
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
