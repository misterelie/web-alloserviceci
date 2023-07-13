@extends('layouts.base-front')
@section('content')

<div class="container py-5">
        <div class="section-title-2 text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Témoignages clients</h5>
            <h1 class="mb-0">Ce que nos clients disent de nos services</h1>
        </div>
    @if(!is_null($temoignages))
    @foreach($temoignages as $temoignage)
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            <div class="testimonial-item my-4" style="background-color: #EEF9FF !important">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    @if($temoignage->photo_person)
                     <img class="img-fluid rounded" src="/TemoignagnesPhoto/{{ $temoignage->photo_person }}" style="width: 60px; height: 60px;">
                    @else
                        <img class="img-fluid rounded" src="{{ asset('new-assets/img/testimonial-1.jpg')}}" style="width: 60px; height: 60px;">
                    @endif

                    <div class="ps-4">
                        <h4 class="text-primary mb-1">{{ $temoignage->nom }}</h4>
                        <small class="text-uppercase">{{ $temoignage->created_at}}</small>
                    </div>
                </div>
                <div class="pt-4 pb-5 px-5">
                    {{ \Illuminate\Support\Str::words( $temoignage->texte, 10,'...') }}
                    <a class="text-uppercase" href="#">Lire plus<i class="bi bi-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div> 

@endsection

    