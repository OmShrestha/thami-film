@extends('admin.layout')

@php
    $selLang = getLang();
@endphp

@section('content')
    <div class="page-header">
        <h4 class="page-title">Courses</h4>
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
                <a href="#">Instructors</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Instructors</div>
                        </div>

                        <div class="col-lg-3">
                            @if (!empty($langs))
                                <select
                                    name="language"
                                    class="form-control"
                                    onchange="window.location='{{url()->current() . '?language='}}'+this.value"
                                >
                                    <option
                                        value=""
                                        selected
                                        disabled
                                    >Select a Language
                                    </option>
                                    @foreach ($langs as $lang)
                                        <option
                                            value="{{$lang->code}}"
                                            {{$lang->code == request()->input('language') ? 'selected' : ''}}
                                        >{{$lang->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a
                                href="{{ route('admin.instructor.create') . '?language=' . request()->input('language') }}"
                                class="btn btn-primary float-right btn-sm"
                            ><i class="fas fa-plus"></i> Add Instructor</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($instructors) == 0)
                                <h3 class="text-center">NO INSTRUCTORS FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                        <tr>
                                            <th scope="col">
                                                <input
                                                    type="checkbox"
                                                    class="bulk-check"
                                                    data-val="all"
                                                >
                                            </th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Courses</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Featured</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($instructors as $instructor)
                                            <tr>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        class="bulk-check"
                                                        data-val="{{$instructor->id}}"
                                                    >
                                                </td>

                                                <td>
                                                    <img
                                                        src="{{ loadImageFor($instructor->image) }}"
                                                        alt=""
                                                        width="80"
                                                    >
                                                </td>

                                                <td>{{convertUtf8($instructor->courses->count())}}</td>
                                                <td>{{$instructor->name}}</td>
                                                <td>
                                                    <form
                                                        id="featureForm{{$instructor->id}}"
                                                        class="d-inline-block"
                                                        action="{{route('admin.instructor.featured')}}"
                                                        method="post"
                                                    >
                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="course_id"
                                                            value="{{$instructor->id}}"
                                                        >
                                                        <select
                                                            class="form-control {{$instructor->is_featured == 1 ? 'bg-success' : 'bg-danger'}}"
                                                            name="is_featured"
                                                            onchange="document.getElementById('featureForm{{$instructor->id}}').submit();"
                                                        >
                                                            <option
                                                                value="1"
                                                                {{$instructor->is_featured == 1 ? 'selected' : ''}}
                                                            >Yes
                                                            </option>
                                                            <option
                                                                value="0"
                                                                {{$instructor->is_featured == 0 ? 'selected' : ''}}
                                                            >No
                                                            </option>
                                                        </select>
                                                    </form>
                                                </td>
                                                {{-- <td>
                                                  @php
                                                  $date = \Carbon\Carbon::parse($instructor->created_at);
                                                  @endphp
                                                  {{$date->translatedFormat('jS F, Y')}}
                                                </td> --}}
                                                <td>
                                                    <a
                                                        class="btn btn-secondary btn-sm"
                                                        href="{{route('admin.instructor.edit', $instructor->id) . '?language=' . request()->input('language')}}"
                                                    >
                                                            <span class="btn-label">
                                                              <i class="fas fa-edit"></i>
                                                            </span>
                                                        Edit
                                                    </a>

                                                    <form
                                                        class="deleteform d-inline-block"
                                                        action="{{route('admin.instructor.delete')}}"
                                                        method="post"
                                                    >
                                                        @csrf
                                                        <input
                                                            type="hidden"
                                                            name="course_id"
                                                            value="{{$instructor->id}}"
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

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
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
    </script>
@endsection
