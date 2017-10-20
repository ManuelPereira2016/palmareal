<div class="dt-top-page">
    <div class="container">
        <div class="pull-left">
            <div class="data-page">                
                <i class="glyphicon glyphicon-earphone glyphicon-phone"></i>{{ $organization -> phone_contact }}<i class="glyphicon glyphicon-envelope glyphicon-email"></i>{{ $organization -> email_contact }}
            </div>
        </div>
        <div class="pull-right">
            <ul class="social-links">
                <li><a class="media-social-facebook" href="https://www.facebook.com/Conjunto-Habitacional-Palma-Real-240491539330838/" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                {{-- <li><a href="http://twitter.com/" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="http://instagram.com/" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li> --}}
            </ul>
        </div>
    </div>
</div>
<nav class="navbar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('imgs/bannerpalma.png') }}" alt="Palma Real" title="Inicio"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
                <li><a @if(Request::is('/'))  class="active" @endif  href="{{ url('/') }}">Inicio</a></li>
                <li><a @if(Request::is('constructora'))  class="active" @endif  href="{{ url('constructora') }}">Constructora</a></li>
                <li class="dropdown">
                    <a @if(Request::is('inmobiliaria') || Request::is('inmobiliaria/*'))  class="active" @endif   href="{{ url('inmobiliaria') }}">Inmobiliaria</a>
                </li>
                <li><a @if(Request::is('corretaje'))  class="active" @endif  href="{{ url('corretaje') }}">Corretaje</a></li>
                <li><a @if(Request::is('contacto'))  class="active" @endif  href="{{ url('contacto') }}">Contacto</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>