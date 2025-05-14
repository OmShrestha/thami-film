@extends("components.frontend.layouts.master")

@section('pagename')
    {{ $blog->title }} - Blog
@endsection

@section('content')


    <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-body">
                    <h2 class="card-title text-center text-primary">{{ $blog->title }}</h2>
                    <img src="{{ loadImageFor($blog->main_image) }}" alt="{{ $blog->alt_text }}" class="w-100">
                    <p>{!! sanitizeHtml($blog->content) !!}</p>
                    </div>
                </div>
            </div>
        </div>


    <div class="container my-5">
    <div class="related-blogs-section">
      <h2 class="text-center mb-4">Related Blogs</h2>
      <div class="row g-4">
       <?php
      $blogs = \App\Models\Blog::where('slug', '!=', $blog->slug)->get();
       ?>
        @foreach($blogs->take(3) as $blog)
    
        <div class="col-md-4">
          <div class="card blog-card">
            <img src="{{ loadImageFor($blog->main_image) }}" class="card-img-top" alt="Blog 3">
            <div class="card-body">
              <h5 class="card-title">{{ $blog->title }}</h5>
              <a href="{{ route('blogs.show', [$blog->slug]) }}" class="btn btn-primary btn-sm">Read More</a>
            </div>
          </div>
        </div>
@endforeach
      </div>
    </div>
  </div>
    
@endsection
