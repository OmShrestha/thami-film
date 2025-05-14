@props(['skipSlug' => ''])

<div {{ $attributes->merge(['class'=> 'row y-gap-30 pt-60']) }}>

    @foreach(\App\Models\Blog::where('slug', '!=', $skipSlug)->get() as $blog)
        <div class="col-lg-3 col-md-6">
            <a href="{{ route('blogs.show', [$blog->slug]) }}">
                <div data-anim-child="slide-up delay-2" class="blogCard -type-1">
                    <div class="blogCard__image">
                        <img src="{{ loadImageFor($blog->main_image) }}" alt="image">
                    </div>
                    <a href="{{ route('blogs.show', [$blog->slug]) }}" class="blogCard__category">
                        <div class="blogCard__content mt-20">
                            {{ $blog->bcategory?->name }}
                            <h4 class="blogCard__title text-17 lh-15 mt-5">
                                {{ $blog->title }}
                            </h4>
                            <div class="blogCard__date text-14 mt-5">
                                {{ $blog->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    </a>
                </div>
            </a>
        </div>
    @endforeach

</div>
