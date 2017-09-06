@extends('layouts.admin.default')

@section('title', 'Modificar imagen')
@section('content')
<div class="col-md-12">
  		<div class="box box-primary">
  			<div class="box-header with-border">
  				<h3 class="box-title">Datos importantes</h3>
  			</div>
	        <div class="box-body">
                <div class="row">
                  @if (empty($image -> url))
                    <img src="{{ Storage::disk('images') -> url( 'img-default.png' ) }}" alt="No hay imagen">
                  @else
                    <img style="width: 100%; max-width: 300px; display: block; margin: 20px auto; " src="{{ Storage::disk('properties') -> url( $image -> url ) }}" alt="{{ $image -> table .  $image -> id }}">
                  @endif
                </div>
                <hr>
	        </div>
	        <div class="box-footer text-center">
	        	<a href="{{ route('propiedades.show', $image -> item) }}" class="btn btn-warning">Regresar</a>
                <button id="btn-delete-image" class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete-image">Eliminar</button>
                <button id="btn-change-image" class="btn btn-primary" type="button" data-toggle="modal" data-target="#change-image">Cambiar</button>
	        </div>
	    </div>
	</form>
</div>
@stop
@section('modals')
    <div class="modal fade" id="change-image" tabindex="-1" role="dialog" aria-labelledby="change-image">       
        <form action=" {{ route('imagen.update', $image -> id) }} " method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="table" value="{{ $image -> table }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="i-change-image">Cambiar imagen</h4>
                    </div>
                    <div class="modal-body">                        
                       <div class="row">
                            <div class="form-group">
                                <label for="iamgen" class="col-md-3 control-label">Imagen</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input name="image" type="file" class="form-control" id="imagen">
                                    </div>
                                </div>
                            </div>  
                       </div>
                    </div> 
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </div>
            </div>            
        </form>
    </div>


    <div class="modal fade" id="delete-image" tabindex="-1" role="dialog" aria-labelledby="delete-image">
        <div class="modal-dialog">
            <form action="{{ route('imagen.destroy', $image -> id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="item" value="{{ $image -> item }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Elimar Imagen</h4>
                    </div>
                    <div class="modal-body">
                        <p>¿Esta seguro de eliminar esta imagen?</p>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>                        
                </div>
            </form>
        </div>
    </div>
@endsection