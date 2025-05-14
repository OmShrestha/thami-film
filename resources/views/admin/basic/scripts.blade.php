@extends('admin.layout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Plugins</h4>
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
                <a href="#">Plugins</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form id="scriptForm" class="" action="{{route('admin.script.update')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-title">Facebook Login</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="is_facebook_login" value="1" class="selectgroup-input" {{$bs->is_facebook_login == 1 ? 'checked' : ''}}>
                                                    <span class="selectgroup-button">Active</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="is_facebook_login" value="0" class="selectgroup-input" {{$bs->is_facebook_login == 0 ? 'checked' : ''}}>
                                                    <span class="selectgroup-button">Inactive</span>
                                                </label>
                                            </div>
                                            @if ($errors->has('is_facebook_login'))
                                                <p class="mb-0 text-danger">{{$errors->first('is_facebook_login')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook App ID</label>
                                            <input class="form-control" name="facebook_app_id" value="{{$bs->facebook_app_id}}">
                                            @if ($errors->has('facebook_app_id'))
                                                <p class="text-danger">{{$errors->first('facebook_app_id')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook App Secret</label>
                                            <input class="form-control" name="facebook_app_secret" value="{{$bs->facebook_app_secret}}">
                                            @if ($errors->has('facebook_app_secret'))
                                                <p class="text-danger">{{$errors->first('facebook_app_secret')}}</p>
                                            @endif
                                            <p class="text-warning mb-0">Facebook App ID & App Secret are required for Facebook Login.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-title">Google Login</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="is_google_login" value="1" class="selectgroup-input" {{$bs->is_google_login == 1 ? 'checked' : ''}}>
                                                    <span class="selectgroup-button">Active</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="is_google_login" value="0" class="selectgroup-input" {{$bs->is_google_login == 0 ? 'checked' : ''}}>
                                                    <span class="selectgroup-button">Inactive</span>
                                                </label>
                                            </div>
                                            @if ($errors->has('is_google_login'))
                                                <p class="mb-0 text-danger">{{$errors->first('is_google_login')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Google Client ID</label>
                                            <input class="form-control" name="google_client_id" value="{{$bs->google_client_id}}">
                                            @if ($errors->has('google_client_id'))
                                                <p class="text-danger">{{$errors->first('google_client_id')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Google Client Secret</label>
                                            <input class="form-control" name="google_client_secret" value="{{$bs->google_client_secret}}">
                                            @if ($errors->has('google_client_secret'))
                                                <p class="text-danger">{{$errors->first('google_client_secret')}}</p>
                                            @endif
                                            <p class="text-warning mb-0">Goole Client ID & Client Secret are required for Facebook Login.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Google Analytics
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Google Analytics Status</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="is_analytics" value="1"
                                                       class="selectgroup-input" {{$bs->is_analytics == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Active</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="is_analytics" value="0"
                                                       class="selectgroup-input" {{$bs->is_analytics == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Inactive</span>
                                            </label>
                                        </div>
                                        @if ($errors->has('is_analytics'))
                                            <p class="mb-0 text-danger">{{$errors->first('is_analytics')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Google Analytics Script</label>
                                        <textarea class="form-control" name="google_analytics_script"
                                                  rows="5">{{$bs->google_analytics_script}}</textarea>
                                        @if ($errors->has('google_analytics_script'))
                                            <p class="mb-0 text-danger">{{$errors->first('google_analytics_script')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Google Recaptcha
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Google Recaptcha Status</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="is_recaptcha" value="1"
                                                   class="selectgroup-input" {{$bs->is_recaptcha == 1 ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="is_recaptcha" value="0"
                                                   class="selectgroup-input" {{$bs->is_recaptcha == 0 ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Inactive</span>
                                        </label>
                                    </div>
                                    @if ($errors->has('is_recaptcha'))
                                        <p class="mb-0 text-danger">{{$errors->first('is_recaptcha')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Google Recaptcha Site key</label>
                                    <input class="form-control" name="google_recaptcha_site_key"
                                           value="{{$bs->google_recaptcha_site_key}}">
                                    @if ($errors->has('google_recaptcha_site_key'))
                                        <p class="mb-0 text-danger">{{$errors->first('google_recaptcha_site_key')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Google Recaptcha Secret key</label>
                                    <input class="form-control" name="google_recaptcha_secret_key"
                                           value="{{$bs->google_recaptcha_secret_key}}">
                                    @if ($errors->has('google_recaptcha_secret_key'))
                                        <p class="mb-0 text-danger">{{$errors->first('google_recaptcha_secret_key')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Facebook Pixel
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Facebook Pixel Status</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="is_facebook_pexel" value="1"
                                                   class="selectgroup-input" {{$bs->is_facebook_pexel == 1 ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="is_facebook_pexel" value="0"
                                                   class="selectgroup-input" {{$bs->is_facebook_pexel == 0 ? 'checked' : ''}}>
                                            <span class="selectgroup-button">Inactive</span>
                                        </label>
                                    </div>
                                    @if ($errors->has('is_facebook_pexel'))
                                        <p class="mb-0 text-danger">{{$errors->first('is_facebook_pexel')}}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Facebook Pixel Script</label>
                                    <textarea class="form-control" name="facebook_pexel_script"
                                              rows="5">{{$bs->facebook_pexel_script}}</textarea>
                                    @if ($errors->has('facebook_pexel_script'))
                                        <p class="mb-0 text-danger">{{$errors->first('facebook_pexel_script')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Dynamic CSS Frontend
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Dynamic CSS Frontend Script</label><br><br><small>(Don't Use Style Tag. It's auto
                                        added)</small><br>
                                    <textarea class="form-control" name="dynamic_css" rows="10">{{$bs->dynamic_css}}</textarea>
                                    @if ($errors->has('dynamic_css'))
                                        <p class="mb-0 text-danger">{{$errors->first('dynamic_css')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Dynamic JavaScript Frontend
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Dynamic JavaScript Script</label><br><br><small>(Use Script Tag)</small> <br>
                                    <textarea class="form-control" name="dynamic_js" rows="10">{{$bs->dynamic_js}}</textarea>
                                    @if ($errors->has('dynamic_js'))
                                        <p class="mb-0 text-danger">{{$errors->first('dynamic_js')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-12 text-center">
                                    <button type="submit" form="scriptForm" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
