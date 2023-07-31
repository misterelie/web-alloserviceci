<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Entreprise - Allô service</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content name="keywords">
    <meta content name="description">

    <link href="img/favicon.html" rel="icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;family=Rubik:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <link
        href="{{ asset('new-assets/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}"
        rel="stylesheet">
    <link
        href="{{ asset('new-assets/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css') }}"
        rel="stylesheet">

    <link href="{{ asset('new-assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('new-assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <link href="{{ asset('new-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('new-assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner">
            
        </div>
    </div>

    <div class="container-fluid bg-dark px-5 d-none d-lg-block" style="background: red">
        @include('partials-front.topbar-header')
    </div>

    <div class="container-fluid position-relative p-0">
        @include('partials-front.navbar')
    </div>

    {{-- <div class="container-fluid facts py-5 pt-lg-0" data-wow-delay="0.1s">
        @include('partials-front.statistics')
    </div> --}}

    {{-- <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.prestation')
    </div> --}}


     <div class="modal fade" id="searchModal" tabindex="-1">
        @include('partials-front.searchModal')
    </div>
    
    @yield('content')

    {{-- <div class="container-fluid pt-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.about')
    </div> --}}

    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        @include('partials-front.footer')
    </div>

    <div class="container-fluid text-white" style="background: #061429;">
        @include('partials-front.all-rights')
    </div>


    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script data-cfasync="false"
        src="{{ asset('new-assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>
    {{-- <script src="{{ asset('new-assets/code.jquery.com/jquery-3.4.1.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script> --}}
    <script src="{{ asset('new-assets/cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/wow/wow.min.js') }}" type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/easing/easing.min.js') }}" type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/waypoints/waypoints.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/counterup/counterup.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/owlcarousel/owl.carousel.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/isotope/isotope.pkgd.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script src="{{ asset('new-assets/lib/lightbox/js/lightbox.min.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>

    <script src="{{ asset('new-assets/js/main.js') }}"
        type="2e4e4b8a462ae5e81adbf0d1-text/javascript"></script>
    <script
        src="{{ asset('new-assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="2e4e4b8a462ae5e81adbf0d1-|49" defer></script>
        
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
                if (n == 0 && !validateForm()) return false;
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

    <script>
        function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
                  center: {lat: 48.8566, lng: 2.3522},
                  zoom: 12
                });
        
                var marker = new google.maps.Marker({
                  position: {lat: 48.8584, lng: 2.2945},
                  map: map,
                  title: 'Tour Eiffel'
                });
              }
    </script>

<script>
    $('#mode_id').on('change', function () {
        let modeId = $(this).val();

        console.log(modeId)
        
        var userURL = "{{url('/getSpecificates')}}";
        $.ajax({
            url: userURL,
            data: {"data": modeId},
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
               
                HTML = $.parseHTML(data);
                $("#ajaxRoot").html(HTML)
            }
        });
    });
</script>


<script>
   $(document).on('change','#ville_id',function(){  
      var ville_id=$(this).val();
      
      var op=" ";  
      a = '/getCommunes'           
      $.ajax({
         type:'get',
         url:a,
         data:{'id':ville_id},
         success:function(communes){
            console.log(communes);
            op+='<option label=""></option>'; 
            for(var i=0;i<communes.length;i++){    
               op+='<option value="'+communes[i].id+'">'+communes[i].commune+'</option>';     
            }
            $('.commune_id').html(" ");
            $('.commune_id').append(op);
         },
         error:function(){
         }
      });                    
   });
</script>

</body>

</html>