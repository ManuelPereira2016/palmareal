@extends('layouts.admin.default')

@section('styles')
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('title', 'Crear banner')
@section('content')
<form action="{{route('banners.store')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="box box-default">
        <div class="box-header text-right with-border">
            <a href="{{route('banners.index')}}" class="btn btn-default">Regresar</a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">                    
                   <div class="form-group">
                        <label for="nombre">Titulo  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="name" placeholder="Nombre del banner" required="required" maxlength="150">
                    </div>  
                </div> 
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label for="link">Link </label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Link del boton" maxlength="150" >
                    </div> 
                </div> 
            </div> 
            <div class="form-group">
                <label for="image" class="control-label">Imagen <span class="text-danger">*</span></label>
                <div class="form-control">                                          
                    <input class="col-md-11" name="image" id="image" type="file" required="required">     
                </div>
            </div>  
            <div class="form-group">
                <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                <textarea name="description" id="descripcion" class="form-control" placeholder="Descripcion de la noticia" required="required" rows="10"></textarea>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <button type="submit" class="btn btn-success">Crear</button>
        </div>
    </div>
</form>
@endsection
