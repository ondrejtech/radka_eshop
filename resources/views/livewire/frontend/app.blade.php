<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Ecommerce - itexpertsnet.online</title>

    <meta name="author" content="www.itexpertsnet.online">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fonts.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/fonts/font-icons.css')}}">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/drift-basic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/image-compare-viewer.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jqueryui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/photoswipe.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/logo/favicon.png')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{asset('assets/scss/_reset.scss')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/scss/_responsive.scss')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/scss/_sections.scss')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/scss/abstracts/_index.scss')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/scss/abstracts/_mixin.scss')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/scss/abstracts/_variable.scss')}}">--}}
</head>

    <body class="preload-wrapper">
    <!-- Header Section -->
        @livewire('frontend.layouts.header'
)

        <!-- Main Content Section -->
        <main>
            @yield('content') <!-- This is where the main content for each page goes -->
        </main>

        <!-- Footer Section -->
    <footer id="footer" class="footer">
        @livewire('frontend.layouts.footer')
    </footer>

    <!-- Scripts -->
{{--    <script type="module" src="{{ asset('assets/js/jquery-3.6.2.min.js') }}"></script>--}}
    <!-- Add all other JS files similarly -->
    </body>
{{--        <script type="module" src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script type="module" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/carousel.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/count-down.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/drift.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/image-compare-viewer.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/image-compare-viewer.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/jquery-validate.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/jqueryui.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/lazysize.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/model-viewer.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/multiple-modal.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/photoswipe-lightbox.esm.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/photoswipe.esm.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/plugin.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/rangle-slider.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/shop.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script type="module" src="{{ asset('assets/js/zoom.js') }}"></script>
    @livewireScripts
</html>
