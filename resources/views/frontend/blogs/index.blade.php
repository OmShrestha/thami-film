@extends('components.frontend.layouts.master')

@section('pagename')

    @if (empty($category))
        {{__('All')}}
    @else
        {{convertUtf8($category->name)}}
    @endif
    {{__('Blogs')}}
@endsection

@section('meta-keywords', "$bs->blogs_meta_keywords")
@section('meta-description', "$bs->blogs_meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_title))
@section('breadcrumb-subtitle', convertUtf8($bs->blog_subtitle))
@section('breadcrumb-link', __('Latest Blogs'))

@section('content')

    <header class="tc-header-style2 pb-50">
        <div class="container">
            <div class="top-info">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-8">
                            <h1> Blogs & <span class="sub-font"> News </span></h1>
                            <div class="award-wrapper">
                                <p> Stay up to date </p>
                                <span class="line"></span>
                                <p> Wom Marketing </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="side-info ps-lg-5">
                                <div class="facts-wrapper" data-speed="1" data-lag="0.5">
                                    <div class="title fsz-12 text-uppercase mb-30"><i
                                            class="icon-6 bg-orange1 rounded-circle me-2"></i> The Facts
                                    </div>
                                    <div class="numbers">
                                        <div class="row">
                                            <div class="col-6">
                                                <h2 class="num sub-font"><span class="counter">97</span>% </h2>
                                                <p> Clients Satisfied </p>
                                            </div>
                                            <div class="col-6">
                                                <h2 class="num sub-font"><span class="counter">300</span>+ </h2>
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

@endsection
