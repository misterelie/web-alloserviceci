@extends('layouts.base-front')
@section('content')

@if(!is_null($modedepartement)) 
<div class="wow fadeInUp" data-wow-delay="0.1s">
    <div class="container-fluid py-5 bg-header">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">{{ $departement->libelle  }}</h1>
                <a href="{{ url('/')}}" class="h5 text-white">Accueil</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h5 text-white">{{ $mode->libelle }}</a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row g-5">
                <div class="col-lg-8">
                    <img class="img-fluid w-100 rounded mb-5" src="/ImagesModePrestations/" alt>
                    <h1 class="mb-4" style="color: #3800bf !important">
                        {{ $modedepartement->titre }}
                    </h1>
                    <p>
                        {!! $modedepartement->description !!}
                    </p>
                   
                </div>
                <div class="col-lg-4">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                            <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                                <h3 class="mb-0" style="color: #3800bf !important">
                                    {{ $departement->libelle  }}
                                </h3>
                            </div>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="h5 fw-semi-bold btn btn-primary rounded py-3 px-4 d-flex justify-content-between mb-2"
                                    href="{{ url('demander-un-devis') }}" style="color: #fff">Demander un devis<i class="bi bi-arrow-right"></i>
                                </a>
                                @if(!is_null($modedepartement->image_prestation))
                                    <img class="img-fluid w-100" src="/Uploaddepart/{{ $modedepartement->image_prestation }}">
                                @endif
                            </div>
                            
                    </div>
                </div>
            @endif
        </div>
    </div>
</div> 
@endsection