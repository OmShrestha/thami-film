@props(['title', 'subtitle'])

<section {{ $attributes(['class' => 'pt-3 pb-3']) }}>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-4 ps-1 text-left rounded-3">
                    <h1>{{ $title }}</h1>
                    <nav class="d-flex justify-content-start" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-dots m-0">
                            <li class="breadcrumb-item active"> {{ $subtitle }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
