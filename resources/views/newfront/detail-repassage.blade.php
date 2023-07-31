@extends('layouts.base-front')
@section('content')

<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            @if(!is_null($repassage))
                <div class="col-lg-8">
                    @if(!is_null($repassage->libelle))
                        <h1 class="mb-4">{{ $repassage->libelle}}</h1>
                    @endif
                    
                    @if(!is_null($repassage->details))
                        <p>{!!$repassage->details!!}</p>
                    @endif
                </div>
            <div class="col-lg-4">
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title-1 section-title-sm position-relative pb-3 mb-4">
                        @if(!is_null($repassage->photos))
                            <img class="img-fluid w-100" src="../UploadsImageRepassage/{{ $repassage->photos}}" alt="">
                        @endif
                       
                            {{-- <img class="img-fluid w-100" src="{{ asset('new-assets/img/blog-1.jpg')}}" alt=""> --}}
                      
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection