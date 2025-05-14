@extends('admin.layout')

@if(!empty($bs->language) && $bs->language->rtl == 1)
@section('styles')
<style>
    form:not(.modal-form) input,
    form:not(.modal-form) textarea,
    form:not(.modal-form) select,
    select[name='language'] {
        direction: rtl;
    }
    form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
<div class="page-header">
    <h4 class="page-title">Team Section</h4>
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
            <a href="#">Home Page</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Team Section</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        @if ($bs->home_page_pagebuilder == 0)
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-title">Title & Subtitle</div>
                    </div>
                    <div class="col-lg-2">
                        @if (!empty($langs))
                        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>Select a Language</option>
                            @foreach ($langs as $lang)
                            <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>
            </div>

            <form class="" action="{{route('admin.team.update', $lang_id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        @if ($bs->theme_version == 'default' || $bs->theme_version == 'dark')

                        <div class="col-lg-12 mx-auto">
                            {{-- Background Part --}}
                            <div class="form-group">
                                <label for="">Background ** </label>
                                <br>
                                <div class="thumb-preview" id="thumbPreview1">
                                    <img src="{{asset('assets/frontend/images/'.$bs->team_bg)}}" alt="Background">
                                </div>
                                <br>
                                <br>


                                <input id="fileInput1" type="hidden" name="background">
                                <button id="chooseImage1" class="choose-image btn btn-primary" type="button" data-multiple="false" data-toggle="modal" data-target="#lfmModal1">Choose Image</button>


                                <p class="text-warning mb-0">JPG, PNG, JPEG, SVG images are allowed</p>
                                @if ($errors->has('background'))
                                <p class="text-danger mb-0">{{$errors->first('background')}}</p>
                                @endif

                                <!-- Background LFM Modal -->
                                <div class="modal fade lfm-modal" id="lfmModal1" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
                                    <i class="fas fa-times-circle"></i>
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <iframe src="{{url('laravel-filemanager')}}?serial=1" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-lg-12 mx-auto">
                            <div class="form-group">
                                <label>Title **</label>
                                <input class="form-control" name="team_section_title" value="{{$bs->team_section_title}}" placeholder="Enter Title">
                                @if ($errors->has('team_section_title'))
                                <p class="mb-0 text-danger">{{$errors->first('team_section_title')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 mx-auto">
                            <div class="form-group">
                                <label>Subtitle **</label>
                                <input class="form-control" name="team_section_subtitle" value="{{$bs->team_section_subtitle}}" placeholder="Enter Subtitle">
                                @if ($errors->has('team_section_subtitle'))
                                <p class="mb-0 text-danger">{{$errors->first('team_section_subtitle')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="card-title d-inline-block">teams</div>
                <a href="{{route('admin.team.create') . '?language=' . request()->input('language')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Team</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($teams) == 0)
                        <h3 class="text-center">NO TEAM FOUND</h3>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Rank</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $key => $team)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img src="{{asset('assets/frontend/images/teams/'.$team->image)}}" alt="" width="40"></td>
                                        <td>{{convertUtf8($team->name)}}</td>
                                        <td>{{convertUtf8($team->position)}}</td>
                                        <td>{{convertUtf8($team->address)}}</td>
                                        <td>{{$team->rank}}</td>
                                        <td>
                                            <form id="featureForm{{$team->id}}" class="d-inline-block" action="{{route('admin.team.feature')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="team_id" value="{{$team->id}}">
                                                <select class="form-control {{$team->feature == 1 ? 'bg-success' : 'bg-danger'}}" name="feature" onchange="document.getElementById('featureForm{{$team->id}}').submit();">
                                                    <option value="1" {{$team->feature == 1 ? 'selected' : ''}}>Yes</option>
                                                    <option value="0" {{$team->feature == 0 ? 'selected' : ''}}>No</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-secondary btn-sm" href="{{route('admin.team.edit', $team->id) . '?language=' . request()->input('language')}}">
                                                <span class="btn-label">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                Edit
                                            </a>
                                            <form class="deleteform d-inline-block" action="{{route('admin.team.delete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="team_id" value="{{$team->id}}">
                                                <button type="submit" class="btn btn-danger btn-sm deletebtn">
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
