@extends('layouts.base-front')
@section('content')

<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <a href="{{ url('demander-un-devis') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Demander un devis <i class="bi bi-arrow-right"></i></a>
        <div class="row g-5">
            
             @if(!is_null($modedepartement)) 
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
                                <a class="h5 fw-semi-bold bg-light rounded py-3 px-4 d-flex justify-content-between mb-2"
                                href="#" style="color: #fff"><span>{{ $mode->libelle}}</span> <i class="bi bi-arrow-right"></i>
                            </a>
                            </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div> 
@endsection