@extends('layouts.admin.default')

@section('title', 'Crear administrador')
@section('content')
    <div class="box box-primary">
        <form action="{{route('administradores.store')}}" role="form" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Nombre <span class="text-danger">*</span></label>
                            <input name="first_name" type="text" class="form-control" id="inputName" placeholder="Primer Nombre" maxlength="150">                   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Apellido <span class="text-danger">*</span></label>
                            <input name="last_name" type="text" class="form-control" id="inputName" placeholder="Primer Apellido" maxlength="150">                   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Email <span class="text-danger">*</span></label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Correo de contacto" maxlength="150">                   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone" class="control-label">Teléfono</label>
                            <input name="phone" type="number" class="form-control" id="phone" placeholder="Numero telefonico o de celular" maxlength="20">                   
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username" class="control-label">Username <span class="text-danger">*</span></label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Nombre de admin" maxlength="10">                   
                        </div>
                    </div>
                </div>       
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Contraseña <span class="text-danger">*</span></label>
                            <input name="password" type="password" class="form-control" id="password" required="required" placeholder="Escriba una contraseña de entre 6 y 18 caracteres" maxlength="18">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password2" class="control-label">Repetir Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password2" id="passowrd2" required="required" placeholder="Repita la contraseña anterior" maxlength="18">   
                        </div>   
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="control-label">Estatus <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="status" required="required">
                                <option value="">Seleccione un estatus</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>                   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender" class="control-label">Sexo <span class="text-danger">*</span></label>
                            <select class="form-control" name="gender" id="gender" required="required">
                                <option value="">Seleccione un sexo</option>
                                <option value="0">Hombre</option>
                                <option value="1">Mujer</option>
                            </select>                   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="role" class="control-label">Rol <span class="text-danger">*</span></label>
                            <select class="form-control" name="role" id="role" required="required">
                                <option value="">Seleccione un rol...</option>
                                @foreach ($roles as $element)
                                    <option value="{{ $element -> id }}">{{ ucwords($element -> name) }}</option>
                                @endforeach
                            </select>                
                        </div>
                    </div>
                </div>         
                <div class="form-group">
                    <label for="location" class="control-label">Localización</label>
                    <input name="location" type="text" class="form-control" id="location" placeholder="Ciudad y pais donde recide, Ejemplo: Santiago, Chile" maxlength="90">                 
                </div>        
                <div class="form-group">
                    <label for="address" class="control-label">Dirección</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="Dirección completa" maxlength="200">                   
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Descripción</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Escriba una pequeña biografia sobre el admin" rows="10" maxlength="400"></textarea>                   
                </div>
            </div>
            <div class="box-footer text-center">
                <a href="{{route('administradores.index')}}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
    </div>
          <!-- /.box -->
@endsection
