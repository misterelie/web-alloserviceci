{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Adresse Email')" />
            <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
           
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1">Souvenez-vous de moi</label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif

            <x-primary-button class="ml-3" style="background-color: #3800bf">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
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
    <link href="{{ asset('backend_admin/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css') }}" />

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

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Authentification</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Bienvenue ! </h5>
                                    <p class="text-muted">Se connecter pour continuer à Allo Service.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <form  method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Adresse Email</label>
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" :value="old('email')" autofocus autocomplete="username" placeholder="Entrer votre email">
                                            @error('email')
                                                <span class="text-danger">Veuillez entrer le bon email</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted">Mot de passe oublié?</a>
                                                @endif
                                            </div>

                                            <label class="form-label" for="password-input">Mot de passe</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password"  name="password" autocomplete="current-password"  class="form-control pe-5 password-input @error('password') is-invalid @enderror" placeholder="Entrer le mot de passe" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
                                                    <span class="text-danger">Veuillez saisir le mot de passe</span>
                                                 @enderror
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="remember" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Souvenez-vous de moi</label>
                                           
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Se connecter</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Vous n'avez pas de compte ? S'inscrire<a href="#" class="fw-semibold text-primary text-decoration-underline"> S'inscrire </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> Développé par   Allô service
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

     <!-- JAVASCRIPT -->
     <script src="{{asset('backend_admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('backend_admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
     <script src="{{asset('backend_admin/assets/libs/node-waves/waves.min.js')}}"></script>
     <script src="{{asset('backend_admin/assets/libs/feather-icons/feather.min.js')}}"></script>
     <script src="{{asset('backend_admin/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
     <script src="{{asset('backend_admin/assets/js/plugins.js')}}"></script>
 
     <!-- particles js -->
     <script src="{{asset('backend_admin/assets/libs/particles.js/particles.js')}}"></script>
 
     <!-- particles app js -->
     <script src="{{asset('backend_admin/assets/js/pages/particles.app.js')}}"></script>
 
     <!-- password-addon init -->
     <script src="{{asset('backend_admin/assets/js/pages/passowrd-create.init.js')}}"></script>
</body> 

{{-- </html>