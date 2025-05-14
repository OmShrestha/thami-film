@extends("components.frontend.layouts.master")

@section('pagename')
    About Us
@endsection

@section('content')
    <section class="tc-about-style6">
        <div class="container">
            <div class="info pt-70 pb-50">
                <h2 class="about-quote" id="about-quote"> Everything you will ever need <br>to build your Product.
                </h2>
                <p class=""> Learn more about us and how we work properly. <br>View our key players that will help you along your path</p>
            </div>
        </div>
    </section>

    <section class="tc-about-style7 pt-70">
        <div class="container">
            <div class="row gx-0 justify-content-between">
                <div class="col-lg-3">
                    <div class="rotate-box" data-speed="1" data-lag="0.4">
                        <a href="#" class="rotate-circle fsz-30 rotate-text d-inline-block text-uppercase">
                            <svg class="textcircle" viewBox="0 0 500 500">
                                <defs>
                                    <path id="textcircle"
                                          d="M250,400 a150,150 0 0,1 0,-300a150,150 0 0,1 0,300Z">
                                    </path>
                                </defs>
                                <text>
                                    <textPath xlink:href="#textcircle" textLength="900"> 5 years of experience - </textPath>
                                </text>
                            </svg>
                        </a>
                        <img src="{{ asset('assets/frontend/images/leafs.png') }}" alt="" class="icon">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="info wow fadeInUp slow" data-wow-delay="0.2s">
                        <div class="text fsz-25 fw-500 mb-20">
                            A dedicated, experienced, proactive team here to help you grow

                        </div>
                        <div class="text fsz-25 fw-500 mb-20">
                            At WoM Marketing Inc., we live and breathe digital. Our story is one of passion, innovation, and a relentless
                            pursuit of excellence. With a diverse team of experts, we've been reshaping the digital frontier since 2020.
                            What sets us apart? It's not just the results; it's the journey we take with our clients. Your success is our
                            success, and we're committed to pushing boundaries and breaking molds to make it happen.


                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="numbers mt-5 mt-lg-0">
                        <div class="number-card wow zoomIn slow" data-wow-delay="0.4s">
                            <h2 class="numb"> 40+ </h2>
                            <small> Clients Satisfied and repeating </small>
                        </div>
                        <div class="number-card wow zoomIn slow" data-wow-delay="0.6s">
                            <h2 class="numb"> 500+ </h2>
                            <small> projects done </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



{{--    <x-frontend.sections.team/>--}}

    <x-frontend.sections.workflow/>

    <x-frontend.sections.address-block :bs="$bs"/>
@endsection
