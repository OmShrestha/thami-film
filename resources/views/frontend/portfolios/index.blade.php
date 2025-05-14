@extends('components.frontend.layouts.master')

@section('pagename', 'Our Works')

@section('meta-keywords', "$bs->portfolios_meta_keywords")
@section('meta-description', "$bs->portfolios_meta_description")

@section('breadcrumb-title', convertUtf8($bs->portfolio_title))
@section('breadcrumb-subtitle', convertUtf8($bs->portfolio_subtitle))
@section('breadcrumb-link', __('Our Works and Achievements'))

@section('content')

    <x-frontend.breadcrumb
        title="Portfolios"
        subtitle="Our Works and Achievements"
    />

@endsection
