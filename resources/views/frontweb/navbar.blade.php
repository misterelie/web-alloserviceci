<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="" class="navbar-brand">
        {{-- <h1 class="m-0 text-white"><img class="" src="{{ asset('logo-site-as.jpg') }}" height="30" width="160" alt=""></h1> --}}
        <h1 class="m-0 text-white"><img class="" src="{{ asset('logo1.png') }}" width="210" alt=""></h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link active">Accueil</a>
            <a href="{{ route('front.presentaion') }}" class="nav-item nav-link">Présentation</a>
            <a href="{{ route('front.nos-prestations') }}" class="nav-item nav-link">Nos prestations</a>
            <a href="{{ route('ask.prestation') }}" class="nav-item nav-link">Demandez une prestation</a>
            <a href="{{ route('ask.prestataire') }}" class="nav-item nav-link">Devenir un prestataire</a>
            <a href="{{ route('front.contact') }}" class="nav-item nav-link">Contact</a>
        </div>
    </div>
</nav>

<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Bienvenue à Allô Service !</h1>
        </div>
    </div>
</div>