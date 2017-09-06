@extends('layouts.default')

@section('title', $page -> title)
@section('content')
	<article id="construcciones" class="container">
		<header class="content-header">
            <h2>@yield('title')</h2>
            <small class="subtitle">{!! $page -> subtitle !!}</small>
        </header>
        <section class="text-center">
        	<div class="col-md-12">
        		<div class="row">
        			<div class="col-md-7">
        				<p>{!! $page -> content !!}</p>
        			</div>
        			<div class="col-md-5">
        				<ul class="text-left" style="list-style: none;">
        					<li style="margin-bottom: 10px; color: #747474"><i class="glyphicon glyphicon-earphone"></i> +593 99 706 5890</li>
        					<li style="margin-bottom: 10px; color: #747474"><i class="glyphicon glyphicon-envelope"></i> ventas@palmarealec.com</li>
        					<li style="margin-bottom: 10px; color: #747474"><i class="glyphicon glyphicon-map-marker"></i> Av. De los Colonos, Sector 5ta. Etapa de los Rosales. Santo Domingo, Pichincha, Ecuador</li>
        				</ul>
        			</div>
        		</div>
        	</div>
			<div class="col-md-12">
				@include('flash::message')
				<form class=" form-stand" method="post" action="{{ route('contacto.send') }}">
					{{ csrf_field() }}
				  	<div class="col-sm-12 col-md-6">
			      		<input name="name" type="text" class="form-control" id="name" placeholder="Nombre y Apellido" required="required" maxlength="100" pattern="[A-Za-z/\s/]{4,100}">
			      		<input name="email" type="email" class="form-control" id="email" placeholder="Correo" required="required" maxlength="100">
			      		<input name="phone" type="number" class="form-control" id="phone" placeholder="Numero Telefonico" required="required" maxlength="15">
				  	</div>
				  	<div class="col-sm-12 col-md-6">
			      		<input name="subj" type="text" class="form-control" id="subj" placeholder="Asunto del mensaje" required="required" maxlength="190"  pattern="{4,190}">
			  			<textarea class="form-control" name="message" id="message" placeholder="Descipcion" required="required" maxlength="500" rows="5"></textarea>		
				  	</div>
					<div class="col-md-12 text-center">
					    <button type="submit" class="hvr-sweep-to-right" style="margin-top: 20px;">Contactar</button>
					</div>
				</form>
			</div>
        </section>
	</article>
@endsection