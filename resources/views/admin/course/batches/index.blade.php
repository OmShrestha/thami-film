@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Course Batches</h4>
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
                <a href="#">Courses</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Batches</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Batches</div>
                        </div>

                        <div class="col-lg-3"></div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a
                                href="#"
                                class="btn btn-primary float-right btn-sm"
                                data-toggle="modal"
                                data-target="#createModal"
                            ><i class="fas fa-plus"></i> Add Batch</a>

                            <button
                                class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                data-href="{{route('admin.course_category.bulk_delete')}}"
                            ><i class="flaticon-interface-5"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($batches) == 0)
                                <h3 class="text-center">NO BATCHES FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input
                                                    type="checkbox"
                                                    class="bulk-check"
                                                    data-val="all"
                                                >
                                            </th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Currently Enrolled</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($batches as $batch)
                                            <tr>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        class="bulk-check"
                                                        data-val="{{$batch->id}}"
                                                    >
                                                </td>
                                                <td>{{convertUtf8($batch->name)}}</td>
                                                <td>
                                                    @if ($batch->is_active == 1)
                                                        <h2 class="d-inline-block"><span class="badge badge-success">Active</span></h2>
                                                    @else
                                                        <h2 class="d-inline-block"><span class="badge badge-danger">Inactive</span></h2>
                                                    @endif
                                                </td>
                                                <td>{{$batch->users->count()}}</td>
                                                <td>
                                                    <a
                                                        class="btn btn-secondary btn-sm editbtn"
                                                        href="#editModal"
                                                        data-toggle="modal"
                                                        data-batch_id="{{$batch->id}}"
                                                        data-name="{{$batch->name}}"
                                                        data-is_active="{{$batch->is_active}}"
                                                        data-start_date="{{$batch->start_date}}"
                                                        data-end_date="{{$batch->end_date}}"
                                                        data-capacity="{{$batch->capacity}}"
                                                        data-description="{{$batch->description}}"
                                                    >
                                                        <span class="btn-label">
                                                          <i class="fas fa-edit"></i>
                                                        </span>
                                                        Edit
                                                    </a>

                                                    <form
                                                        class="deleteform d-inline-block"
                                                        action="{{route('admin.batch.delete')}}"
                                                        method="post"
                                                    >
                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="batch_id"
                                                            value="{{$batch->id}}"
                                                        >
                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm deletebtn"
                                                        >
                                                      <span class="btn-label">
                                                        <i class="fas fa-trash"></i>
                                                      </span>
                                                            Delete
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
                            {{$batches->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Course Batch Modal -->
    <div
        class="modal fade"
        id="createModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-centered"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title"
                        id="exampleModalLongTitle"
                    >Add Course Batch</h5>
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
                        class="modal-form create"
                        action="{{route('admin.batch.store')}}"
                        method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Name **</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value=""
                                placeholder="Enter Name"
                            >
                            <p
                                id="errname"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Status **</label>
                            <select
                                class="form-control ltr"
                                name="is_active"
                            >
                                <option
                                    value=""
                                    selected
                                    disabled
                                >Select Status
                                </option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <p
                                id="erris_active"
                                class="mb-0 text-danger em"
                            ></p>
                            <p class="text-warning"><small>Only one batch can be active at a time.</small></p>
                        </div>

                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input
                                type="date"
                                class="form-control ltr"
                                name="start_date"
                                value=""
                                placeholder="Enter Start Date (Optional)"
                            >
                            <p
                                id="errstart_date"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">End Date</label>
                            <input
                                type="date"
                                class="form-control ltr"
                                name="end_date"
                                value=""
                                placeholder="Enter end date for the batch (Optional)"
                            >
                            <p
                                id="errend_date"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Total Capacity</label>
                            <input
                                type="number"
                                class="form-control ltr"
                                name="capacity"
                                value=""
                                placeholder="Enter Total Capacity of the batch (Optional)"
                            >
                            <p
                                id="errcapacity"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea
                                type="number"
                                class="form-control ltr"
                                name="description"
                                value=""
                                placeholder="Enter Description (Optional)"
                            ></textarea>
                            <p
                                id="errdescription"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                    </form>
                </div>

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

    <!-- Edit Course Batch Modal -->
    <div
        class="modal fade"
        id="editModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-centered"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5
                        class="modal-title"
                        id="exampleModalLongTitle"
                    >Edit Course Batch</h5>
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
                        id="ajaxEditForm"
                        class=""
                        action="{{route('admin.batch.update')}}"
                        method="POST"
                    >
                        @csrf
                        <input
                            id="inbatch_id"
                            type="hidden"
                            name="batch_id"
                            value=""
                        >
                        <div class="form-group">
                            <label for="">Name **</label>
                            <input
                                id="inname"
                                type="text"
                                class="form-control"
                                name="name"
                                value=""
                                placeholder="Enter Name"
                            >
                            <p
                                id="eerrname"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Status **</label>
                            <select
                                id="inis_active"
                                class="form-control ltr"
                                name="is_active"
                            >
                                <option
                                    value=""
                                    selected
                                    disabled
                                >Select Status
                                </option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <p
                                id="eerris_active"
                                class="mb-0 text-danger em"
                            ></p>
                            <p class="text-warning"><small>Only one batch can be active at a time.</small></p>
                        </div>

                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input
                                id="instart_date"
                                type="text"
                                class="form-control ltr"
                                name="start_date"
                                value=""
                                placeholder="Enter Start Date (Optional)"
                            >
                            <p
                                id="eerrstart_date"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">End Date</label>
                            <input
                                id="inend_date"
                                type="text"
                                class="form-control ltr"
                                name="end_date"
                                value=""
                                placeholder="Enter end date for the batch (Optional)"
                            >
                            <p
                                id="eerrend_date"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Total Capacity</label>
                            <input
                                id="incapacity"
                                type="number"
                                class="form-control ltr"
                                name="capacity"
                                value=""
                                placeholder="Enter Total Capacity of the batch (Optional)"
                            >
                            <p
                                id="eerrcapacity"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea
                                id="indescription"
                                type="number"
                                class="form-control ltr"
                                name="description"
                                value=""
                                placeholder="Enter Description (Optional)"
                            ></textarea>
                            <p
                                id="eerrdescription"
                                class="mb-0 text-danger em"
                            ></p>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >Close
                    </button>
                    <button
                        id="updateBtn"
                        type="button"
                        class="btn btn-primary"
                    >Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // make input fields RTL
            $("select[name='language_id']").on('change', function () {
                $(".request-loader").addClass("show");
                let url = "{{url('/')}}/admin/rtlcheck/" + $(this).val();
                // console.log(url);
                $.get(url, function (data) {
                    $(".request-loader").removeClass("show");
                    if (data == 1) {
                        $("form.create input").each(function () {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form.create select").each(function () {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form.create textarea").each(function () {
                            if (!$(this).hasClass('ltr')) {
                                $(this).addClass('rtl');
                            }
                        });
                        $("form.create .summernote").each(function () {
                            $(this).addClass('rtl text-right');
                        });
                    } else {
                        $("form.create input, form.create select, form.create textarea").removeClass('rtl');
                        $("form.create .summernote").removeClass('rtl text-right');
                    }
                })
            });
        });
    </script>
@endsection
