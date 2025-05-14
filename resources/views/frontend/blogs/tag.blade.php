@extends('components.frontend.layouts.master')

@section('pagename')

    @if (empty($tag))
        {{__('All')}}
    @else
        Tag - {{convertUtf8($tag->name)}}
    @endif
@endsection

@section('meta-keywords', "$bs->blogs_meta_keywords")
@section('meta-description', "$bs->blogs_meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_title))
@section('breadcrumb-subtitle', convertUtf8($bs->blog_subtitle))
@section('breadcrumb-link', $tag->name)

@section('content')

    <x-frontend.breadcrumb
        title="{{($category->name)}}"
        subtitle="{{($category->name)}}"
    />

@endsection
