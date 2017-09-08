@extends('layouts.admin.default')

@section('styles')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/tags-input/bootstrap-tagsinput.css') }}">
@endsection

@section('title', 'Crear propiedad')
@section('content')
<form action="{{route('propiedades.store')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">                    
                   <div class="form-group">
                    <label for="name">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de la propiedad" required="required" maxlength="150">
                </div>  
            </div> 
            <div class="col-md-4">                    
               <div class="form-group">
                <label for="estatus">Estatus <span class="text-danger">*</span></label>
                <select name="status" id="estatus" class="form-control" required="required">
                    <option value="">Seleccione un estatus...</option>
                    <option value="0">Inactivo</option>
                    <option value="1">Activo</option>
                </select>
            </div> 
        </div> 
    </div>  
    <div class="form-group">
        <label for="ubicacion">Ubicación  <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="ubicacion" name="location" placeholder="Direccion del inmueble" maxlength="150" required="required">
        <input type="hidden" id="gmaps-config" name="maps_location">
    </div> 
    <div class="form-group">
        <label for="ubicacion">Ubicación en el Mapa <span class="text-danger">*</span></label>
        &nbsp&nbsp<a href="#google-maps-location" data-toggle="modal" class="btn btn-primary">Ver Mapa</a>
    </div> 
    <div class="row">
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="price">Precio  <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="price" name="price" placeholder="$ 0000,00" maxlength="2" required="required" value="0">
            </div> 
        </div>
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="rooms">Habitaciones  <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Habitaciones" maxlength="2" required="required" value="0">
            </div> 
        </div>
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="bathrooms">Baños  <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" placeholder="Baños" maxlength="2" required="required" value="0">
            </div>                    
        </div>
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="garages">Garages </label>
                <input type="number" class="form-control" id="garages" name="garages" placeholder="Cantidad de Garages" maxlength="2" value="0">
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="type">Caracteristicas</label><br> <small class="text-primary">Escriba las caracteristicas separadas por coma (,)</small>
                <input type="text" class="form-control" id="characteristics" name="characteristics" placeholder="Caracteristicas" maxlength="255" data-role="tagsinput">
            </div>                    
        </div>
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="proximities">Cercanias </label> <br> <small class="text-primary">Escriba las cercanias separadas por coma (,)</small>
                <input type="text" class="form-control" id="proximities" name="proximities" placeholder="Lugares cercanos" maxlength="255" data-role="tagsinput">
            </div>                    
        </div>
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="antiquity">Antiguedad  <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="antiquity" name="antiquity" placeholder="Años de antiguedad de la propiedad" maxlength="2" required="required" value="0">
            </div> 
        </div>
        <div class="col-md-3">                    
            <div class="form-group">
                <label for="size">Tamaño  <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="size" name="size" placeholder="Tamaño en m2" maxlength="2" required="required" value="0">
            </div> 
        </div>
    </div>
    <div class="row">               
        <div class="col-md-4">                    
            <div class="form-group">
                <label for="type">Tipo <span class="text-danger">*</span></label>
                <div id="messageT" class="text-danger"></div>                       
                @foreach ($types as $element)
                <div class="checkbox">
                    <label>
                        <input class="type" type="checkbox" name="type[]" value="{{ $element -> id }}"> {{ $element -> name }}
                    </label>
                </div>
                @endforeach
            </div>                    
        </div>
        <div class="col-md-4">                    
            <div class="form-group">
                <label for="modality">Modalidad  <span class="text-danger">*</span></label>
                <div id="messageM" class="text-danger"></div>
                <div class="checkbox">
                    <label>
                        <input class="modality" type="checkbox" name="modality[]" value="venta"> Venta
                    </label>
                </div>  
                <div class="checkbox">
                    <label>
                        <input class="modality" type="checkbox" name="modality[]" value="renta"> Renta
                    </label>
                </div>
            </div>
        </div> 
        <div class="col-md-4">  
            <div class="form-group">     
                <label for="tags">Tags </label>
                <div class="row">
                    <div class="checkbox"></div>
                    @foreach ($tags as $element)
                    <div class="checkbox col-md-6">
                        <label>
                            <input class="type" type="checkbox" name="tags[]" value="{{ $element -> name }}"> {{ $element -> name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> 
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="image" class="control-label">Imagen <span class="text-danger">*</span></label><br>
                <div id="wrapimg">
                    <div class="warp-btn-file">
                        <div class="form-control">                                          
                            <input class="col-md-11" name="image[]" id="image" type="file" required="required">     
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-xs btn-block" type="button" id="btnadd" style="margin-top: 15px;"><span class="fa fa-plus"></span></button>
            </div>                    
            <div class="col-md-6">
                <label for="descripcion">Descripcion <span class="text-danger">*</span></label>
                <textarea name="description" id="descripcion" class="form-control" placeholder="Describa la propiedad" required="required" rows="10"></textarea>
            </div>
        </div>
    </div>  
</div>
<!-- /.box-body -->
<div class="box-footer text-center">
    <a href="{{route('propiedades.index')}}" class="btn btn-primary">Regresar</a>
    <button type="submit" class="btn btn-success">Crear</button>
</div>
</div>
</form>
@stop
@section('scripts')
<script type="text/javascript" src="{{ asset('vendors/tags-input/bootstrap-tagsinput.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var count = 1;
        var nummax = 5
        
        $("#btnadd").click(function() {  
            if(count < nummax){
                $('#wrapimg').append('<div class="form-control" style="margin-top: 15px;"><input id="imagen' + count + '" type="file" class="col-md-11" name="image[]" required="required" /><a href="javascript:void(0)" class="btnremove btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></div>');
                count++;
            }
            return false;
        });

        $('#wrapimg').on("click",".btnremove", function(e){ //click en eliminar campo
            if( count  > 1 ) {
                e.preventDefault();
                $(this).parent('div').remove(); //eliminar el campo
                count --;
            }
            return false;
        });
    });
