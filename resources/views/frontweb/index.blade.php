<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Allô service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

<body>
 <!-- Topbar Start -->
 <div class="container-fluid bg-dark px-5 d-none d-lg-block">
    @include('frontweb.topbar')
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid position-relative p-0">
    @include('frontweb.navbar')
</div>
    

{{-- 
    <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)), url({{ asset('assets/img/carousel-bg.jpg') }}) center center no-repeat;">
        <div class="row py-5">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Bienvenue à Allô Service !</h1>
            </div>
        </div>
    </div>
    </div> --}}
    
    <div class="container-fluid facts py-5 pt-lg-0">
       @include('frontweb.statistics')
    </div>
    <!-- Facts Start -->

    <!-- Team Start prestations -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        {{-- <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0"> Nos prestations</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/team-1.jpg') }}" alt="">
                            <div class="team-social">
                                <a href="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                                <a href="{" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Femmes de ménages</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/team-2.jpg') }}" alt="">
                            <div class="team-social">
                                <a href="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                                <a href="" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Nounous</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/team-3.jpg') }}" alt="">
                            <div class="team-social">
                                <a href="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                                <a href="" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Plombiers</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/menuisie.jpg') }}" alt="">
                            <div class="team-social">
                                <a href="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                                <a href="" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Menuisiers</h4>
                        </div>
                    </div>
                </div>
              
    
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/jardinier.jpg') }}" alt="">
                            <div class="team-social">
                                <a href="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                                <a href="" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Jardiniers</h4>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('assets/img/coif.jpg') }}" alt="">
                            <div class="" class="btn btn-primary py-md-2 px-md-4 me-2 animated slideInLeft">Demander une prestation</a>
                                <a href="" class="btn btn-outline-light py-md-2 px-md-4 animated slideInRight">Devenir un prestataire</a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Coiffeurs(euses)</h4>
                        </div>
                    </div>
                </div>
    
              
            </div>
            <a href="" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Voir toutes nos prestations</a>
        </div> --}}
        @include('frontweb.nos-prestation')
       
    </div>
    
    @if(!is_null($abouts))
    @foreach($abouts as $about)
    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <div class="section-title position-relative pb-3 mb-5">
        
                            <h1 class="mb-0">{{ $about->titre }} </h1>
                        </div>
                        <p class="mb-4"> {!!$about->description!!}</p>
        
                        <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h4 class="mb-2"><b>Contactez-nous ici</b></h4>
                                <h5 class="mb-2">+225 27 22 26 88 43</h5>
                            </div>
                        </div>
                        <a href="{{ route('ask.prestation') }}" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" 
                        data-wow-delay="0.9s">Demander une prestation</a>
                    </div>
                    <div class="col-lg-4" style="min-height: 300px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('assets/img/about123.jpg') }}" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
<!-- About End -->
@endforeach
@endif

<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    @include('frontweb.footer')
 </div>
 <div class="container-fluid text-white" style="background: #061429;">
     <div class="container text-center">
         <div class="row justify-content-end">
             <div class="col-lg-8 col-md-6">
                 <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                     <p class="mb-0">&copy; <a class="text-white border-bottom" href="#"></a>Copyright © 2023 | Allô Service- Services & Prestations | Tous droits réservés.
                 </div>
             </div>
         </div>
     </div>
 </div>


<!-- Team End -->
      


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>


        <script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                //... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Valider";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Suivant";
                }
                //... and run a function that will display the correct step indicator:
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false
                        valid = false;
                    }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }

            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class on the current step:
                x[n].className += " active";
            }

        </script>
</body>
</html>