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
						<div id="owl-demo" class="owl-carousel owl-theme" style="margin-bottom: 40px;"> 
							@foreach ($images as $element)
							<div class="item">
								<img src="{{ Storage::disk('properties')->url($element -> url) }}" alt="{{ $property -> nombre . ' ' . $property -> id}}" class="media">
							</div>
							@endforeach			 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="data-list">
							@if ($property -> size > 0 )<li class="col-xs-3"><i class="fa fa-arrows"></i><br> {{ $property -> size }}</li>@endif
							@if ($property -> rooms > 0 )<li class="col-xs-3"><i class="fa fa-bed"></i><br>  {{ $property -> rooms }} </li>@endif
							@if ($property -> bathrooms > 0 )<li class="col-xs-3"><i class="fa fa-bath"></i><br> {{ $property -> bathrooms }}</li>@endif
							@if ($property -> garages > 0 )<li class="col-xs-3"><i class="fa fa-car"></i><br> {{ $property -> garages }}</li>@endif
						</ul>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-prisma">	  				
							<div class="panel-heading">
								<h4 style="display: inline;">Descripción</h4>
								<a class="pull-right rate" title="Destacada" id="mark-property" href="#">
									<i class="fa fa-heart-o fa-2x" style="color:#5056FF;"></i>
								</a>
							</div>
							<div class="panel-body">
								<p>{{ $property -> description }}</p>
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
				<div class="panel">
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
				</div>
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
	<div class="col-md-8">
		<div id="commentsbox">
			<span class="comments-heading"><h4 class="prisma-h4">Comentarios</h4></span>
			<div id="comment-form">
				<div id="respond" class="rounded">
					<div class="cancel-comment-reply">
						<p style="font-family: 'proxima_nova_rgregular';">Tu dirección de Correo no sera publicada</p>
						<form action="{{ route('commentSend') }}" method="post" id="commentform">
							{{ csrf_field() }}							
							<div id="comment-author" class="form-group">
								<input type="text" class="form-control" placeholder="Nombre (Requerido)" name="name" id="author" value="" size="22" tabindex="1" required="">
							</div>
							<div id="comment-email" class="form-group">
								<input type="text" placeholder="Correo (No se publicara) (Requerido)" required="" class="form-control" name="email" id="email" value="" size="22" tabindex="2" />
							</div>
							<div id="comment-message" class="form-group">
								<textarea name="content" class="form-control" placeholder="Mensaje" id="comment" required="" maxlength="100" style="margin-top: 0px;margin-bottom: 0px;resize:none;height: 150px;width: 100%;"></textarea>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" name="submit" type="submit" id="commentSubmit" tabindex="5" value="Enviar Comentario" />
							</div>
							<input type="hidden" name="property_id" value="{{ $property -> id}}" id="comment_post_ID" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8" style="margin-top: 40px;">
    @foreach ($comments as $element)
		<div class="comment-body">
			<div class="comment-author vcard">
				<cite class="fn">{{ $element -> name }}</cite> <span class="says">dice:</span>
			</div>
			<div class="comment-meta">{{ $element -> created_at }}
			</div>
			<p class="comment-text">{{ $element -> content }}</p>
		</div>
	@endforeach
	</div>

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
		new rateProperties();
	</script>
	@endsection