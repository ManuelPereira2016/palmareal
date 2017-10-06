@extends('layouts.admin.default')

@section('title', 'Ver pagina')
@section('content')
<div class="col-md-12">
  	<div class="box box-primary">
        <div class="box-header text-right with-border">
        	<a class="btn btn-primary" href="{{ route('paginas.index') }}">Regresar</a>        	
        </div>
        <div class="box-body">
			<ul class="box-list">
				<li>
					<div class="row">
						<div class="col-md-6">
							<p class="text-capitalize"><b>Titulo</b></p>
	  						<p>{{ $page -> title }}</p>
						</div>
						<div class="col-md-6">
							<p class="text-capitalize"><b>Subtitulo</b></p>
	  						<p>{{ $page -> subtitle }}</p>
						</div>
					</div>
				</li>
		        <li>
		        	<p><b>Descripción</b></p>
		          	<p>{{ $page -> description }}</p>
		        </li>
		        <li style="overflow: auto;">
		        	<p><b>Contenido</b></p>
		          	<p>{!! $page -> content !!}</p>
		        </li>
		        <li>
		        	<div class="row">
		        		<div class="col-md-6">
		        			<p><b>Fecha de creación</b></p>
		          			<p>{{ $page -> created_at }}</p>
		        		</div>
			          	<div class="col-md-6">			          		
				        	<p><b>Fecha de Modificación</b></p>
				          	<p>{{ $page -> updated_at }}</p>
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
				<h3 class="box-title">Banner</h3>
			</div>
        <div class="box-body">
        	@foreach ($banners as $element)
		 		<div class="col-xs-6 col-md-3">
		 			<a href="{{ route('paginas.imagen.show', $element -> id) }}" id="btn-change-image" title="{{ $element -> title }}"> 
			 			<div class="thumbnail" style=" background-image: url( {{ Storage::disk('banners') -> url($element -> image) }} ); " alt="{{ $element -> title }}">
			 				<span class="label label-danger image-edit"><i class="fa fa-pencil"></i></span>
				      	</div>
		      		</a>
			  	</div>
		 	@endforeach
		 	@if (count($banners) < 4)
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
@stop

@section('modals')
    {{-- MODAL PARA AGREGAR IMAGEN --}}
	<div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="add-image">
	  	<div class="modal-dialog">
		    <form action="{{ route('paginas.imagen.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="page" value="{{ $page -> id }}">
		    	<div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Agregar imagen</h4>
			      	</div>
			      	<div class="modal-body">
			        	<p>Seleccione la imagen que desea agregar</p>
	                	<div class="form-group">
	                		<label for="name" class="form-label">Titulo </label>
	                		<input id="name" name="name" type="text" class="form-control" placeholder="Titulo del banner">
	                	</div>
	                	<div class="form-group">
	                		<label for="description" class="form-label">Descripción </label>
	                		<input id="description" name="description" type="text" class="form-control" placeholder="Descripción que se mostrará">
	                	</div>
	                	<div class="form-group">
	                		<label for="link" class="form-label">Link </label>
	                		<input id="link" name="link" type="text" class="form-control" placeholder="Url para el boton del banner">
	                	</div>
	                	<div class="form-group">
	                		<label for="imagen" class="form-label">Imagen <span class="text-danger">*</span></label>
			        		<small class="text-danger">El peso maximo permitido por imagen es de 2MB</small>
	                		<input type="file" id="image" name="images" required="required" class="form-control">
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
@endsection