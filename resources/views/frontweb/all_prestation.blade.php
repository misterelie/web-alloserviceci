
@extends('layouts.master')
@section('content')

<!-- Team Start -->
<div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 class="mb-0"> Nos prestations</h1>
        </div>
        <div class="row g-5">
            @if(!is_null($prestations))
            @foreach($prestations as $prestation)
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            @if(!is_null($prestation->image_prestation))
                                <img class="img-fluid w-100" src="../uploadsprestation/{{ $prestation->image_prestation}}" alt="">
                            @endif
                            <div class="team-social">
                                <a href="{{ route('front.prest',$prestation->id) }}" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demande prestation</a>
                                <a href="{{ route('front.presta',$prestation->id) }}" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">{{ $prestation->libelle }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
        </div>
    </div>
</div>
<!-- Team End -->
@endsection

