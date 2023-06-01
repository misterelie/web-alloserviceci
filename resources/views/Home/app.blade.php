@extends('Home.layout')

@section('content')

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Bienvenue à Allô Service !</h1>
        </div>
    </div>
</div>
</div>

<div class="container-fluid facts py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-white1 d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-users text-primary1"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white mb-0">Demandes enregistrées</h5>
                        <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-primary1 d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-check text-white1"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-primary mb-0">Prestataires disponible</h5>
                        <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>
            <br />

            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-white1 d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fa fa-award text-primary1"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white mb-0">Clients satisfaits</h5>
                        <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Facts Start -->





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
                        <h4 class="text-primary">Femmes de ménages</h4>
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
                        <h4 class="text-primary">Plombiers</h4>
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
                        <h4 class="text-primary">Menuisiers</h4>
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
                        <h4 class="text-primary">Mécaniciens</h4>
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
        <a href="{{ route('app_nosprestation') }}" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Voir toutes nos prestations</a>
    </div>
</div>






<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">

                    <h1 class="mb-0">A propos de Nous</h1>
                </div>
                <p class="mb-4">Allô service, fort de son image et de sa notoriété s'engage à toujours mettre au service de ses clients des prestataires professionnels maitrisant leurs domaines d'activité. Nos prestataires sont testés et formés et évalués. Seuls les meilleurs, répondant à des critères très sélectif de rigueur et de professionnalisme, sont gardés et mis à disposition de nos clients.</p>

                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h4 class="mb-2"><b>Contactez-nous ici</b></h4>
                        <h5 class="mb-2">+225 27 22 26 88 43</h5>
                    </div>
                </div>
                <a href="{{ route('app_prestation') }}" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Demander une prestation</a>
            </div>
            <div class="col-lg-4" style="min-height: 300px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('assets/img/about123.jpg') }}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Team End -->

@endsection
