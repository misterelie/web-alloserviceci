<div class="container">
    <div class="section-title text-center position-relative pb-3  mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-uppercase text-primary">Quelques prestations</h5>
    </div>
    {{-- <div class="section-title-2 text-center position-relative pb-2 mb-5 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-uppercase">Nos prestations</h5>
        <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1> 
    </div> --}}
    <div class="row g-5">
        @if(!is_null($prestations))
        @foreach($prestations as $prestation)
        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
            <div class="team-item bg-light rounded overflow-hidden">
                <div class="team-img position-relative overflow-hidden">

                    @if(!is_null($prestation->image_prestation))
                        <img class="img-fluid w-100" src="uploadsprestation/{{ $prestation->image_prestation}}" alt="">
                    @endif
                    
                    <div class="team-social">
                        <a href="{{ route('front.prest',$prestation->id) }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander la prestation</a>
                        {{-- <a href="{{ route('front.presta',$prestation->id) }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir prestataire</a> --}}
                    </div>
                </div>
                <div class="text-center py-4">
                    <p class="text-uppercase m-0" style="color:#fff">{{ $prestation->libelle }}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>