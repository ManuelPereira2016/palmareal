@extends('layouts.admin.default')

@section('styles')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/tags-input/bootstrap-tagsinput.css') }}">
@endsection

@section('title', 'Editar propiedad')
@section('content')
<form action="{{route('propiedades.update', $property -> id)}}" role="form" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="put">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">                    
                   <div class="form-group">
                        <label for="nombre">Nombre  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="name" placeholder="Nombre de la propiedad" required="required" maxlength="150" value="{{ $property -> name }}">
                    </div>  
                </div> 
                <div class="col-md-4">                    
                   <div class="form-group">
                        <label for="estatus">Estatus <span class="text-danger">*</span></label>
                        <select name="status" id="estatus" class="form-control" required="required">
                            <option value="">Seleccione un estatus...</option>
                            <option value="0" @if ($property -> status == 0) selected="selected" @endif>Inactivo</option>
                            <option value="1" @if ($property -> status == 1) selected="selected" @endif>Activo</option>
                        </select>
                    </div> 
                </div> 
            </div>  
            <div class="form-group">
                <label for="ubicacion">Ubicación  <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="ubicacion" name="location" placeholder="Direccion del inmueble" maxlength="150" required="required" value="{{ $property -> location }}">
            </div> 
            <div class="row">
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="price">Precio  <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="$ 0000,00" maxlength="2" required="required" value="{{ $property -> price }}">
                    </div> 
                </div>
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="rooms">Habitaciones  <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Habitaciones" maxlength="2" required="required" value="{{ $property -> rooms }}">
                    </div> 
                </div>
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="bathrooms">Baños  <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="bathrooms" name="bathrooms" placeholder="Baños" maxlength="2" required="required" value="{{ $property -> bathrooms }}">
                    </div>                    
                </div>
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="garages">Garages <span class="text-danger">*</span> </label>
                        <input type="number" class="form-control" id="garages" name="garages" placeholder="Garages" maxlength="2" required="required" value="{{ $property -> garages }}">
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="type">Caracteristicas</label><br> <small class="text-primary">Escriba las caracteristicas separadas por coma (,)</small>
                        <input type="text" class="form-control" id="characteristics" name="characteristics" placeholder="Caracteristicas" maxlength="255" data-role="tagsinput" value="{{ $property -> characteristics }}">
                    </div>                    
                </div>
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="proximities">Cercanias </label> <br> <small class="text-primary">Escriba las cercanias separadas por coma (,)</small>
                        <input type="text" class="form-control" id="proximities" name="proximities" placeholder="Lugares cercanos" maxlength="255" data-role="tagsinput" value="{{ $property -> proximities }}">
                    </div>                    
                </div>
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="antiquity">Antiguedad  <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="antiquity" name="antiquity" placeholder="Antiguedad" maxlength="2" required="required" value="{{ $property -> antiquity }}">
                    </div> 
                </div>
                <div class="col-md-3">                    
                    <div class="form-group">
                        <label for="size">Tamaño  <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="size" name="size" placeholder="Tamaño" maxlength="2" required="required" value="{{ $property -> size }}">
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
                                    <input class="type" type="checkbox" name="type[]" value="{{ $element -> name }}" @if (in_array($element -> name, $p_types)) checked="checked" @endif> {{ $element -> name }}
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
                                <input class="modality" type="checkbox" name="modality[]" value="venta" @if (in_array('venta', $modality)) checked="checked" @endif> Venta
                            </label>
                        </div>  
                        <div class="checkbox">
                            <label>
                                <input class="modality" type="checkbox" name="modality[]" value="renta" @if (in_array('renta', $modality)) checked="checked" @endif> Renta
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
                <label for="descripcion">Descripcion <span class="text-danger">*</span></label>
                <textarea name="description" id="descripcion" class="form-control" placeholder="Descripcion de la noticia" required="required" rows="10">{{ $property -> description }}</textarea>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="{{route('propiedades.show', $property -> id)}}" class="btn btn-warning">Cancelar</a>
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </div>
</form>
@stop
@section('scripts')

    <script type="text/javascript" src="{{ asset('vendors/tags-input/bootstrap-tagsinput.js') }}"></script>
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
@endsection
