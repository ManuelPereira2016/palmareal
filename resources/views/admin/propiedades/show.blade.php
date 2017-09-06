@extends('layouts.admin.default')

@section('title', 'Ver propiedad')
@section('content')
  	<div class="col-md-12">
  		<div class="box box-primary">
  			<div class="box-header with-border">  				
	        	<a class="btn btn-primary" href="{{route('propiedades.index')}}">Regresar</a>    
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
				              		<span class="label label-primary text-capitalize">{{ $element }}</span>
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