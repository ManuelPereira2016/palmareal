<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Palma Real, constructora, inmobiliaria, contruccion">
        <meta name="description" content="Website de Palma Real">
        <meta name="author" content="Christian Aguilar" />
        <meta name="copyright" content="Palma Real"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="http://palmarealec.com/">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
<style>
</style>
        <title>Palma Real | @yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('vendors/bootstrap/css/bootstrap.css') }}?v=3.3.7" rel="stylesheet">
        <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}?v=4.7.0" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}?v=1.1" rel="stylesheet">
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="{{ asset('vendors/owlcarousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owlcarousel/owl.theme.prisma.css') }}">
        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <!-- Styles page -->
        @yield('styles')
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="fb-root"></div>
        <div id="wrapper-page">
            <header>
                @include('layouts.navbar')
                @include('layouts.carousel')
            </header>
            <main>
                @yield('content')
            </main>
            <footer class="footer-site">
                @include('layouts.footer')
            </footer>
        </div>   
        <!-- Parameters Google Maps -->
        <script>
            function initMap() {
                var palmareal = {lng: {{ $maps -> longitude }}, lat: {{ $maps -> latitude }}};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 17,
                    center: palmareal
                });
                var marker = new google.maps.Marker({
                    position: palmareal,
                    map: map
                });
            }
        </script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="{{ asset('vendors/jquery.min.js') }}"></script>
        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}?v=3.3.7"></script>
        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('vendors/owlcarousel/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        @if (strpos(Request::path(), 'propiedad') === false)
        <!-- Google Maps Plugin -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9KS1GeaKAQk7LCDqAJclffYKE_izcBFk&callback=initMap"></script>
        @else
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9KS1GeaKAQk7LCDqAJclffYKE_izcBFk"></script>
        <script type="text/javascript" src="{{ asset('js/locationpicker.jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/maps.js') }}"></script>
        @endif
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#owl-demo").owlCarousel({
                    loop: true,
                    margin: 500,
                    singleItem: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        }, 
                        1000: {
                            items: 1,
                            nav: true,
                            margin: 20
                        }
                    },
                    nav:true, // Show next and prev buttons
                    slideSpeed : 300,
                    paginationSpeed : 400,
                    items : 1, 
                    // margin:300,
                    // itemsDesktop : false,
                    // itemsDesktopSmall : false,
                    // itemsTablet: false,
                    // itemsMobile : false
                      // "singleItem:true" is a shortcut for:
                      // items : 1, 
                      // itemsDesktop : false,
                      // itemsDesktopSmall : false,
                      // itemsTablet: false,
                      // itemsMobile : false           
                });
             
            });
        </script>
        <script>
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9&appId=161140260594053";
              fjs.parentNode.insertBefore(js, fjs);
            }
            (document, 'script', 'facebook-jssdk'));

        </script>
        <!-- Scripts page -->
        @yield('scripts')
        <!-- Modals -->
        @yield('modals')
    </body>
</html>
