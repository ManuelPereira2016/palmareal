@extends('layouts.admin.default')
@section('styles')
<style>
	.comment-body {
		position: relative;
		padding-left: 25px;
		padding-top: 25px;
		padding-right: 25px;
		padding-bottom: 25px;
		border: 1px solid #d0d0d0;
		-moz-box-shadow: 0 2px 0 #e6e6e6;
		box-shadow: 0 2px 0 #e6e6e6;
		margin-bottom: 40px;
		background-color: #fff;
	}

	.comment-author {
		font-size: 18px;
		margin-bottom: 12px;
		color: #1a1a1a;
	}

	.comment-meta {
		margin-bottom: 16px;
		color: #808080;
		text-decoration: none !important;
		font-size: 14px;
		font-family: 'proxima_nova_rgregular';
	}

	.comment-text {
		line-height: 22px;
		margin-top: 5px;
		color: #373737;
		font-size: 16px;
		margin-bottom: 15px;
	}
	.truncate{
		overflow: hidden;
	    word-break: break-all;
	    height: 100px;
	    margin-bottom: 5px;
	    word-wrap: break-word;
	}
</style>
@stop

@section('title', 'Ver propiedad')
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">  				
			<a class="btn btn-primary" href="{{route('propiedades.index')}}">Regresar</a>
			<a class="pull-right rate" style="padding-right: 25px;padding-top: 5px;" title="Destacada" id="mark-property" href="#">
				<i class="fa fa-heart-o fa-2x" style="color:#5056FF;"></i>
			</a>
		</div>
		<div class="box-body">
			<ul class="box-list">
				<li>
					<div class="row">
						<div class="col-sx-12 col-sm-6">
							<p><b>Nombre del property</b></p>
							<p>{{$property -> name}} </p>
						</div>						    
						<div class="col-sx-12 col-sm-6">
							<p><b>Cliente</b></p>
							<p>{{ $property -> first_name . ' ' . $property -> last_name}} </p>
						</div>
					</div>
				</li>
				<li>
					<div class="row">
						<div class="col-md-4">
							<p><b>Precio</b></p>
							<p>$ {{ $property -> price }}</p>
						</div>					    
						<div class="col-md-4">				    			
							<p><b>Codigo</b></p>
							<p>{{ $property -> code }}</p>
						</div>
						<div class="col-md-4">
							<p><b>Estatus</b></p>
							<form action="{{ route('propiedades.status', $property -> id) }}" method="post">                                    
								{{ csrf_field() }}
								<input type="hidden" name=":method" value="head"> 
								<input type="hidden" name="status" value="{{ $property -> status }}">  
								@if ($property->status == 1) 
								<button class="btn label label-success" type="submit">Activo <i class="fa fa-refresh"></i></button>
								@else 
								<button class="btn label label-danger" type="submit">Inactivo <i class="fa fa-refresh"></i></button>
								@endif 
							</form>
						</div>
					</div>
				</li>
				<li>
					<p><b>Ubicación</b></p>
					<p>{{$property -> location}} </p>
				</li>
				<li>
					<p><b>Descripcion</b></p>
					<p>{!! nl2br($property -> description) !!}</p>
				</li>
				<li>
					<div class="row">
						<div class="col-md-4">
							<p><b>Tipo</b></p>
							<p>
								@foreach ($types as $element)
								<span class="label label-primary text-capitalize">{{ $element -> name}}</span>
								@endforeach
							</p>
						</div>
						<div class="col-md-4">
							<p><b>Modalidad</b></p>
							<p>
								@foreach ($modalities as $element)
								<span class="label label-primary text-capitalize">{{ $element }}</span>
								@endforeach</p>
							</div>
							<div class="col-md-4">
								<p><b>Antiguedad</b></p>
								<p>{{ $property -> antiquity }}</p>
							</div>
						</div>
					</li>
					<li>
						<div class="row">				    		
							<div class="col-md-4">
								<p><b>Habitaciones</b></p>
								<p>{{ $property -> rooms }}</p>
							</div>
							<div class="col-md-4">
								<p><b>Baños</b></p>
								<p>{{ $property -> bathrooms }}</p>
							</div>
							<div class="col-md-4">
								<p><b>Garages</b></p>
								<p>{{ $property -> garages }}</p>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-4">
								<p><b>Cercanias</b></p>
								<div>
									@foreach ($proximities as $element)
									<span class="label label-primary text-capitalize">{{ $element }}</span>
									@endforeach
								</div>
							</div>
							<div class="col-md-4">
								<p><b>Caracteristicas</b></p>
								<div>
									@foreach ($characteristics as $element)
									<span class="label label-primary text-capitalize">{{ $element }}</span>
									@endforeach
								</div>
							</div>
							<div class="col-md-4">
								<p><b>Tags</b></p>
								<div>
									@foreach ($tags as $element)
									<span class="label label-primary text-capitalize">{{ $element }}</span>
									@endforeach
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-6">
								<p><b>Fecha de creación</b></p>
								<p>{{ date_format($property -> created_at, 'd/m/Y') }}</p>
							</div>
							<div class="col-md-6">
								<p><b>Fecha de modificacion</b></p>
								<p>{{ date_format($property -> updated_at, 'd/m/Y') }}</p>				    			
							</div>
						</div>
					</li>
				</ul>	            
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Imagenes</h3>
			</div>
			<div class="box-body">
				@foreach ($images as $element)
				<div class="col-xs-6 col-md-3">
					<a href="{{ route('imagen.edit',$element -> id) }}" id="btn-change-image" title="{{ $property -> nombre }}"> 
						<div class="thumbnail" style="background-image: url({{ Storage::disk('properties')->url($element -> url) }}" alt="{{ $property -> nombre }});">
							<span class="label label-danger image-edit"><i class="fa fa-pencil"></i></span>
						</div>
					</a>
				</div>
				@endforeach
				@if (count($images)<4)
				<div class="col-xs-6 col-md-3" >
					<div class="thumbnail">
						<button id="btn-add-image" data-toggle="modal" data-target="#add-image" style="width: 100%; height: 140px; display: flex; align-items: center; text-align: center; font-size: 6rem; background-color: transparent; border: solid 1px #E1E1E1; color:#999"> 
							<i class="fa fa-plus" style="margin: auto"></i>
						</button>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="box box-primary" id="commentsbox">
			<span class="box-header comments-heading"><h4 class="prisma-h4">Enviar Comentario</h4></span>
			<div class="box-body" id="comment-form">
				<div id="respond" class="rounded">
					<div class="cancel-comment-reply">
						<form action="{{ route('commentSend') }}" method="post" id="commentform">
							{{ csrf_field() }}
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
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Comentarios</h3>
			</div>
			<div class="box-body">
				@foreach ($comments as $element)
				<div class="comment-body">
					<div class="comment-author vcard">
						<cite class="fn">{{ $element -> name }}</cite> <span class="says">dice:</span>
                        @if ($role == '999999')
                        <a class="pull-right" href="{{ route('commentDelete', $element -> id) }}"><i class="fa fa-trash-o"></i></a>
                        @endif
					</div>
					<div class="comment-meta">{{ $element -> created_at }}
					</div>
					<div class="truncate"><p class="comment-text">{{ $element -> content }}</p></div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	@stop
	@section('modals')
	{{-- MODAL PARA AGREGAR IMAGEN --}}
	<div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="add-image">
		<div class="modal-dialog">
			<form action="{{ route('imagen.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="table" value="properties">
				<input type="hidden" name="item" value="{{ $property -> id }}">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Agregar imagen</h4>
					</div>
					<div class="modal-body">
						<p>Seleccione la imagen que desea agregar</p>
						<div class="form-group">
							<label for="imagen" class="form-label">Imagen <span class="text-danger">*</span></label>
							<small class="text-danger">El peso maximo permitido por imagen es de 2MB</small>
							<input type="file" name="image" required="required" class="form-control">
						</div>
					</div>    
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success">Agregar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete">
		<form action="{{ route('propiedades.destroy', $property -> id) }}" method="post"> 
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="delete">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Propiedad</h4>
					</div>
					<div class="modal-body">     
						<p>¿Esta seguro de eliminar la propiedad <b>{{ $property -> name}}</b>?</p>               
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</div>
				</div>
			</div>            
		</form>
	</div>
	@endsection
	@section('scripts')
	<script type="text/javascript">
		new rateProperties();
	</script>
	@endsection