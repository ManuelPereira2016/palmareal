@extends('layouts.admin.default')

@section('title', 'Editar administrador')
@section('content')
    <div class="box box-primary">
        <form action="{{ route('administradores.update', $admin -> id) }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Nombre <span class="text-danger">*</span></label>
                            <input name="first_name" type="text" class="form-control" id="inputName" placeholder="Primer Nombre" maxlength="150" value="{{ $admin -> first_name }}">                   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Apellido <span class="text-danger">*</span></label>
                            <input name="last_name" type="text" class="form-control" id="inputName" placeholder="Primer Apellido" maxlength="150" value="{{ $admin -> last_name }}">                   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Email <span class="text-danger">*</span></label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Correo de contacto" maxlength="150" value="{{ $admin -> email }}">                   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="control-label">Teléfono</label>
                            <input name="phone" type="number" class="form-control" id="phone" placeholder="Numero telefonico o de celular" maxlength="20" value="{{ $admin -> phone }}">                   
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="control-label">Estatus <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="status" required="required">
                                <option value="">Seleccione un estatus</option>
                                <option value="0" @if ($admin -> status == 0) selected="selected" @endif>Inactivo</option>
                                <option value="1" @if ($admin -> status == 1) selected="selected" @endif>Activo</option>
                            </select>                   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender" class="control-label">Sexo <span class="text-danger">*</span></label>
                            <select class="form-control" name="gender" id="gender" required="required">
                                <option value="">Seleccione un sexo</option>
                                <option value="0" @if ($admin -> gender == 0) selected="selected" @endif>Hombre</option>
                                <option value="1" @if ($admin -> gender == 1) selected="selected" @endif>Mujer</option>
                            </select>                   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="role" class="control-label">Rol <span class="text-danger">*</span></label>
                            <select class="form-control" name="role" id="role" required="required">
                                <option value="">Seleccione un rol...</option>
                                @foreach ($roles as $element)
                                    <option value="{{ $element -> id }}" @if($admin -> role == $element -> id) selected="selected" @endif>{{ ucwords($element -> name) }}</option>
                                @endforeach
                            </select>                
                        </div>
                    </div>
                </div>                                 
                <div class="form-group">
                    <label for="location" class="control-label">Localización</label>
                    <input name="location" type="text" class="form-control" id="location" placeholder="Ciudad y pais donde recide, Ejemplo: Santiago, Chile" maxlength="90" value="{{ $admin -> location }}">                   
                </div>       
                <div class="form-group">
                    <label for="address" class="control-label">Dirección</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="Dirección completa" maxlength="200" value="{{ $admin -> address }}">                   
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Descripción</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Escriba una pequeña biografia sobre el admin" rows="10" maxlength="400"> {{ $admin -> description }}</textarea>                   
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{ route('administradores.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-success">Aceptar</button>
            </div>
        </form>
    </div>
          <!-- /.box -->
@endsection
@section('scripts')


@endsection
