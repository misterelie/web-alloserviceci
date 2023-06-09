

<div class="#">
    <div class="row gx-5">
        @if(!is_null($assistances))
        @foreach($assistances as $assistance)
        <div class="col-lg-4 col-md-6 footer-about">
            <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                <a href="index.html" class="navbar-brand" height="20" width="20" alt="">
                    <h1 class="m-0 text-white"> <img class="" src="{{ asset('envellope.jpg') }}" height="30" width="30" alt="">Newsletter</h1>
                </a>
                <p class="mt-3 mb-4">Souscrivez à notre alerte mail pour recevoir régulièrement nos offres</p>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Adresse E-mail">
                        <button class="btn btn-dark">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="text-light mb-0">Nous contacter</h3>
                    </div>
                    @if(!is_null($assistance->telephone1))
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">{{$assistance->telephone1}}</p>
                        </div>
                   @endif
                    
                   @if(!is_null($assistance->telephone2))
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">{{$assistance->telephone2}} </p>
                        </div>
                    @endif

                    @if(!is_null($assistance->telephone3))
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">{{$assistance->telephone3}} </p>
                        </div>
                    @endif

                    @if(!is_null($assistance->whatsapp))
                        <div class="d-flex mb-2">
                            <i class="fab fa-whatsapp fw-normal text-primary me-2" aria-hidden="true"></i>
                            <p class="mb-0">{{$assistance->whatsapp}} </p>
                        </div>
                    @endif

                    @if(!is_null($assistance->whatsapp))
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">{{$assistance->email}}</p>
                        </div>
                    @endif

                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="text-light mb-0">Liens rapides</h3>
                    </div>
                    <div class="link-animated d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{ url('/')}}"><i class=" bi bi-arrow-right text-primary me-2"></i>Accueil</a>
                        <a class="text-light mb-2" href="{{ route('front.presentaion') }}">
                            <i class="bi bi-arrow-right text-primary me-2"></i>Présentation</a>
                        <a class="text-light mb-2" href="{{ route('front.nos-prestations') }}"><i class="bi bi-arrow-right text-primary me-2"></i>
                            Nos prestations</a>
                        <a class="text-light mb-2" href="{{ route('ask.prestation') }} "><i class="bi bi-arrow-right text-primary me-2"></i>Demande de prestation</a>
                        <a class="text-light mb-2" href="{{ route('ask.prestataire') }}"><i class="bi bi-arrow-right text-primary me-2"></i>Devenir un prestataire</a>
                        <a class="text-light" href="{{ route('front.contact') }}"><i class=" bi bi-arrow-right text-primary me-2"></i>Contact</a>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="text-light mb-0">Suivez-nous</h3>
                    </div>
                    <div class="d-flex mt-4">
                        <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100085672158407"><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100085672158407"><i class="fab fa-youtube fw-normal"></i></a>
                        <a class="btn btn-primary btn-square" href="https://www.facebook.com/profile.php?id=100085672158407"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endforeach
@endif
</div>
