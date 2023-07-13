@extends('layouts.base-front')
@section('content')

<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title-1 text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Nos réalisations</h5>
            <h1 class="mb-0">Projets réalisés pour nos clients satisfaits</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="btn btn-outline-primary py-2 px-4 active" data-filter="*">
                        <i class="fa fa-star me-2"></i>All
                    </li>
                    <li class="btn btn-outline-primary py-2 px-4" data-filter=".first">
                        <i class="fa fa-laptop-code me-2"></i>Ménage regulier
                    </li>
                    <li class="btn btn-outline-primary py-2 px-4" data-filter=".second">
                        <i class="fa fa-mobile-alt me-2"></i>Ménage occasionnel
                    </li>
                </ul>
            </div>
        </div>
        <div class="row g-5 portfolio-container">
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first wow slideInUp" data-wow-delay="0.1s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/image-1.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménages</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>Avant notre passage</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/image-1.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.3s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img-2.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 2</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img-2.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img3.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 3</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img3.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.1s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img4.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 4</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img4.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item first wow slideInUp" data-wow-delay="0.3s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img5.jpeg') }}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>étape 5</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>Ménage</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img5.jpeg') }}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img6.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 6: Après notre passage</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img6.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img7.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 7</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img7.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img8.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 8</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img8.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img9.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 9</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img9.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img10.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase"><i class="fa fa-folder text-primary me-2"></i>étape 10</small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img10.jpeg')}}" data-lightbox="portfolio"><i
                                class="bi bi-plus display-1 text-white"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item second wow slideInUp" data-wow-delay="0.5s">
                <div class="position-relative portfolio-box">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('new-assets/img/img11.jpeg')}}" alt>
                    </div>
                    <a class="portfolio-title border-bottom border-5 border-primary" href>
                        <h4>Ménage</h4>
                        <small class="text-body text-uppercase">
                            <i class="fa fa-folder text-primary me-2"></i>étape 11: Après notre passage
                        </small>
                    </a>
                    <div class="portfolio-btn">
                        <a href="{{ asset('new-assets/img/img11.jpeg')}}" data-lightbox="portfolio">
                            <i class="bi bi-plus display-1 text-white">
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection