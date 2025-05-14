
@extends("components.frontend.layouts.master")

@section('pagename')
    Payment
@endsection

@section('content')
    <!-- Header -->
    <!-- <header class="bg-dark text-white text-center py-4">
        <h1>Gallery Page</h1>
        <p class="lead">Explore our collection of beautiful images</p>
    </header> -->

    <!-- Gallery Section -->
    <section class="container py-5">
        <div class="row g-4">
            <!-- Image 1 -->
            @foreach($galleries as $gallery)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-img-top fixed-height-img">
                    <img src="{{asset($gallery->image)}}" class="card-img-top" alt="Image 1" data-bs-toggle="modal" data-bs-target="#image{{$gallery->title}}">
                </div>
            </div>
            @endforeach
           
        </div>
    </section>
    @foreach($galleries as $gallery)
    <!-- Image Modal -->
    <div class="modal fade" id="image{{$gallery->title}}" tabindex="-1" aria-labelledby="imageModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="image{{$gallery->title}}">{{$gallery->title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{asset($gallery->image)}}" class="img-fluid" alt="Image 1">
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection
