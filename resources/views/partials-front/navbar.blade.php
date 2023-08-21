{{-- <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/')}}" class="nav-item nav-link">Accueil</a>

            @if(!is_null($departements))
            @foreach($departements as $departement)
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $departement->libelle }}</a>
                    <div class="dropdown-menu m-0">
                        @if($departement->modes)
                        @foreach($departement->modes as $mode)
                            <a href="{{ url('nos-type-service', $mode->id )}}" class="dropdown-item">{{ $mode->mode}}</a>
                        @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
            @endif

            <a href="{{ route('front.nos-prestations') }}" class="nav-item nav-link">Nos prestations</a>
            
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Demandez un service</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('ask.prestation') }}" class="dropdown-item">Demandez une prestation</a>
                    <a href="{{ route('ask.prestataire') }}" class="dropdown-item">Devenir un prestataire</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Réalisations</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ url('nos/realisations') }}" class="dropdown-item">Galeries de réalisation</a>
                    <a href="{{ url('temoignages/clients')}}" class="dropdown-item">Témoingnages</a>
                </div>
            </div>
            <a href="{{ url('contactez/nous')}}" class="nav-item nav-link">Contact</a>
            <a href="{{ url('demander-un-devis')}}" class="nav-item nav-link">Demander un devis </a>
          
           
        </div>
       
    </div>
</nav>

<div class="container-fluid bg-primary py-5 hero-header" style="margin-bottom: 90px;">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-8 pt-lg-5 mt-lg-5 text-center text-lg-start">
                <h5 class="text-white text-uppercase mb-3 animated slideInDown"><span class="text-primary">Maison & Prestataire de Services</span></h5>
            <h6 class="display-1 text-white text-center mb-md-4 animated zoomIn"><span class="">Bienvenue <br> à Allô Service</span>.</h6>
                <a href="http://www.vintage.alloservice.ci/" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                    Voir notre site vintage ci </a>
                <a href="https://technologies.alloservice.ci/" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                    Voir  Allô Service Technologies
                </a><br><br>
            </div>
        </div>
    </div>
</div> --}}


 <!-- Navbar & Carousel Start -->
 <div class="container-fluid position-relative p-0">
    {{-- <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="index.html" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Startup</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Accueil</a>
                <a href="about.html" class="nav-item nav-link">A propos</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        <a href="detail.html" class="dropdown-item">Blog Detail</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="price.html" class="dropdown-item">Pricing Plan</a>
                        <a href="feature.html" class="dropdown-item">Our features</a>
                        <a href="team.html" class="dropdown-item">Team Members</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        </div>
    </nav> --}}

    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        {{-- <a href="{{ url('/') }}" class="navbar-brand p-0">
            <img class="" src="{{ asset('new-assets/img/logoas.png') }}" width="120" alt="">
        </a>  --}}
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
                Devenir un prestataire
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
                    <a href="{{ url('temoignages/clients')}}" class="dropdown-item">Témoingnages</a>
                </div>
            </div>
            {{-- <a href="{{ url('demander-un-devis')}}" class="nav-item nav-link">Demander un devis </a> --}}
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
                        {{-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">
                           <span class="text-white fw-bold"> Nous prenons soins de votre maison !</span>
                        </h5> --}}
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">
                            Vous accompagner <span class="text-primary">notre priorité</span>
                        </h1>
                       
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