<!DOCTYPE html>
<html lang="en">
<head>
    @if ($bs->is_analytics == 1)
        {!! $bs->google_analytics_script !!}
    @endif

    @if ($bs->is_facebook_pixel == 1)
        {!! $bs->facebook_pixel_script !!}
    @endif

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pagename') @if (request()->path() != '/')
            |
        @endif {{ $bs->website_title }}</title>
    <x-frontend.seo.seo/>
    <meta name="keywords" content="@yield('meta-keywords')">
    <x-frontend.seo.favicon path="/"/>
    <x-frontend.fonts/>
    <x-frontend.styles/>
    <style>:root {
            --color-primary: {{ '#'.$bs->primary_color }}; /* #9A1F33 */
            --color-secondary: {{ '#'.$bs->secondary_color }}; /* #353368 */
        }</style>
        

    @yield('styles')
</head>

<body>
   
    <x-frontend.global.navbar/>
    <main>
        @yield('content')
    </main>
    <x-frontend.global.footer/>
    <section class="thecontainer d-none" style="height: 1vh !important;"></section>
<x-frontend.scripts/>

@yield('scripts')

{!! $bs->dynamic_js !!}

</body>
</html>
