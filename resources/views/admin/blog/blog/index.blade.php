@extends('admin.layout')

@section('content')
    <div class="page-header">
            <h4 class="page-title">Blogs</h4>

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
                <a href="#">Blogs</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card-title d-inline-block">Blogs</div>
                        </div>
                        <div class="col-lg-3">
                            @if (!empty($langs))
                                <select name="language" class="form-control"
                                        onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    @foreach ($langs as $lang)
                                        <option
                                            value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-lg-3 offset-lg-1 mt-2 mt-lg-0">
                            <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                               data-target="#createModal" >
                                <i class="fas fa-plus"></i> Add Blog
                            </a>
                            @if(config('wom-academy.enable_blog_import'))
                                <button href="{{ route('admin.blogs.import') }}"
                                        class="btn btn-primary float-right btn-sm mr-2 wordpress-import-blogs"><i
                                        class="fas fa-plus"></i> Import blogs from Old site
                                </button>
                            @endif

                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                    data-href="/blog/bulk-delete"><i class="flaticon-interface-5"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($blogs) == 0)
                                <h3 class="text-center">NO BLOG FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="ajax-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input type="checkbox" class="bulk-check" data-val="all">
                                            </th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Publish Date</th>
                                            <th scope="col">Breaking News</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Create Blog Modal -->
    <div
        class="modal fade"
        id="createModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-centered modal-lg"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title"
                        id="exampleModalLongTitle"
                    >Add Blog</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form
                        id="ajaxForm"
                        class="modal-form"
                        action="{{route('admin.blog.store')}}"
                        method="POST"
                    >
                        @csrf

                        {{-- Image Part --}}
                        <div class="form-group">
                            <label for="">Image ** </label>
                            <br>
                            <div class="thumb-preview" id="thumbPreview1">
                                <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="User Image">
                            </div>
                            <br>
                            <br>


                            <input id="fileInput1" type="hidden" name="image">
                            <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false"
                                    data-toggle="modal" data-target="#lfmModal1">Choose Image
                            </button>


                            <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                            <p class="em text-danger mb-0" id="errimage"></p>

                        </div>

                        <div class="row">
                            <div class="col-lg-6 pr-1">
                                <div class="form-group">
                                    <label for="">Language **</label>
                                    <select id="language" name="language_id" class="form-control">
                                        <option value="" selected disabled>Select a language</option>
                                        @foreach ($langs as $lang)
                                            <option value="{{$lang->id}}">{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                    <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Title **</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                placeholder="Enter title"
                                value=""
                            >
                            <p
                                id="errtitle"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>
                        <div class="form-group">
                            <label for="">Category **</label>
                            <select
                                id="bcategory"
                                class="form-control"
                                name="category"
                                disabled
                            >
                                <option
                                    value=""
                                    selected
                                    disabled
                                >Select a category
                                </option>
                            </select>
                            <p
                                id="errcategory"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Tags</label>
                            <select multiple class="select2 select2-dropdown form-control" name="tags" id="tags">
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
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
                            ></textarea>
                            <p class="text-warning mb-0"><small>Maximum 200 characters allowed.</small></p>
                            <p
                                id="errexcerpt"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>
                        <div class="form-group">
                            <label for="">Content **</label>
                            <textarea id="blogContent"
                                      class="form-control summernote"
                                      name="content"
                                      rows="12"
                                      cols="80"
                                      placeholder="Enter content"
                            ></textarea>
                            <p
                                id="errcontent"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 pr-1">
                                <div class="form-group">
                                    <label for="">Image alt text</label>
                                    <input
                                        type="text"
                                        class="form-control ltr"
                                        name="alt_text"
                                        value=""
                                        placeholder="Alt Text"
                                    >
                                    <p
                                        id="erralt_text"
                                        class="mb-0 text-danger em"
                                    ></p>
                                    <p class="text-warning mb-0"><small>Displayed on the alt tag of the blog image.</small></p>
                                </div>
                            </div>
                            <div class="col-lg-6 pl-1">
                                <div class="form-group">
                                    <label for="">Image Description</label>
                                    <input
                                        type="text"
                                        class="form-control ltr"
                                        name="image_description"
                                        value=""
                                        placeholder="Image description"
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
                            <input
                                type="text"
                                class="form-control"
                                name="meta_keywords"
                                value=""
                                data-role="tagsinput"
                            >
                        </div>
                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea
                                type="text"
                                class="form-control"
                                name="meta_description"
                                rows="5"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status **</label>
                            <select class="form-control ltr" name="status">
                                <option value="" selected disabled>Select a status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <p id="errstatus" class="mb-0 text-danger em"></p>
                        </div>
                                    </div>

                    </form>
                    <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >Close
                    </button>
                    <button
                        id="submitBtn"
                        type="button"
                        class="btn btn-primary"
                    >Submit
                    </button>
                </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Image LFM Modal -->
    <div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle"
         aria-hidden="true">
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
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#ajax-datatables').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/admin/blogs-ajax?language={{request()->input('language')}}&site={{request()->input('site')}}',
                    type: 'GET',
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return `<input type="checkbox" class="bulk-check" data-val="${data}">`;
                        }
                    },
                    {
                        data: 'main_image',
                        name: 'main_image',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            var url = '{{ sprintf(loadImageFor('%s'), '') }}' + data;
                            return '<img src="' + url + '" alt="" width="80">';
                        }
                    },
                    {
                        data: 'bcategory_id',
                        name: 'bcategory_id',
                        render: function (data, type, row) {
                            return data ? row.bcategory.name : '';
                        }
                    },
                    {
                        data: 'title', name: 'title',
                        render: function (data, type, row) {
                            return '<a href="/blog/' + row.slug + '/" target="_blank">' + data + '</a>';
                        }
                    },
                    {
                        data: 'status', name: 'status',
                        render: function (data, type, row) {
                            return   row.status==1 ?'Active': 'Inactive' ;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data, type, row) {
                            let date = new Date(data);
                            return date.toLocaleDateString('en-GB', {
                                day: '2-digit', month: 'short', year: 'numeric'
                            });
                        }
                    },
                    {
                        data: 'breaking_news',
                        name: 'breaking_news',
                        render: function (data, type, row) {
                            let select = `<form id="statusForm${row.id}" class="d-inline-block" action="/admin/blog/sidebar" method="post">` +
                                '@csrf' +
                                `<input type="hidden" name="blog_id" value="${row.id}">` +
                                `<select class="form-control form-control-sm ${data == 1 ? 'bg-success' : 'bg-danger'}" name="breaking_news" onchange="document.getElementById('statusForm${row.id}').submit();">` +
                                `<option value="1" ${data == 1 ? 'selected' : ''}>Yes</option>` +
                                `<option value="0" ${data == 0 ? 'selected' : ''}>No</option>` +
                                `</select></form>`;
                            return select;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            {{--'<a target="_blank" href="/admin/blog/' + row.id + '/details?language={{ request()->input('language')  }}" class="btn btn-primary btn-xs mr-1 mt-1">Show</a>' + --}}
                                return '<a href="/admin/blog/' + row.id + '/edit?language={{ request()->input('language')  }}" title="Edit" class="btn btn-secondary btn-sm mr-1 my-1"><i class="fas fa-edit fa-sm"></i></a>' +
                                '<form class="deleteform d-inline-block" action="/admin/blog/delete" method="post">' +
                                '@csrf' +
                                '<input type="hidden" name="blog_id" value="' + row.id + '">' +
                                '<button type="submit" title="Delete" class="btn btn-danger btn-sm deletebtn mb-1"><i class="fas fa-trash fa-sm"></i></button>' +
                                '</form>';
                        }
                    }
                ]
            });
        });


        $(document).ready(function () {
            $("select[name='language_id']").on('change', function () {

                $("#bcategory").removeAttr('disabled');

                let langid = $(this).val();
                let url = "{{url('/')}}/admin/blog/" + langid + "/getcats";
                console.log(url);
                $.get(url, function (data) {
                    console.log(data);
                    let options = `<option value="" disabled selected>Select a category</option>`;
                    for (let i = 0; i < data.length; i++) {
                        options += `<option value="${data[i].id}">${data[i].name}</option>`;
                    }
                    $("#bcategory").html(options);

                });
            });

            // make input fields RTL
            $("select[name='language_id']").on('change', function () {
                $(".request-loader").addClass("show");

                let url = "{{url('/')}}/admin/rtlcheck/" + $(this).val();
                console.log(url);
                $.get(url, function (data) {
                    $(".request-loader").removeClass("show");
                    if (data == 1) {
                        $("form input").each(function () {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form select").each(function () {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form textarea").each(function () {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form .summernote").each(function () {
                            $(this).siblings('.note-editor').find('.note-editable').addClass('rtl text-right');
                        });

                    } else {
                        $("form input, form select, form textarea").removeClass('rtl');
                        $("form.modal-form .summernote").siblings('.note-editor').find('.note-editable').removeClass('rtl text-right');
                    }
                })
            });

            // translatable portfolios will be available if the selected language is not 'Default'
            $("#language").on('change', function () {
                let language = $(this).val();
                // console.log(language);
                if (language == 0) {
                    $("#translatable").attr('disabled', true);
                } else {
                    $("#translatable").removeAttr('disabled');
                }
            });
        });
        // console.log('loaded');

        $('.wordpress-import-blogs').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            swal({
                title: "Are you sure?",
                text: "Once imported, you will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willImport) => {
                    if (willImport) {
                        var btn = $(this);
                        btn.html('<i class="fas fa-spinner fa-spin"></i> Importing...');
                        btn.attr('disabled', true);
                        window.location.href = url;
                    }
                });
        });

        // FAQs for blogs
        $(document).ready(function () {
            $('#addFaq').on('click', function () {
                var faq = `<div class="faq-item border p-2 rounded mb-2">
                            <div class="row">
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" name="faq_question[]" placeholder="Enter Question here" required>
                                </div>
                                <div class="col-lg-1 mt-2">
                                    <button type="button" class="btn btn-danger btn-xs removeFaq"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="col-lg-11 mt-2">
                                    <textarea type="text" class="form-control" name="faq_answer[]" rows="2" placeholder="Enter Answer here" required></textarea>
                                </div>
                            </div>
                        </div>`;
                $('#faqArea').append(faq);
            });

            $(document).on('click', '.removeFaq', function () {
                $(this).closest('.faq-item').remove();
            });
        });
    </script>
@endsection
