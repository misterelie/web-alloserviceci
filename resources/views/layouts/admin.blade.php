<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/velzon/html/material/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 10:58:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>TABLEAU DE BOARD | ALLO SERVICE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--datatable css-->
    <link rel="stylesheet"
        href="{{ asset('backend_admin/assets/cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
    <!--datatable responsive css-->
    <link rel="stylesheet"
        href="{{ asset('backend_admin/assets/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('backend_admin/assets/cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css') }}">


    <!-- jsvectormap css -->
    <link
        href="{{ asset('backend_admin/assets/libs/jsvectormap/css/jsvectormap.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('backend_admin/assets/libs/swiper/swiper-bundle.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Sweet Alert css-->
    <link
        href="{{ asset('backend_admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css') }}" />

    <!-- Layout config Js -->
    <script src="{{ asset('backend_admin/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend_admin/assets/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend_admin/assets/css/icons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend_admin/assets/css/app.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('backend_admin/assets/css/custom.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('partials-admin.navbar-header')
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            @include('partials-admin.remove_notification')
            <!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            @include('partials-admin.navbar-menu')
        </div>
        <!-- Left Sidebar End -->

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <!-- End Page-content -->
            @include('partials-admin.footer')

            @yield('content')

            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            @include('partials-admin.preloader')
        </div>

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
                data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- Theme Settings -->
        {{-- <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
            @include('partials-admin.theme')
        </div> --}}


        <!-- JAVASCRIPT -->
        <script
            src="{{ asset('backend_admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}">
        </script>
        <script src="{{ asset('backend_admin/assets/libs/simplebar/simplebar.min.js') }}">
        </script>
        <script src="{{ asset('backend_admin/assets/libs/node-waves/waves.min.js') }}">
        </script>
        <script src="{{ asset('backend_admin/assets/libs/feather-icons/feather.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}">
        </script>
        <script src="{{ asset('backend_admin/assets/js/plugins.js') }}"></script>

        <!-- prismjs plugin -->
        <script src="{{ asset('backend_admin/assets/libs/prismjs/prism.js') }}"></script>
        <script src="{{ asset('backend_admin/assets/libs/list.js/list.min.js') }}"></script>
        <script
            src="{{ asset('backend_admin/assets/libs/list.pagination.js/list.pagination.min.js') }}">
        </script>

        <!-- listjs init -->
        <script src="{{ asset('backend_admin/assets/js/pages/listjs.init.js') }}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ asset('backend_admin/assets/libs/sweetalert2/sweetalert2.min.js') }}">
        </script>

        <script src="{{ asset('backend_admin/assets/jquery/jquery-3.6.0.min.js') }}"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!--datatable js-->
        <script
            src="{{ asset('backend_admin/assets/cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}">
        </script>

        <!-- apexcharts -->
        <script src="{{ asset('backend_admin/assets/libs/apexcharts/apexcharts.min.js') }}">
        </script>

        <!-- Vector map-->
        <script
            src="{{ asset('backend_admin/assets/libs/jsvectormap/js/jsvectormap.min.js') }}">
        </script>
        <script
            src="{{ asset('backend_admin/assets/libs/jsvectormap/maps/world-merc.js') }}">
        </script>

        <!--Swiper slider js-->
        <script src="{{ asset('backend_admin/assets/libs/swiper/swiper-bundle.min.js') }}">
        </script>

        <!-- Dashboard init -->
        <script
            src="{{ asset('backend_admin/assets/js/pages/dashboard-ecommerce.init.js') }}">
        </script>

        <script src="{{ asset('backend_admin/assets/js/pages/datatables.init.js') }}">
        </script>

        <!-- App js -->
        <script src="{{ asset('backend_admin/assets/js/app.js') }}"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 11:00:52 GMT -->

<script>
    // const phoneInputField = document.querySelector("#phone");
    // const phoneInput = window.intlTelInput(phoneInputField, {
    //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    // });




    const input = document.querySelector("#phone1"); 
    const inputMobile = document.querySelector("#phone2");
    const inputVacation = document.querySelector("#telephone3");
    const inputWhatsapp = document.querySelector("#whatsapp");


window.intlTelInput(input, {
  initialCountry: "auto",
  geoIpLookup: callback => {
    fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("us"));
  },
  utilsScript: "/intl-tel-input/js/utils.js?1684676252775" // just for formatting/placeholders etc
});


window.intlTelInput(inputMobile, {
  initialCountry: "auto",
  geoIpLookup: callback => {
    fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("us"));
  },
  utilsScript: "/intl-tel-input/js/utils.js?1684676252775" // just for formatting/placeholders etc
});

window.intlTelInput(inputVacation, {
  initialCountry: "auto",
  geoIpLookup: callback => {
    fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("us"));
  },
  utilsScript: "/intl-tel-input/js/utils.js?1684676252775" // just for formatting/placeholders etc
});

window.intlTelInput(inputWhatsapp, {
  initialCountry: "auto",
  geoIpLookup: callback => {
    fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("us"));
  },
  utilsScript: "/intl-tel-input/js/utils.js?1684676252775" // just for formatting/placeholders etc
});


    
    
</script>

</html>