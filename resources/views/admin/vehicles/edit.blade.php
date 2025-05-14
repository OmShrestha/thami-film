@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Edit Information</h4>
        <ul class="breadcrumbs">
            <li class="nav-home"><a href="{{route('admin.dashboard')}}"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="#">{{ $vehicle->name }}</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Edit {{ $vehicle->name }}</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                       href="{{route('admin.vehicles.index') . '?language=' . request()->input('language')}}">
                        <span class="btn-label">
                          <i class="fas fa-backward" style="font-size: 12px;"></i>
                        </span>
                        Back
                    </a>
                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            @include('admin.vehicles.form')
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
    </div>

@endsection

@section('scripts')

    @include('admin.vehicles.scripts')

@endsection
