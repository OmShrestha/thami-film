@extends('components.frontend.layouts.master')

@section('pagename')
    {{convertUtf8($service->title)}}
@endsection

@section('meta-keywords', "$service->meta_keywords")
@section('meta-description', "$service->meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_details_title))
@section('breadcrumb-subtitle', strlen($service->title) > 30 ? mb_substr($service->title, 0, 30, 'utf-8') . '...' : $service->title)
@section('breadcrumb-link', __('Service Detail'))

@section('styles')
    <style>
        .content-body p {
            line-height: 2;
            margin-bottom: 0 !important;
        }

        .content-body a {
            color: var(--color-primary);
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

    <x-frontend.breadcrumb
        title="{{($category->name)}}"
        subtitle="{{($category->name)}}"
    />

@endsection

@section('scripts')

@endsection
