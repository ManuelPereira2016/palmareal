@extends('layouts.admin.default')

@section('title', 'Ver proyecto')
@section('content')
  	<div class="col-md-12">
  		<div class="box box-default">
  			<div class="box-header with-border text-right">  				
	        	<a class="btn btn-default" href="{{route('proyectos.index')}}">Regresar</a>    
  			</div>
	        <div class="box-body">
	        	<ul class="box-list">
				    <li>
				    	<div class="row">
						    <div class="col-sx-12 col-sm-6">
				    			<p><b>Nombre del proyecto</b></p>
				        		<p>{{$proyect -> name}} </p>
						    </div>						    
						    <div class="col-sx-12 col-sm-6">
						    	<p><b>Cliente</b></p>
						        <p>{{ $proyect -> client}} </p>
						    </div>
					    </div>
				    </li>
				    <li>
				    	<div class="row">
				    		<div class="col-md-4">
						    	<p><b>Tipo</b></p>
				              	<p>@if ( $proyect -> type == 1 ) Casa @else Apartamento @endif</p>
			              	</div>
				    		<div class="col-md-4">
						    	<p><b>Estatus</b></p>
				              	<p>@if ( $proyect -> status == 1 ) <span class="label label-success">Activo</span> @else <span class="label label-danger">Inactivo</span> @endif</p>
			              	</div>
				    		<div class="col-md-4">
						    	<p><b>Fecha de creación</b></p>
              					<p>{{ date_format($proyect -> created_at, 'd/m/Y') }}</p>
			              	</div>
				    	</div>
				    </li>
			    	<li>
				    	<p><b>Descripción</b></p>
              			<p>{{ $proyect -> description }}</p>	
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
			 			<a href="{{ route('imagen.edit',$element -> id) }}" id="btn-change-image" title="{{ $proyect -> nombre }}"> 
				 			<div class="thumbnail" style="background-image: url({{ Storage::disk('proyects')->url($element -> url) }}" alt="{{ $proyect -> nombre }});">
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
@stop
@section('modals')
    {{-- MODAL PARA AGREGAR IMAGEN --}}
	<div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="add-image">
	  	<div class="modal-dialog">
		    <form action="{{ route('imagen.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="table" value="properties">
                <input type="hidden" name="item" value="{{ $proyect -> id }}">
		    	<div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Agregar imagen</h4>
			      	</div>
			      	<div class="modal-body">
			        	<p>Seleccione la imagen que desea agregar</p>
	                	<div class="form-group">
	                		<label for="imagen" class="form-label">Imagen <span class="text-danger">*</span></label>
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
        <form action="{{ route('proyectos.destroy', $proyect -> id) }}" method="post"> 
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="delete">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Eliminar proyecto</h4>
                    </div>
                    <div class="modal-body">     
                        <p>¿Esta seguro de eliminar la proyecto <b>{{ $proyect -> name}}</b>?</p>               
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