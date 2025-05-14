@extends('components.frontend.layouts.master')

@section('pagename', 'All Services')

@section('meta-keywords', "$bs->services_meta_keywords")
@section('meta-description', "$bs->services_meta_description")

@section('breadcrumb-title', convertUtf8($bs->service_title))
@section('breadcrumb-subtitle', convertUtf8($bs->service_subtitle))
@section('breadcrumb-link', __('Our Services'))

@section('content')

    <header class="tc-header-style2 pb-50">
        <div class="container">
            <div class="top-info">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-8">
                            <h1> Our <span class="sub-font"> Services </span> </h1>
                            <div class="award-wrapper">
                                <p> With 5 years of experience </p>
                                <span class="line"></span>
                                <p> Since 2018 </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="side-info ps-lg-5">
                                <div class="facts-wrapper" data-speed="1" data-lag="0.5">
                                    <div class="title fsz-12 text-uppercase mb-30"> <i
                                            class="icon-6 bg-orange1 rounded-circle me-2"></i> The Facts </div>
                                    <div class="numbers">
                                        <div class="row">
                                            <div class="col-6">
                                                <h2 class="num sub-font"> <span class="counter">97</span>% </h2>
                                                <p> Clients Satisfied </p>
                                            </div>
                                            <div class="col-6">
                                                <h2 class="num sub-font"> <span class="counter">300</span>+ </h2>
                                                <p> Projects Done </p>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{asset('assets/frontend/images/subtract.png')}}" alt="" class="line">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <x-frontend.sections.front-page :$services/>

    <x-frontend.sections.testimonials/>

@endsection
