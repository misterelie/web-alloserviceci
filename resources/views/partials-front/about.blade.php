{{-- @extends('layouts.base-front')
@section('content') --}}

<div class="container py-5">
    
    <div class="row g-5">
        @if(!is_null($abouts))
        @foreach($abouts as $about)
        <div class="col-lg-7">
            <div class="section-title-2 position-relative pb-3 mb-5">
                <h5 class="fw-bold text-uppercase text-primary">{{ $about->titre }}</h5>
                <h1 class="mb-0">La meilleure plateforme pour vos services de maison</h1>
            </div>
            <p class="mb-4">
                {!!$about->description!!}
            </p>
            <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.6s">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link text-uppercase active" id="nav-story-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-story" type="button" role="tab" aria-controls="nav-story"
                            aria-selected="true">Notre Objectif</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                        aria-labelledby="nav-story-tab">
                        <p>
                            Notre objectif est construit sur la base du jobbing, un modèle économique entre particuliers. C'est avant tout une mise en relation entre les besoins d'une personne ou une entreprise et la compétence d'une autre.Nous proposons des jobbers aux compétences confirmées aux personnes ou aux entreprises dans le besoin.
                        </p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Disponilité</h5>
                                <h5 class="mb-0"><i class="fa fa-users text-primary me-3"></i>Personnel professionnel
                                </h5>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="mb-3"><i class="fas fa-phone text-primary me-3">
                                    </i>Assistance 24h/24 et 7j/7
                                </h5>
                               
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-lg-5" style="min-height: 400px;">
            <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                    src="{{ asset('new-assets/img/operateur-centre-appels.jpg')}}" style="object-fit: cover;">
            </div>
        </div>
    </div>
</div>

{{-- @endsection --}}