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
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet"type="text/css" href="{{asset('assets/css/styles.css')}}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/logo/favicon.png')}}">

</head>

    <body class="preload-wrapper">
    <!-- Header Section -->
        @livewire('frontend.layouts.header')

        <!-- Main Content Section -->
        <main>
            @yield('content') <!-- This is where the main content for each page goes -->
        </main>

        <!-- Footer Section -->
    <footer id="footer" class="footer">
        @livewire('frontend.layouts.footer')
    </footer>

    <!-- Scripts -->
{{--    <script src="{{ asset('assets/js/jquery-3.6.2.min.js') }}"></script>--}}
    <!-- Add all other JS files similarly -->
    </body>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap-select.min')}}.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/lazysize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/count-down.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>

    @livewireScripts
</html>
