@extends('Home.layout')

@section('content')

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Qui sommes-nous?</h1>
        </div>
    </div>
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


@endsection
