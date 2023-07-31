<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">

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


            {{-- <a href="{{ url('section/repassage') }}" class="nav-item nav-link">Repassage</a> --}}
            
            {{-- <a href="#" class="nav-item nav-link">Jardinage</a> --}}

          

            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lessives</a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">Lessive régulier</a>
                    <a href="#" class="dropdown-item">Lessive occasionnel</a>
                </div>
            </div> --}}

             {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cusines</a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">Cusine régulière</a>
                    <a href="#" class="dropdown-item">Cusine occasionnelle</a>
                </div>
            </div> --}}

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
            {{-- <a href="{{ url('demander-un-devis')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Demander un devis <i class="bi bi-arrow-right"></i></a>  --}}
           
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
</div>