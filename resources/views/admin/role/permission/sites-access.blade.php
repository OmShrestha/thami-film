@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Roles</h4>
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
        <a href="#">{{$role->name}}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Permissions Management</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Sites Access Management</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.role.index')}}">
            <span class="btn-label">
              <i class="fas fa-backward" style="font-size: 12px;"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              {{--  onsubmit="return false;" --}}
              <form id="sitesForm" class="" action="{{route('admin.role.sites.update')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="role_id" value="{{Request::route('id')}}">

                @php
                  $sitesAccess = $role->sites_access;
                  if (!empty($role->sites_access)) {
                    $sitesAccess = json_decode($sitesAccess, true);
                  }
                @endphp

                <div class="form-group">
                  <label for="">Sites to manage: </label>
                    <br>
                	<div class="selectgroup selectgroup-pills mt-2">
                        @foreach($sites as $site)
                            <label class="selectgroup-item">
                                <input type="checkbox" name="sites_access[]" value="{{$site->name}}" class="selectgroup-input"
                                       @if(is_array($sitesAccess) && in_array($site->name, $sitesAccess)) checked @endif>
                                <span class="selectgroup-button">{{ucfirst($site->name)}}</span>
                            </label>
                        @endforeach
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
                <button type="submit" id="submitBtn" class="btn btn-success" onclick="document.getElementById('sitesForm').submit();">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
