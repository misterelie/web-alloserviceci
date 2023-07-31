@extends('layouts.base-front')
@section('content')

<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <a href="{{ url('demander-un-devis')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Demander un devis <i class="bi bi-arrow-right"></i></a>
        <div class="row g-5">
            
            @if(!is_null($mode))
                <div class="col-lg-8">
                    <img class="img-fluid w-100 rounded mb-5" src="/ImagesModePrestations/{{ $mode->image_prestation}}" alt>
                    <h1 class="mb-4" style="color: #3800bf !important">{{ $mode->titre }}</h1>
                    <p>
                        {!! $mode->description !!}
                    </p>
                   
                </div>
                <div class="col-lg-4">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                            <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                                <h3 class="mb-0" style="color: #3800bf !important">{{ $mode->departement->libelle ?? '' }}</h3>
                            </div>
                            <div class="d-flex flex-column justify-content-start">
                                    <a class="h5 fw-semi-bold bg-light rounded py-3 px-4 d-flex justify-content-between mb-2"
                                        href="#" style="color: #fff"><span>{{ $mode->mode}}</span> <i class="bi bi-arrow-right"></i>
                                    </a>
                            </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div> 

{{-- <div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h1 class="mb-0"> Détail des prestations</h1>
    </div>
    <div class="row g-5">
        @if(!is_null($mode->prestations))
        @foreach($mode->prestations as $prestation)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        @if(!is_null($prestation->image_prestation ))
                            <img class="img-fluid w-100" src="../uploadsprestation/{{ $prestation->image_prestation ?? ''}}" alt="">
                        @endif
                    </div>

                    <div class="text-center py-4">
                        <h6 class="m-0 text-uppercase" style="color: #FFFF">{{ $prestation->libelle}}</h6><br>
                      
                    </div>
                </div>
            </div>
            @endforeach
            @endif
    </div>
</div>  --}}

@endsection