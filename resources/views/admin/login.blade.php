@extends('components.admin.layouts.auth')

@section('content')
    <form class="login-form" action="{{route('admin.auth')}}" id="auth-form" method="POST">
        @csrf
        <label class="text-secondary" for="username">Username</label>
        <input type="text" name="username" id="username" required placeholder="*Authorized Personnel Only*"/>
        @if ($errors->has('username'))
            <p class="text-danger text-left">{{$errors->first('username')}}</p>
        @endif
        <label class="text-secondary" for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="Enter Code"/>
        @if ($errors->has('password'))
            <p class="text-danger text-left">{{$errors->first('password')}}</p>
        @endif

        <a class="forget-link text-secondary text-right mb-4" href="{{route('admin.forget.form')}}">Forgot
            Username or Password?</a>

        <button id="submit" type="submit">Login</button>
    </form>
@endsection
