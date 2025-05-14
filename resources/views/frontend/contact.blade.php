@extends("components.frontend.layouts.master")

@section('pagename')
    Contact Us
@endsection

@section('content')

    <header class="tc-inner-header-style1 pb-10 pt-70">
        <div class="container">
            <div class="info">
                <h1 class="js-title" style="font-size: 5rem"> Say Hi! </h1>
                <div class="text fsz-18 color-666 mt-4"> Want to chat further? We’d love to hear from you, let us
                    opportunity <br> to make your dream become reality
                </div>
            </div>
        </div>
    </header>

    <x-frontend.sections.address-block :bs="$bs"/>

    <!--  Start map  -->
    <section class="tc-map-style1" style="background-color: transparent">
        <div class="map-card wow zoomIn slow" data-wow-delay="0.2s">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.055488708109!2d85.34554151158248!3d27.684679826390482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c838036a71%3A0xaf4097cf38472caf!2sWoM%20-%20Marketing!5e0!3m2!1sen!2snp!4v1721435849878!5m2!1sen!2snp"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!--  End map  -->

    <x-frontend.sections.contact-form/>

@endsection
