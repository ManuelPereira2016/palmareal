@extends('layouts.admin.default')

@section('title', 'Ver Rol')
@section('content')
<div class="row">
<div class="col-md-12">
  	<div class="box box-primary">
        <div class="box-body">
			<ul class="box-list">
				<li>
					<p class="text-capitalize"><b>Nombre</b></p>
	  				<p>{{ $rol -> name }}</p>
				</li>
		        <li>
		        	<p><b>Descripción</b></p>
		          	<p>{{ $rol -> description}}</p>
		        </li>
			</ul>
			<div class="row">
	        <ul class="box-list">
	        	<li>
		        	<div class="col-md-6">
		        		<p><i class="fa fa-calendar"></i> <b>Creación</b></p>
		          		<p>{{ date_format($rol ->created_at, 'd/m/Y') }}</p>
		        	</div>
		        	<div class="col-md-6">
		        		<p><i class="fa fa-calendar"></i> <b>Modificación</b></p>
		          		<p>{{ date_format($rol ->updated_at, 'd/m/Y') }}</p>
		        	</div>
		        </li>
	        </ul>
	        </div>
			<table class="table">
				<tr>		
					@foreach ($modules as $element)			
						<td class="text-center text-capitalize">{{ $element -> name }}</td>
						<td>							
							@if (in_array($element -> id, array_column($roles_modules, 'fk_id_module')))
								<i class="fa fa-check text-success"></i>
							@else
								<i class="fa fa-close text-danger"></i>
							@endif
						</td>
					@endforeach
				</tr>
			</table>
        </div>
        <div class="box-footer text-center">
        	<a class="btn btn-primary" href="{{route('roles.index')}}">Regresar</a>        	
        </div>
    </div>
</div>
</div>
@stop
@section('modals')
<div id="delete-reg" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Elimar rolistrador </h4>
	      	</div>
	      	<div class="modal-body">
	        	<p>¿Esta seguro de eliminar este rolistrador ?</p>
	      	</div>
	      	<div class="modal-footer text-center">
	        	<form action="{{ route('roles.destroy',  $rol  -> id) }}" method="POST" style="display: inline-block;">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Si</button>
                </form>
	        	<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
	      	</div>
	    </div>
  	</div>
</div>
@endsection
