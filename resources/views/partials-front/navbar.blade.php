
 <!-- Navbar & Carousel Start -->
 <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            
            <a href="{{ url('/')}}" class="nav-item nav-link">Accueil</a>
            @if (!is_null(Menu::departements()))
            @foreach (Menu::departements() as $departement)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{ $departement->libelle }}</a>
                        <div class="dropdown-menu m-0">
                            @if ($departmodes)
                                @foreach ($modedepartements as $modedepartement)
                                    <a href="{{ route('repassage', [$departement->slug, $modedepartement->id]) }}"
                                        class="dropdown-item">{{ $modedepartement->libelle }}</a>
                                @endforeach
                            @endif
                        </div>
                </div>
            @endforeach
            @endif

            <a href="{{ route('front.nos-prestations') }}" class="nav-item nav-link">Prestations</a>
            <a href="{{route('ask.prestataire')}}" class="nav-item nav-link">
                Prestataires
            </a>
            <a href="{{ url('contactez/nous')}}" class="nav-item nav-link">Contact</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    Services +</a>
              
                    <div class="dropdown-menu m-0">
                        @if(!is_null($services))
                        @foreach($services as $service)
                            <a href="https://technologies.alloservice.ci/" class="dropdown-item">
                                {{ $service->libelle }}
                            </a>
                        @endforeach
                        @endif
                    </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Réalisations</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ url('nos/realisations') }}" class="dropdown-item">Galeries de réalisation</a>
                    <a href="{{ url('temoignages/clients')}}" class="dropdown-item">Témoignages</a>
                </div>
            </div>
        </div>
    </div>
</nav>

    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset('new-assets/img/bg.jpeg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3">
                            <span class="text-primary fw-bolder animated zoomIn">Bienvenue à Allô Service !</span>
                        </h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">
                            Pensons autrement le service à la maison
                        </h1>
                        <a href="{{ route('ask.prestation') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Demander une prestation</a>
                        <a href="{{ url('demander-un-devis')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Demander un devis</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('new-assets/img/test-imge.avif')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">
                            Vous accompagner <span class="text-primary">notre priorité</span>
                        </h1>

                        <a href="{{ route('ask.prestataire') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Devenir un prestataire</a>
                        <a href="{{ url('demander-un-devis')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Demander un devis</a>
                       
                    </div>
                </div>
            </div> 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Navbar & Carousel End -->