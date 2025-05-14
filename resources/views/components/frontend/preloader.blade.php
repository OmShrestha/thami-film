{{--<div class="style_introduction" style="top: 0vh;">--}}
{{--    <p><span></span>Hello</p>--}}
{{--    <p><span></span>Ciao</p>--}}
{{--    <p><span></span>नमस्ते</p>--}}
{{--    <p><span></span>Bonjour</p>--}}
{{--    <p><span></span>안녕하세요</p>--}}
{{--    <svg>--}}
{{--        <path d="M0 0 L1839 0 L1839 528 Q919.5 828 0 528  L0 0"></path>--}}
{{--    </svg>--}}
{{--</div>--}}

@if ($bs->preloader_status == 1 && !empty($bs->preloader))
    <div class="loader-wrap" id="preloader">
        <div class="loader revolve loader-wrap-heading">
            <img src="{{asset('assets/frontend/images/' . $bs->preloader)}}" alt="Loading..." width="150">
        </div>
    </div>
@endif
