
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-success">Thank You!</h1>
            <p class="lead">{{$status}}</p>
            <p>Your generosity helps us continue our mission and make a difference.</p>
            <a href="/" class="btn btn-primary mt-3">Return to Home</a>
        </div>
    </div>
@endsection


