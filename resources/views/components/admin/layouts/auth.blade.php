<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <title>{{$bs->website_title}}</title>
    <link rel="icon" href="{{ loadImageFor('sites/miscellaneous/favicon.png') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    @vite('resources/css/admin/auth.css')
</head>
<body style="background-image: url('{{ loadImageFor('static/miscellaneous/login-bg.png') }}')">

<div class="container">
    <div class="row justify-content-center align-items-center px-2 form-row">
        <div class="col-12 col-lg-4 form">
            <div class="text-center pb-3 mb-3 border-bottom">
                <img class="login-logo w-25" src="{{ loadImageFor('static/logo/logo.svg') }}" alt="Admin">
                <p class="login-text font-weight-bold pt-3 text-secondary mb-0">{{ __('Wom Academy Management') }}</p>
            </div>

            @if (session()->has('alert'))
                <div class="alert alert-danger fade show text-center" role="alert" style="font-size: 13px;">
                    {{session('alert')}}
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success fade show" role="alert" style="font-size: 14px;">
                    <strong>Success!</strong> {{session('success')}}
                </div>
            @endif

            @yield('content')

        </div>
    </div>
</div>

@yield('scripts')

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('auth-form');
        if (!form) return;
        form.addEventListener('submit', function () {
            document.getElementById('submit').innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-spin mr-10"></i> Processing...';
            document.getElementById('submit').setAttribute('disabled', 'disabled');
        })
    });
</script>

</body>
</html>
