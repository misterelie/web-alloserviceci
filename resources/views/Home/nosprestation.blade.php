@extends('Home.layout')

@section('content')

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Nos prestations</h1>
        </div>
    </div>
</div>
</div>

<!-- Team Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0"> Nos prestations</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/team-1.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Femmes de ménage</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/team-2.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Nounous</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/team-3.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Plombier</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/menuisie.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Menuisier</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/mecano.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Mécanicien</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/jardinier.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Jardiniers</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/coif.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Coiffeurs(euses)</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/chauf.jpg') }}" alt="">
                        <div class="team-social">
                            <a href="{{ route('app_prestation') }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                            <a href="{{ route('app_devenirprestataire') }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                        </div>
                    </div>
                    <div class="text-center py-3">
                        <h4 class="text-primary">Chauffeurs</h4>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Team End -->

@endsection
