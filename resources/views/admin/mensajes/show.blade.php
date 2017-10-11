@extends('layouts.admin.default')

@section('title', 'Ver mensaje')
@section('content')
  	<div class="col-md-12">
  		<div class="box box-primary">
	        <div class="box-body">
	            <ul class="box-list">	               			         
		            <li>
		            	<p><i class="ion ion-person"></i> <b>Nombre</b></p>		            	
		              	<p>{{ $message -> name }}</p>
		            </li>   
	            	<div class="row">
	            		<div class="col-md-6">	            			         
				            <li>
				            	<p><i class="ion ion-person"></i> <b>Email</b></p>
				              	<p><a href="mailto:{{ $message -> email }}">{{ $message -> email }}</a></p>
				            </li>   
	            		</div>
	            		<div class="col-md-6">
	            			<li>
				            	<p><i class="ion ion-person"></i> <b>Teléfono</b></p>
				              	<p>{{ $message -> phone }}</p>
				            </li>   
	            		</div>
	            	</div>   
		            <li>
		            	<p><i class="ion ion-person"></i> <b>Asunto</b></p>
		              	<p>{{ $message -> subject }}</p>
		            </li>
		            <li>
		            	<p><i class="ion ion-ios-upload"></i> <b>Mensaje</b></p>
		              	<p>{{ $message -> message }}</p>
		            </li>
		            <li>
		            	<p><i class="ion ion-ios-upload"></i> <b>Fecha de envio</b></p>
		              	<p>{{ $message -> created_at }}</p>
		            </li>
			    </ul>
	        </div>
	        <div class="box-footer text-center">		        	
	        	<a class="btn btn-warning" href="{{ route('mensajes.index') }}">Regresar</a>
	        </div>
	    </div>
  	</div>
@endsection

