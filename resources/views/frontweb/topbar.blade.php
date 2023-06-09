<div class="row gx-0">
    @if(!is_null($assistances))
    @foreach($assistances as $assistance)
        <div class="col-lg-8 text-center1 text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 15px;">
                @if(!is_null($assistance->telephone1))
                   <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{$assistance->telephone1}}</small>
               @endif
               
                {{-- <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+225 01 40 49 22 96</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+225 05 56 43 84 29</small>  --}}
                {{-- @if(!is_null($assistance->telephone2))
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{$assistance->telephone2}}</small>
                @endif --}}
            
                @if(!is_null($assistance->whatsapp))
                    <small class="me-3 text-light"><i class="fab fa-whatsapp fw-normal " aria-hidden="true"></i> {{$assistance->whatsapp}}</small>
                @endif
                
            </div>
            {{-- <small class="me-3 text-light d-inline-flex align-items-center" style="height: 15px;"><i class="fa fa-envelope-open me-2"></i>contact@alloservice.ci</small>  --}}
        </div>
    @endforeach
    @endif
    <div class="col-lg-4 text-center2 text-lg-end">
        <div class="d-inline-flex align-items-center" style="height: 45px;">
            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100085672158407"><i class="fab fa-facebook-f fw-normal"></i></a>
            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/profile.php?id=100085672158407"><i class="fab fa-instagram fw-normal"></i></a>
            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-4" href="https://www.facebook.com/profile.php?id=100085672158407"><i class="fab fa-youtube fw-normal"></i></a>
            {{-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fa fa-user-circle" aria-hidden="true"></i></a> --}}
        </div>
    </div>
</div>