@if (strpos(Request::path(), 'propiedad') === false)
<div id="wrap-map">
    <header class="content-header">
        <h2>Google Maps</h2>
        <small class="subtitle">Visitenos en nuestra sede principal.</small>
    </header>
    <div id="map"></div>
</div>
@endif
<div class="container" id="footer-wrap">
	<div class="row">
		<div class="col-md-4 ft-sec-pag">
			<h4>Menú</h4>
			<ul class="menu-footer">				
                <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/constructora') }}">Constructora</a></li>
                <li><a href="{{ url('/inmobiliaria') }}">Inmobiliaria</a></li>
                <li><a href="{{ url('/corretaje') }}">Corretaje</a></li>
                <li><a href="{{ url('/contacto') }}">Contacto</a></li>
			</ul>
		</div>
		<div class="col-md-4 ft-sec-pag">
			<h4 class="text-center text-capitalize">{{ $footer -> title }}</h4>
			<p class="text-justify">{{ $footer -> content }}</p>
		</div>
		<div class="col-md-4 ft-sec-pag">	
			<h4 class="text-right">Facebook</h4>		
			<div id="fb-inner">
				<div class="fb-page"
			  		data-href="https://www.facebook.com/Conjunto-Habitacional-Palma-Real-240491539330838/"	
			  		data-width="500"
			  		data-height="300"
			  		data-hide-cover="false" data-tabs="timeline" data-small-header="false" 
			  		data-adapt-container-width="true"
			  		data-show-facepile="true">
			  	</div>
			</div>
		</div>
	</div>
</div>
<div id="copyright">
	<div class="container">
		Copyright &copy; {{ date('Y') }} | Palma Real. Todos los derechos reservados.
	</div>
</div>