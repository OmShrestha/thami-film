@extends("components.frontend.layouts.master")

@section('pagename')
    About Us
@endsection

@section('content')
{{--    <section class="tc-about-style6">--}}
{{--        <div class="container">--}}
{{--            <div class="info pt-70 pb-50">--}}
{{--                <h2 class=""> Everything you will ever need <br>to build your Product.--}}
{{--                </h2>--}}
{{--                <p class=""> Learn more about us and how we work properly. <br>View our key players that will help you along your path</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <x-frontend.sections.landing-portfolio/>

{{--    <x-frontend.sections.address-block :bs="$bs"/>--}}
@endsection
