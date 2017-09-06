@extends('layouts.admin.default')

@section('title', 'Ver administrador')
@section('content')
<div class="col-md-7">
  	<div class="box box-primary">
        <div class="box-body">
			<ul class="box-list">
				<li>
					<div class="row">
						<div class="col-md-6">
							<p class="text-capitalize"><b>Nombre</b></p>
	  						<p>{{ucwords( $admin -> first_name)}}</p>
						</div>
						<div class="col-md-6">
							<p class="text-capitalize"><b>Apellido</b></p>
	  						<p>{{ucwords($admin -> last_name)}}</p>
						</div>
					</div>
				</li>
				<li>
					<div class="row">						
						<div class="col-md-6">
							<p class="text-capitalize"><b>Username</b></p>
	  						<p>{{$admin -> username}}</p>
						</div>
						<div class="col-md-6">
							<p class="text-capitalize"><b>Contraseña</b></p>
	  						<p><button class="btn label label-success" type="button"  id="btnChangePassword" data-toggle="modal" data-target="#changePassword" > Modificar <i class="fa fa-refresh"></i></button></p>
						</div>
					</div>
				</li>
		        <li>
		        	<div class="row">
			        	<div class="col-md-6">
				        	<p><b>E-Mail</b></p>
				          	<p>{{ $admin -> email}}</p>
			          	</div>
		        		<div class="col-md-6">
				        	<p><b>Teléfono</b></p>
				          	<p>{{ $admin -> phone}}</p>
			        	</div>
		        	</div>
		        </li>
		        <li>
		        	<div class="row">
			        	<div class="col-md-4">
				        	<p><b>Estatus</b></p>
				          	<p><button class="btn label label-danger" type="submit">Cambiar <i class="fa fa-refresh"></i></button></p>
			          	</div>
		        		<div class="col-md-4">
				        	<p><b>Sexo</b></p>
				          	<p>@if ($admin -> gender == 0) Hombre @else Mujer @endif</p>
			        	</div>
		        		<div class="col-md-4">
				        	<p><b>Rol</b></p>
				          	<p class="text-capitalize">{{ $admin -> role}}</p>
			        	</div>

		        	</div>
		        </li>
		        <li>
		        	<div class="row">
		        		<div class="col-md-6">
		        			<p><b>Dirección</b></p>
		          			<p>{{ $admin -> address}}</p>
		        		</div>
			          	<div class="col-md-6">			          		
				        	<p><b>Localización</b></p>
				          	<p>{{ $admin -> location}}</p>
			          	</div>
		        	</div>
		        </li>
		        <li>
		        	<p><b>Descripción</b></p>
		          	<p>{{ $admin -> description}}</p>
		        </li>
			</ul>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="box  box-primary">
    	<div class="box-header text-right with-border">
        	<a class="btn btn-primary" href="{{route('administradores.index')}}">Regresar</a>        	
        </div>
    	<div class="box-body">
	        <ul class="box-list">
	        	<li>			    		
	        		<div class="wrap-img">
	        			@if(isset( $admin  -> imagen) &&  $admin  -> imagen != false)
	        				<img src="{{ Storage::disk('images') -> url(  $admin  -> imagen ) }}" alt="{{ $admin  -> nombre }}">
	        			@else
	        				<img src="{{ Storage::disk('images') -> url( 'user-default.png' ) }}" alt="{{ $admin  -> nombre }}">
        				@endif
	        		</div>
		    	</li>
	        	<li>
		        	<div class="col-md-6">
		        		<p><i class="fa fa-calendar"></i> <b>Creación</b></p>
		          		<p>{{ date_format($admin ->created_at, 'd/m/Y') }}</p>
		        	</div>
		        	<div class="col-md-6">
		        		<p><i class="fa fa-calendar"></i> <b>Modificación</b></p>
		          		<p>{{ date_format($admin ->updated_at, 'd/m/Y') }}</p>
		        	</div>
		        </li>
	        </ul>
    	</div>
    </div>
</div>
@stop
@section('modals')
{{-- <div id="delete-reg" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Elimar administrador </h4>
	      	</div>
	      	<div class="modal-body">
	        	<p>¿Esta seguro de eliminar este administrador ?</p>
	      	</div>
	      	<div class="modal-footer text-center">
	        	<form action="{{ route('administradores.destroy',  $admin  -> id) }}" method="POST" style="display: inline-block;">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Si</button>
                </form>
	        	<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
	      	</div>
	    </div>
  	</div>
</div> --}}
    {{-- MODAL PARA CAMBIAR CONTRASEÑA--}}
	<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword">
	  	<div class="modal-dialog">
		    <form action="{{ route('administradores.status', $admin -> id) }}" method="post" >
                {{ csrf_field() }}
		    	<div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        	<h4 class="modal-title">Cambiar contraseña</h4>
			      	</div>
			      	<div class="modal-body">
	                	<div class="form-group">
	                		<label for="password" class="form-label">Nueva contraseña <span class="text-danger">*</span></label>
	                		<input id="password" name="password" type="password" class="form-control" placeholder="Escriba su nueva contraseña" required="">
	                	</div>
		            </div>    
			      	<div class="modal-footer text-center">
			        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		                <button type="submit" class="btn btn-success">Modificar</button>
			      	</div>
			    </div>
		    </form>
	  	</div>
    </div>
@endsection
