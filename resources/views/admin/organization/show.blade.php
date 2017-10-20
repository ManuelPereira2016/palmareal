@extends('layouts.admin.default')

@section('title', 'Ver encabezado')
@section('content')
<div class="row">
<div class="col-md-12">
  	<div class="box box-primary">
        <div class="box-header text-left with-border">
        	<a class="btn btn-primary" href="{{ route('paginas.index') }}">Regresar</a>
        </div>
        <div class="box-body">
			<ul class="box-list">
				<li>
					<div class="row">
						<div class="col-md-6">
							<p class="text-capitalize"><b>Numero de Contacto</b></p>
	  						<p>{{ $organization -> phone_contact }}</p>
						</div>
						<div class="col-md-6">
							<p class="text-capitalize"><b>Dirección de Correo</b></p>
	  						<p>{{ $organization -> email_contact }}</p>
						</div>
					</div>
					<div class="form-group">
						<p class="text-capitalize"><b>Texto principal</b></p>
	  					<div>{!! $organization -> title_main !!}</div>
					</div>
				</li>
		        <li>
		        	<div class="row">
		        		<div class="col-md-6">
		        			<p><b>Fecha de creación</b></p>
		          			<p>{{ $organization -> created_at }}</p>
		        		</div>
			          	<div class="col-md-6">			          		
				        	<p><b>Fecha de Modificación</b></p>
				          	<p>{{ $organization -> updated_at }}</p>
			          	</div>
		        	</div>
		        </li>
			</ul>
        </div>
    </div>
</div>
</div>
@stop