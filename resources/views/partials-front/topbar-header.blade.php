

<div class="row gx-0">
    @if(!is_null($assistances))
    @foreach($assistances as $assistance)
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                 <img class="" src="{{ asset('new-assets/img/logoas.png') }}" width="100" alt="">
                 </a>
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>
                    Cocody, Riviera Palmerie
                </small>
                @if(!is_null($assistance->telephone1))
                   <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{$assistance->telephone1}}</small>
                @endif

                @if(!is_null($assistance->whatsapp))
                    <small class="me-3 text-light"><i class="fab fa-whatsapp fw-normal " aria-hidden="true"></i> {{$assistance->whatsapp}}
                    </small>
                @endif
            </div>
        </div>

        @endforeach
        @endif
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-facebook-f fw-normal"></i></a>
                
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i
                        class="fab fa-instagram fw-normal"></i></a>
                <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="#">
                    <i class="fab fa-youtube fw-normal"></i></a>
            </div>
        </div>
</div>