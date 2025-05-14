<header class="container py-8">
        <div class="row justify-content-between align-items-center">
            <div class="d-flex align-items-center col-auto logo ">
               <a href="{{url('/')}}"> <img src="{{ asset('logo.png') }}" alt="Logo" width="100"></a>
                <div class="ms-3 font-heading-24 fw-semibold text-blue-500">
                    <p class="mb-0">Overseas Nepali Forum</p>
                    <span>प्रवासी नेपाली मञ्च</span>
                </div>
            </div>
            <div class="col-auto gap-24 font-heading-24 icons d-none d-md-flex">
                <a href="https://www.facebook.com/ONFGlobal" target="_blank">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="{{ route('frontend.changeLanguage', 'en') }}" class="language-btn">
                <img src="{{ asset('assets/lfm/static/united-states.png') }}" alt="English" width="30" class="me-1"> EN
                </a>
                <a href="{{ route('frontend.changeLanguage', 'np') }}" class="language-btn">
                <img src="{{ asset('assets/lfm/static/nepal.png') }}" alt="Nepali" width="30" class="me-1"> NP
                </a>
            </div>
        </div>
    </header>