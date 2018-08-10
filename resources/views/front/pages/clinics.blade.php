@extends('layouts.master')
@section('title')
Clinics
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="front/font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="front/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="front/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="front/css/datepicker.css"/>
    <link rel="stylesheet" href="front/css/tooplate-style.css">
    <link rel="stylesheet" href="front/css/custom.css">
@endsection
@section('content')
    <body>
        <div class="tm-main-content" id="top">
            <div class="tm-top-bar-bg"></div>
            <div class="tm-top-bar" id="tm-top-bar">
                <!-- Top Navbar -->
                @include('front.partials.nav')
            </div>
            <div class="headers-menu py-3 text-center">
                <h2 >ALL CLINICS</h2>
                <h6>We are working so hard to add more clinics for you to save more, have more flexiblity and convenience!<strong> Stay tuned!</strong></h6>
            </div>

            <div class="container">
                <div class="col-md-8">
                    @foreach ($clinics as $clinic)
                        <div class="card my-3" style="width: 100%;">
                            @include('front.cards.clinic')
                        </div>
                    @endforeach

                </div>
            </div>










            @include('front.sections.footer')
        </div>

        <!-- load JS files -->
        <script src="front/js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="front/js/popper.min.js"></script>                    <!-- https://popper.js.org/ -->
        <script src="front/js/bootstrap.min.js"></script>                 <!-- https://getbootstrap.com/ -->
        <script src="front/js/datepicker.min.js"></script>                <!-- https://github.com/qodesmith/datepicker -->
        <script src="front/js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="front/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.js" charset="utf-8"></script>
                        <!-- http://kenwheeler.github.io/slick/ -->

        @section('scripts')
            <script>

                /* Google map
                ------------------------------------------------*/
                var map = '';
                var center;

                var lat = document.getElementById('lat').innerHTML;
                var long = document.getElementById('long').innerHTML;
                console.log(lat,long);
                function initialize() {
                    var mapOptions = {
                        zoom: 15,
                        center: new google.maps.LatLng(lat,long),
                        scrollwheel: false
                    };

                    map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

                    google.maps.event.addDomListener(map, 'idle', function() {
                      calculateCenter();
                  });

                    google.maps.event.addDomListener(window, 'resize', function() {
                      map.setCenter(center);
                  });
                }

                function calculateCenter() {
                    center = map.getCenter();
                }

                function loadGoogleMap(){
                    var script = document.createElement('script');
                    script.type = 'text/javascript';
                    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
                    document.body.appendChild(script);
                }

                function setCarousel() {

                    if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                        $('.tm-article-carousel').slick('destroy');
                    }

                    if($(window).width() < 438){
                        // Slick carousel
                        $('.tm-article-carousel').slick({
                            infinite: false,
                            dots: true,
                            slidesToShow: 1,
                            slidesToScroll: 1
                        });
                    }
                    else {
                     $('.tm-article-carousel').slick({
                            infinite: false,
                            dots: true,
                            slidesToShow: 2,
                            slidesToScroll: 1
                        });
                    }
                }

                function setPageNav(){
                    if($(window).width() > 991) {
                        $('#tm-top-bar').singlePageNav({
                            currentClass:'active',
                            offset: 79
                        });
                    }
                    else {
                        $('#tm-top-bar').singlePageNav({
                            currentClass:'active',
                            offset: 65
                        });
                    }
                }

                function togglePlayPause() {
                    vid = $('.tmVideo').get(0);

                    if(vid.paused) {
                        vid.play();
                        $('.tm-btn-play').hide();
                        $('.tm-btn-pause').show();
                    }
                    else {
                        vid.pause();
                        $('.tm-btn-play').show();
                        $('.tm-btn-pause').hide();
                    }
                }

                $(document).ready(function(){

                    $(window).on("scroll", function() {
                        if($(window).scrollTop() > 100) {
                            $(".tm-top-bar").addClass("active");
                        } else {
                            //remove the background property so it comes transparent again (defined in your css)
                           $(".tm-top-bar").removeClass("active");
                        }
                    });

                    // Google Map
                    loadGoogleMap();

                    // Date Picker
                    const pickerCheckIn = datepicker('#inputCheckIn');
                    const pickerCheckOut = datepicker('#inputCheckOut');

                    // Slick carousel
                    setCarousel();
                    setPageNav();

                    $(window).resize(function() {
                      setCarousel();
                      setPageNav();
                    });

                    // Close navbar after clicked
                    $('.nav-link').click(function(){
                        $('#mainNav').removeClass('show');
                    });

                    // Control video
                    $('.tm-btn-play').click(function() {
                        togglePlayPause();
                    });

                    $('.tm-btn-pause').click(function() {
                        togglePlayPause();
                    });

                    // Update the current year in copyright
                    $('.tm-current-year').text(new Date().getFullYear());
                });

            </script>
        @endsection

</body>
@endsection
