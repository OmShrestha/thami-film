@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Basic Informations</h4>
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
        <a href="#">Basic Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Basic Informations</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.basicinfo.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card-title">Update Basic Informations</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Website Title **</label>
                          <input class="form-control" name="website_title" value="{{$bs->website_title}}">
                          @if ($errors->has('website_title'))
                            <p class="mb-0 text-danger">{{$errors->first('website_title')}}</p>
                          @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Timezone</label>
                            <select class="form-control select2" name="timezone">
                                <option value="" selected disabled>Select a Timezone</option>
                                @foreach ($timezones as $timezone)
                                <option value="{{$timezone->timezone}}" {{$bs->timezone == $timezone->timezone ? 'selected' : ''}}>{{$timezone->timezone}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label>Base Color Code **</label>
                          <input class="jscolor form-control ltr" name="base_color" value="{{$bs->primary_color}}">
                          @if ($errors->has('base_color'))
                            <p class="mb-0 text-danger">{{$errors->first('base_color')}}</p>
                          @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Secondary Base Color Code **</label>
                            <input class="jscolor form-control ltr" name="secondary_base_color" value="{{$bs->secondary_color}}">
                            @if ($errors->has('secondary_base_color'))
                                <p class="mb-0 text-danger">{{$errors->first('secondary_base_color')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                          <label>Admin Panel Dark Mode</label>
                          <select name="is_admin_dark" class="form-control ltr">
                              <option value="1" {{$bs->is_admin_dark == '1' ? 'selected' : ''}}>Dark Mode</option>
                              <option value="0" {{$bs->is_admin_dark == '0' ? 'selected' : ''}}>Light Mode</option>
                          </select>
                          @if ($errors->has('is_admin_dark'))
                            <p class="mb-0 text-danger">{{$errors->first('is_admin_dark')}}</p>
                          @endif
                      </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Hero Area Overlay Color Code **</label>
                            <input class="jscolor form-control ltr" name="hero_area_overlay_color" value="{{$bs->hero_overlay_color}}">
                            @if ($errors->has('hero_area_overlay_color'))
                            <p class="mb-0 text-danger">{{$errors->first('hero_area_overlay_color')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Hero Area Overlay Opacity **</label>
                            <input type="text" class="form-control ltr" name="hero_area_overlay_opacity" value="{{$bs->hero_overlay_opacity}}">
                            <p class="text-warning mb-0">Opacity can be between 0 to 1.</p>
                            @if ($errors->has('hero_area_overlay_opacity'))
                            <p class="mb-0 text-danger">{{$errors->first('hero_area_overlay_opacity')}}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Breadcrumb Area Overlay Color Code **</label>
                            <input class="jscolor form-control ltr" name="breadcrumb_area_overlay_color" value="{{$bs->breadcrumb_overlay_color}}">
                            @if ($errors->has('breadcrumb_area_overlay_color'))
                              <p class="mb-0 text-danger">{{$errors->first('breadcrumb_area_overlay_color')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Breadcrumb Area Overlay Opacity **</label>
                            <input type="text" class="form-control ltr" name="breadcrumb_area_overlay_opacity" value="{{$bs->breadcrumb_overlay_opacity}}">
                            <p class="text-warning mb-0">Opacity can be between 0 to 1.</p>
                            @if ($errors->has('breadcrumb_area_overlay_opacity'))
                              <p class="mb-0 text-danger">{{$errors->first('breadcrumb_area_overlay_opacity')}}</p>
                            @endif
                        </div>
                    </div>
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
    </div>
  </div>

@endsection
