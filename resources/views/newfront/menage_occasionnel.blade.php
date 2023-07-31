@extends('layouts.base-front')
@section('content')

<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
          
            <div class="col-lg-8">
                <img class="img-fluid w-100 rounded mb-5" src="{{ asset('new-assets/img/bgimg-1.jpg')}}" alt>
                <h1 class="mb-4" style="color: #3800bf !important">
                    L’occasion d’un ménage
                    sans complexe</h1>
                <p>
                    Vous avez besoin d’un coup de pouce occasionnel pour le ménage de votre domicile ? 
                    Faites appel à 
                    <span class="fw-16 text-uppercase" style="color: #3800bf">Allô service </span>! Vous aurez plaisir à rentrer chez vous ! Le ménage occasionnel de votre intérieur sera fait avec précision et minutie grâce à nos experts ménage.
                </p>
            </div>
           

            <div class="col-lg-4">
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0" style="color: #3800bf !important">Nos ménages réguliers</h3>
                        </div>
                        @if(!is_null($menage_occasionnels))
                        @foreach($menage_occasionnels as $menage_occasionnel)
                            <div class="d-flex flex-column justify-content-start">
                                <a class="h5 fw-semi-bold bg-light rounded py-3 px-4 d-flex justify-content-between mb-2"
                                    href="#" style="color: #fff"><span>{{ $menage_occasionnel->libelle }}</span><i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        @endforeach
                        @endif
                </div>

                    {{-- <div class="wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Contact Information</h3>
                        </div>
                        <div class="bg-primary p-4">
                            <div class="d-flex align-items-center mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1">+012 345 6789</p>
                                    <p class="text-white mb-0">+012 345 6789</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1"><a
                                            href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="345d5a525b74514c55594458511a575b59">[email&#160;protected]</a>
                                    </p>
                                    <p class="text-white mb-0"><a
                                            href="https://demo.htmlcodex.com/cdn-cgi/l/email-protection"
                                            class="__cf_email__"
                                            data-cfemail="f3808683839c8187b3968b929e839f96dd909c9e">[email&#160;protected]</a>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <p class="text-white mb-1">Startup, 123 Street</p>
                                    <p class="text-white mb-0">New York, USA</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0"> Détail des prestations</h1>
    </div>
    <div class="row g-5">
        @if(!is_null($menage_occasionnels))
        @foreach($menage_occasionnels as $menage_occasionnel)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        @if(!is_null($menage_occasionnel->image_menage))
                            <img class="img-fluid w-100" src="ImageMenageOccsa/{{ $menage_occasionnel->image_menage}}" alt="">
                        @endif
                        {{-- <div class="team-social">
                            <a href="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demande prestation</a>
                            <a href="" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir prestataire</a>
                        </div> --}}
                    </div>
                    {{-- <div class="text-center py-3">
                        <h6 class="text-primary" style="color: #fff">{{ $regul->libelle }}</h6>
                    </div> --}}

                    <div class="text-center py-4">
                        <h6 class="m-0 text-uppercase" style="color: #FFFF">{{ $menage_occasionnel->libelle}}</h6><br>
                        <a class="text-uppercase" href="{{ url('details/menage-occasionnel',  $menage_occasionnel->slug) }}" style="color: #fff">En savoir plus<i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
    </div>
   
</div>

@endsection