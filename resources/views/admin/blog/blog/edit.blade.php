@extends('admin.layout')

@if(!empty($blog->language) && $blog->language->rtl == 1)
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
        <h4 class="page-title">Edit Blog</h4>
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
                <a href="#">Blog Page</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Edit Blog</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Edit Blog</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                       href="{{route('admin.blog.index') . '?language=' . request()->input('language')}}">
                        <span class="btn-label">
                          <i class="fas fa-backward" style="font-size: 12px;"></i>
                        </span>
                        Back
                    </a>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">

                            <form id="ajaxForm" class="" action="{{route('admin.blog.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{$blog->id}}">

                                {{-- Image Part --}}
                                <div class="form-group">
                                    <label for="">Image ** </label>
                                    <br>
                                    <div class="thumb-preview" id="thumbPreview1">
                                        <img src="{{ loadImageFor($blog->main_image) }}" alt="User Image">
                                    </div>
                                    <br>
                                    <br>


                                    <input id="fileInput1" type="hidden" name="image">
                                    <button id="chooseImage1" class="choose-image btn btn-primary" type="button"
                                            data-multiple="false" data-toggle="modal" data-target="#lfmModal1">Choose Image
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

                                <div class="form-group">
                                    <label for="">Language **</label>
                                    <select id="language" name="language_id" class="form-control">
                                        <option value="" selected disabled>Select a language</option>
                                        @foreach ($langs as $lang)
                                        <option
                                                value="{{$lang->id}}" {{$lang->id == $blog->language->id ? 'selected' : ''}}>{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                    <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                                </div>
                            
                    
                                

                                <div class="form-group">
                                    <label for="">Title **</label>
                                    <input type="text" class="form-control" name="title" value="{{$blog->title}}"
                                           placeholder="Enter title">
                                    <p id="errtitle" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Category **</label>
                                    <select class="form-control" name="category">
                                        <option value="" selected disabled>Select a category</option>
                                        @foreach ($bcats as $key => $bcat)
                                            <option
                                                value="{{$bcat->id}}" {{$bcat->id == $blog->bcategory->id ? 'selected' : ''}}>{{$bcat->name}}</option>
                                        @endforeach
                                    </select>
                                    <p id="errcategory" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Tags</label>
                                    <select multiple class="select2 select2-dropdown form-control" name="tags[]">
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}" {{ in_array($tag->id, $blog->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description (Excerpt)*</label>
                                    <textarea
                                        type="text"
                                        class="form-control"
                                        name="excerpt"
                                        rows="4"
                                        maxlength="200"
                                    >{{$blog->excerpt}}</textarea>
                                    <p class="text-warning mb-0"><small>Maximum 200 characters allowed.</small></p>
                                    <p
                                        id="errexcerpt"
                                        class="mb-0 text-danger em"
                                    ></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Content **</label>
                                    <textarea id="blogContent" class="form-control summernote" name="content" data-height="400"
                                              placeholder="Enter content">{{replaceBaseUrl($blog->content)}}</textarea>
                                    <p id="errcontent" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Image alt text</label>
                                            <input
                                                type="text"
                                                class="form-control ltr"
                                                name="alt_text"
                                                value="{{$blog->alt_text}}"
                                                placeholder="Alt Text"
                                            >
                                            <p
                                                id="erralt_text"
                                                class="mb-0 text-danger em"
                                            ></p>
                                            <p class="text-warning mb-0"><small>Displayed on the alt tag of the blog image.</small></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Image Description</label>
                                            <input
                                                type="text"
                                                class="form-control ltr"
                                                name="image_description"
                                                value="{{$blog->image_description}}"
                                                placeholder="Image Description"
                                            >
                                            <p
                                                id="errimage_description"
                                                class="mb-0 text-danger em"
                                            ></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords" value="{{$blog->meta_keywords}}"
                                        data-role="tagsinput"
                                    >
                                    <p id="errmeta_keywords" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" class="form-control" name="meta_description"
                                              rows="5">{{$blog->meta_description}}</textarea>
                                    <p id="errmeta_description" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Status **</label>
                                    <select class="form-control" name="status">
                                        <option value="" selected disabled>Select a status</option>
                                        <option value="1" {{ $blog->status == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $blog->status == '0' ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                    <p id="errstatus" class="mb-0 text-danger em"></p>
                                </div>

                                <div class="form-group mt-3 border m-2 rounded">
                                    <div class="font-weight-bold mb-3">Frequently Asked Questions (FAQs)</div>
                                    <button type="button" class="btn btn-default btn-sm mb-3" id="addFaq">Add New FAQ</button>
                                    <div id="faqArea"></div>
                                    @for($i = 0; $i <= 3; $i++)
                                        <p id="errfaq_question.{{$i}}" class="mb-0 text-danger em"></p>
                                        <p id="errfaq_answer.{{$i}}" class="mb-0 text-danger em"></p>
                                    @endfor
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

@endsection