</script>
<script>   
    $('form').submit(function(e){
        // si la cantidad de checkboxes "chequeados" es cero,
        // entonces se evita que se envíe el formulario y se
        // muestra una alerta al usuario
        if ($('.modality:checked').length === 0) {
            e.preventDefault();
            $('#messageM').text('Debe seleccionar una modalidad');
        }
    }); 
</script>
<script>   
    $('form').submit(function(e){
        // si la cantidad de checkboxes "chequeados" es cero,
        // entonces se evita que se envíe el formulario y se
        // muestra una alerta al usuario
        if ($('.type:checked').length === 0) {
            e.preventDefault();
            $('#messageT').text('Debe seleccionar un tipo');
        }
    }); 
</script>
<script type="text/javascript">new mapsSelector()</script>
@endsection
@section('modals')
<div class="modal fade" id="google-maps-location" tabindex="-1" role="dialog" aria-labelledby="google-maps-location">
    <form id="map-form">
        {{ csrf_field() }}
        {{-- <input type="hidden" name="_method" value="post"> --}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="change-image">Ubicación en Google Maps</h4>
                </div>
                <div class="modal-body">    
                    <div class="row">  
                        <div class="form-group" style="margin-bottom: 40px;">
                        <div class="col-xs-8 p-left">
                                <label for="name" class="control-label col-xs-4">Ubicación</label>
                                <div class="col-xs-8">
                                    <input id="location-address" name="address" type="text" class="form-control" placeholder="Introduzca una dirección.">
                                </div>
                            </div>
                            <div class="col-xs-4">                  
                                <label for="name" class="control-label col-xs-4">Radio</label>
                                <div class="col-xs-6 p-right">
                                    <input id="ratio" name="ratio" type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="location-box" style="width: 500px; height: 320px;margin-left: auto;margin-right: auto;margin-bottom: 20px;"></div>
                    </div>
                    <div class="row">
                        <div class="form-group" style="margin-bottom: 40px;">
                            <div class="col-xs-6">
                                <label for="name" class="control-label col-xs-4 p-left">Latitud</label>
                                <div class="col-xs-8">
                                    <input id="lat" name="latitude" type="text" class="form-control" placeholder="Introduzca una dirección.">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <label for="name" class="control-label col-xs-4">Longitud</label>
                                <div class="col-xs-8">
                                    <input id="lng" name="longitude" type="text" class="form-control" placeholder="Tamaño del area seleccionada.">
                                </div>
                            </div>
                        </div> 
                    </div>    
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </div>
            </div>
        </div>            
    </form>
</div>
@endsection