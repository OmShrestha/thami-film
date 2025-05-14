@extends('admin.layout')
@section('content')
    <div class="page-header">
        <h4 class="page-title">Basic Settings</h4>
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
                <a href="#">Update Site Settings</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">All Options</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-title text-center">Update Site Settings - <strong>{{ ucfirst(session('siteName')) }}</strong></div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-3 pb-5">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <form id="siteSettingForm" action="{{route('admin.basic-settings.update')}}" method="post">
                                @csrf
                                <div class="row pb-3 d-flex justify-content-between mx-2">
                                    <input type="text" class="form-control border border-2 col-lg-5 mb-2" id="search-setting"
                                           placeholder="Search Setting">
                                    <button type="submit" class="btn btn-primary">Update Settings</button>
                                </div>

                                @foreach($settings as $type => $groupedSettings)
                                    <div class="row mx-2 mt-4 mb-1">
                                        <h2><span
                                                class="text-primary font-weight-bold">{{ ucfirst($type ?: 'Miscellaneous') }}</span>
                                        </h2>
                                    </div>

                                    @foreach($groupedSettings as $setting)
                                        <div class="form-group row pb-4 setting-row"
                                             data-setting-name="{{ $setting->name }}" data-setting-value="{{ $setting->value }}">

                                            <div class="col-lg-6 mb-2 pr-1">
                                                <label for="{{ $setting->name }}">{{ ucfirst(str_replace('_', ' ', $setting->name)) }}</label>
                                                <input id="{{ $setting->name }}" name="settings[{{ $setting->id }}][name]"
                                                       value="{{ $setting->name }}" type="text" class="form-control"
                                                       placeholder="Enter {{ $setting->name }}" readonly="readonly">
                                                @if ($errors->has('settings.'.$setting->id.'.name'))
                                                    <p class="text-danger mb-0">{{$errors->first('settings.'.$setting->id.'.name')}}</p>
                                                @endif
                                            </div>

                                            <div class="col-lg-6 mb-2 pl-1">
                                                <label for="type">Type</label>
                                                <select name="settings[{{ $setting->id }}][type]" class="form-control">
                                                    <option value="" readonly selected>
                                                        Select type for {{ $setting->name }}</option>
                                                    <option value="system" {{ $setting->type == 'system' ? 'selected' : '' }}>
                                                        System
                                                    </option>
                                                    <option value="title" {{ $setting->type == 'title' ? 'selected' : '' }}>
                                                        Title and SEO
                                                    </option>
                                                    <option value="boolean" {{ $setting->type == 'boolean' ? 'selected' : '' }}>
                                                        Active/Inactive
                                                    </option>
                                                    <option value="image" {{ $setting->type == 'image' ? 'selected' : '' }}>
                                                        Images and Files
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-lg-12 mb-2">
                                                <textarea id="{{ $setting->name }}" name="settings[{{ $setting->id }}][value]" class="form-control"
                                                          placeholder="Enter {{ $setting->name }}" rows="3">{{ $setting?->value }}</textarea>
                                                @if ($errors->has('settings.'.$setting->id.'.value'))
                                                    <p class="text-danger mb-0">{{$errors->first('settings.'.$setting->id.'.value')}}</p>
                                                @endif
                                            </div>

                                        </div>
                                    @endforeach
                                @endforeach
                                <button type="submit" class="btn btn-primary mt-4">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.getElementById('search-setting').addEventListener('input', function (e) {
            console.log(e.target.value);
            const searchTerm = e.target.value.toLowerCase();
            document.querySelectorAll('.setting-row').forEach(function (row) {
                const name = row.getAttribute('data-setting-name').toLowerCase();
                const value = row.getAttribute('data-setting-value').toLowerCase();
                if (name.includes(searchTerm) || value.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
