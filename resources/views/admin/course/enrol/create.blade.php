@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">Create Purchase Log</h4>
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
                <a href="{{ route('admin.course.purchaseLog') }}">Student Enrol</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Create Purchase Log</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Create Enrol Purchase Log</div>
                    <a class="btn btn-info btn-sm float-right d-inline-block"
                       href="{{route('admin.course.purchaseLog') . '?language=' . request()->input('language')}}">
                      <span class="btn-label">
                        <i class="fas fa-backward" style="font-size: 12px;"></i>
                      </span>
                        Back
                    </a>
                </div>

                <div class="card-body pt-5 pb-5">
                    <div class="row">
                        <div class="col-lg-12">

                            @include('admin.course.enrol.form')

                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form">
                        <div class="form-group from-show-notify row">
                            <div class="col-12 text-center">
                                <button id="submitBtn" type="button" class="btn btn-success">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('admin.course.enrol.scripts')
@endsection
