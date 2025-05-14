@extends('components.admin.layouts.auth')
@section('content')
    <form class="login-form" action="{{route('admin.forget.mail')}}" id="auth-form" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Enter email address"/>
        @if ($errors->has('email'))
            <p class="error-text text-danger text-left mt-1">{{$errors->first('email')}}</p>
        @endif
        <button id="submit" type="submit">Send Mail</button>
    </form>

    <p class="back-link">
        <a class="forget-link text-secondary text-right mb-4" href="{{route('admin.login')}}">Back to Login</a>
    </p>
@endsection
