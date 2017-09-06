@extends('layouts.admin.default')

@section('title', 'Crear Rol')
@section('content')
    <div class="box box-primary">
        <form action="{{route('roles.store')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">                     
                <div class="form-group">
                    <label for="name" class="control-label">Nombre</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nombre del rol" maxlength="50" required="required">                   
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Descripción</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Describa el rol que desea crear" rows="10" maxlength="400" required="required"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Modulos</label>     
                    <div class="form-control">
                        @foreach ($modules as $element)   
                            <input id="{{ $element -> name }}" name="modules[]" type="checkbox"  value="{{ $element -> id }}">
                            <label class="text-capitalize label left label-primary" for="{{ $element -> name }}"> {{ $element -> name }}</label>  
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{route('roles.index')}}" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Aceptar</button>
            </div>
        </form>
    </div>
          <!-- /.box -->
@endsection
