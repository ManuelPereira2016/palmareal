@extends('layouts.default')

@section('title',  $property -> name )
@section('styles')
<style>
	.panel-prisma .panel-heading{
		font-family:'PeaceSansWebfont';
		font-weight: 100;
		color: #023064;
	}
	.data-list{
		margin: 0; padding: 0; list-style: none; text-align: center; font-size: 14pt;
	}
	.data-list li{
		margin:10px auto;

	}
	.data-list i{
		font-size: 20pt;
		margin: 5px;
		color: #20B24D;
	}
	.list-no-icon{
		margin: 0;
		padding: 0;
		list-style: none;
	}
	.list-no-icon i{
		margin-right: 5px;
		color: #20B24D;
	}
</style>
@stop
@section('content')
@include('flash::message')	
<article class="container">
	<header class="header-article">
		<a href="{{ url('inmobiliaria')}}" class="btn btn-success" style="float:left;">Volver</a>
		<h2 class="title-article text-center"><span style="margin-left: -70px;">{{ $property -> name }}</span></h2>
	</header>	
	<section id="property" class="body-article">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div id="owl-demo" class="owl-carousel owl-theme owl-min" style="margin-bottom: 40px;"> 
							@foreach ($images as $element)
							<div class="image-fixed item" style="background-image: url('{{ Storage::disk('properties')->url($element -> url) }}');">
							</div>
							@endforeach			 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="data-list">
							@if ($property -> size > 0 )<li class="col-xs-3"><i class="fa fa-arrows" title="Tamaño"></i><br> {{ $property -> size }} m²</li>@endif
							@if ($property -> rooms > 0 )<li title="Habitaciones" class="col-xs-3"><i class="fa fa-bed"></i><br>  {{ $property -> rooms }} </li>@endif
							@if ($property -> bathrooms > 0 )<li title="Baños" class="col-xs-3"><i class="fa fa-bath"></i><br> {{ $property -> bathrooms }}</li>@endif
							@if ($property -> garages > 0 )<li title="Garages" class="col-xs-3"><i class="fa fa-car"></i><br> {{ $property -> garages }}</li>@endif
						</ul>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-prisma">	  				
							<div class="panel-heading">
								<h4 style="display: inline;">Descripción</h4>
							</div>
							<div class="panel-body">
								<p>{!! $property -> description !!}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">	
					@if (count($characteristics) < 1)	  					
					<div class="col-md-4">
						<div class="panel panel-prisma">
							<div class="panel-heading">
								<h4>Caracteristicas</h4>
							</div>
							<div class="panel-body">
								<ul class="list-no-icon">
									@foreach ($characteristics as $element)
									<li><i class="fa fa-check"></i> {{ $element }}</li>
									@endforeach 
								</ul>
							</div>
						</div>
					</div>
					@endif
					@if ($proximities)
					<div class="col-md-4">
						<div class="panel panel-prisma">
							<div class="panel-heading">
								<h4>Cercanias</h4>
							</div>	  						
							<div class="panel-body">
								<ul class="list-no-icon">
									@foreach ($proximities as $element)
									<li><i class="fa fa-check"></i> {{ $element }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>	
					@endif
					<div class="col-md-4">	  						  					
						<div class="panel panel-prisma">
							<div class="panel-heading">
								<h4>Datos principales</h4>
							</div>
							<div class="panel-body">
								<ul class="list-no-icon">
									<li><i class="fa fa-check"></i><b>Tipo: </b> 
										@foreach ($types as $element)
										<span class="label label-primary">{{ $element -> name}}</span>
										@endforeach
									</li>

									@if($property -> antiquity > 0)<li><i class="fa fa-check"></i><b>Antigüedad: </b> {{ $property -> antiquity }} Años</li>@endif

									@if($property -> price > 0)<li><i class="fa fa-check"></i><b>Precio: </b> ${{ $property -> price }}</li>@endif

									@if($property -> size > 0)<li><i class="fa fa-check"></i>{{ $property -> size }}m² Superficie total</li>@endif

									@if($property -> rooms > 0)<li><i class="fa fa-check"></i>{{ $property -> rooms }} Habitaciones</li>@endif

									@if($property -> bathrooms > 0)<li><i class="fa fa-check"></i>{{ $property -> bathrooms }} Baños</li>@endif

									@if($property -> garages > 0)<li><i class="fa fa-check"></i>{{ $property -> garages }} garage</li>@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">

				<div class="contact-form container">
					<div class="row header">
						<h1>Contactar &nbsp;</h1>
						<h3>Llena el formulario debajo para comunicarte con nosotros!</h3>
					</div>
					<div class="row body">
						<form action="{{ route('sendMessage') }}" method="post" >
							{{ csrf_field() }}
							<input type="hidden" name="property" value="{{ $property -> id }}">
							<ul>
								<li>

									<label for="name">Nombre y Apellido</label>
									<input type="text" name="name" required="" id="name" placeholder="Nombre completo" />


									<label for="phone">Teléfono</label>
									<input type="text" name="phone" placeholder="Numero de teléfono" />      

								</li>
								<li>

									<label for="email">E-mail <span class="req">*</span></label>
									<input type="email" name="email" placeholder="Correo electronico" />

								</li>        
								<li><div class="divider"></div></li>
								<li>
									<label for="message">Mensaje</label>
									<textarea cols="46" style="resize: none;" rows="3" required="" name="message"></textarea>
								</li>
								<li>
									<input class="btn btn-submit hvr-float" type="submit" value="Contactar" />
									<small>o presiona <strong>enter</strong></small>
								</li>
								
							</ul>
						</form>  
					</div>
				</div>


			<!--	<div class="panel">
					<div class="panel-body">
						<h4 class="text-center">Contactar</h4>
						<form action="{{ route('sendMessage') }}" method="post" role="form" class="form-style form-search">
							{{ csrf_field() }}
							<input type="hidden" name="property" value="{{ $property -> id }}">
							<div class="box-body">
								<div class="form-group">
									<label class="label-control" for="message">Mensaje</label>
									<textarea class="form-control" id="message" name="message" placeholder="Mensaje" rows="6" style="resize: none;" required="required"></textarea>

								</div>
								<div class="form-group">
									<label class="label-control" for="name">Nombre y Apellido</label>
									<input class="form-control" type="text" id="name" name="name" placeholder="Nombre completo" required="required">
								</div>
								<div class="form-group">
									<label class="label-control" for="phone">Teléfono</label>
									<input class="form-control" type="number" id="phone" name="phone" placeholder="Numero de teléfono" required="required">
								</div>
								<div class="form-group">
									<label class="label-control" for="email">E-mail</label>
									<input class="form-control" type="email" id="email" name="email" placeholder="Correo electronico" required="required">
								</div>

								<div class="form-group text-center">
									<button type="submit" class="btn">Contactar</button>
								</div>
							</div>
						</form>
					</div>
				</div> -->
			</div>
		</div>
		@if (Auth::check())
		<div class="row">
			<div class="col-md-12 text-center">
				<a href="{{ route('properties.edit', $property -> id) }}" class="btn btn-primary" title="Editar el property {{ $property -> id }}">Editar</a>
			</div>
		</div>
		@endif
	</section>

</article>
@if (count($location))
<div id="wrap-map">
	<header class="content-header">
		<h2>Ubicacion Exacta</h2>
	</header>
	<!-- <div id="map-2"></div> -->
	<div id="map-2" style="background-color: grey;height: 400px;margin-left: auto;margin-right: auto;margin-bottom: 20px;"></div>
</div>
@endif
@endsection
@section('scripts')
<script type="text/javascript">
	new showLocation();
</script>
@endsection