@extends("components.frontend.layouts.master")

@section('pagename')
    {{convertUtf8($page->title)}}
@endsection

@section('meta-keywords', "$page->meta_keywords")
@section('meta-description', "$page->meta_description")

@section('styles')
    <style>
        .content-body a {
            color: var(--color-primary) !important;
            text-decoration: underline;
        }

        .content-body ol li {
            list-style-type: decimal;
            margin-bottom: 5px;
        }

        .content-body ul li {
            list-style-type: disc;
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('content')

    <section class="page-header -type-1 pt-80 mt-60">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div data-animation="slide-up delay-1">
                            <h1 class="page-header__title">
                                {{convertUtf8($page->title)}}
                            </h1>
                        </div>
                        <div data-animation="slide-up delay-2">
                            <p class="page-header__text">
                                {{convertUtf8($page->subtitle)}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pb-lg">
        <div class="container">
            <div class="row content-body">
                {!! sanitizeHtml(replaceBaseUrl($page->body)) !!}
            </div>
        </div>
    </section>
@endsection
