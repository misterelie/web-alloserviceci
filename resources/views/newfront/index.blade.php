<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Entreprise - Allô service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content name="keywords">
    <meta content name="description">

    <link href="img/favicon.html" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;family=Rubik:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <link
        href="{{ asset('new-assets/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('new-assets/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css') }}"
        rel="stylesheet">

         <!-- Libraries Stylesheet -->
    
    <link href="{{ asset('new-assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('new-assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('new-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('new-assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner">
            
        </div>
    </div> --}}

    <div class="container-fluid bg-dark px-5 d-none d-lg-block" style="background: red">
        @include('partials-front.topbar-header')
    </div>

    <div class="container-fluid position-relative p-0">
        @include('partials-front.navbar')
    </div>

    <div class="container" data-wow-delay="0.1s">
        @include('partials-front.statistics')
    </div>

    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.prestation')
    </div>


     <div class="modal fade" id="searchModal" tabindex="-1">
        @include('partials-front.searchModal')
    </div> 

    <div class="container-fluid pt-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.about')
    </div>



    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.services')
    </div> --}}


    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.process')
    </div> --}}


    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.pricing')
    </div> --}}

{{-- 
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.faq')
    </div> --}}


    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.testmonials')
    </div> --}}


    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.contacts')
    </div> --}}

    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.blog')
    </div> --}}


    {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.carousel')
    </div> --}}


    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.footer')
    </div>

    <div class="container-fluid text-white" style="background: #061429;">
        @include('partials-front.all-rights')
    </div>


    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script data-cfasync="false"
        src="{{ asset('new-assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>

    <script src="{{ asset('new-assets/code.jquery.com/jquery-3.4.1.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/wow/wow.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/easing/easing.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/waypoints/waypoints.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/counterup/counterup.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/owlcarousel/owl.carousel.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/isotope/isotope.pkgd.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/lib/lightbox/js/lightbox.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/js/main.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript">
    </script>

    <script src="{{ asset('new-assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="2e4e4b8a462ae5e81adbf0d1-|49" defer>
    </script>

        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
</body>

</html>