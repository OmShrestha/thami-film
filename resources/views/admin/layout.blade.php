<!DOCTYPE html>
<html lang="en">
<meta name="robots" content="noindex, nofollow">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <title>{{$bs->website_title}}</title>
    <link rel="icon" href="{{ loadImageFor('static/logo/favicon.svg') }}">
    @includeIf('admin.partials.styles')

    <style>
        @media (min-width: 992px) {
            .modal-lg {
                max-width: 1300px;
            }
        }

        .form-control {
            font-size: 14px;
            border-color: #c0c0c0 !important;
        }
    </style>

    @yield('styles')

    @if($bs->is_admin_dark == 1)
        <style>
            .sidebar .nav > .nav-item a p, .sidebar[data-background-color="white"] .nav > .nav-item a p,
            .sidebar .nav > .nav-item a i, .sidebar[data-background-color="white"] .nav > .nav-item a i,
            .sidebar .nav > .nav-item a .caret, .sidebar[data-background-color="white"] .nav > .nav-item a .caret {
                color: #ffffff !important;
            }

            .modal-content {
                background: #1a2035;
            }
        </style>
    @endif

</head>

<body @if($bs->is_admin_dark == 1) data-background-color="dark" @else data-background-color="white" @endif>

<div class="wrapper @if(request()->routeIs('admin.file-manager')) overlay-sidebar @endif">
    @includeIf('admin.partials.top-navbar')
    @includeIf('admin.themeHome.homePageAnchor')
    @includeIf('admin.partials.side-navbar')

    <div class="main-panel">
        <div class="container">
            <div class="page-inner @if(request()->routeIs('admin.file-manager') || request()->routeIs('admin.dashboard')) p-0 @endif">
                @yield('content')
            </div>
        </div>
        @includeIf('admin.partials.footer')
    </div>

</div>

@includeIf('admin.partials.scripts')

<div class="request-loader">
    <img src="{{asset('assets/admin/img/loader.gif')}}" alt="Loading...">
</div>

<!-- LFM Modal -->
<div class="modal fade lfm-modal" id="lfmModalSummernote" tabindex="-1" role="dialog" aria-labelledby="lfmModalSummernoteTitle"
     aria-hidden="true">
    <i class="fas fa-times-circle"></i>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <iframe src="" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

</body>
</html>
