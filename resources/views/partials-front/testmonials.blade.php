{{-- <div class="container py-5">
    @if(!is_null($temoignages))
    @foreach($temoignages as $temoignage)
        <div class="section-title-2 text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Témoignages clients</h5>
            <h1 class="mb-0">Ce que nos clients disent de nos services numériques</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            <div class="testimonial-item bg-light my-4">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    @if($temoignage->photo_person)
                     <img class="img-fluid rounded" src="/TemoignagnesPhoto/{{ $temoignage->photo_person }}" style="width: 60px; height: 60px;">
                    @else
                        <img class="img-fluid rounded" src="{{ asset('new-assets/img/testimonial-1.jpg')}}" style="width: 60px; height: 60px;">
                    @endif

                </div>
                <div class="pt-4 pb-5 px-5">
                    {{ \Illuminate\Support\Str::words( $temoignage->texte, 10,'...') }}
                                <i class="fa fa-arrow-right" aria-hidden="true"><a href="#"> Lire la suite</a></i>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>

     --}}