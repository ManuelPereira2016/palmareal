@extends('layouts.admin.default')

@section('title', 'Perfil')
@section('content')
    <div class="row">
        <div class="col-md-9">            
            <div class="box box-primary">
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nombre y Apellido </b>
                            <p>{{ $admin -> first_name . ' ' . $admin -> last_name }}</p>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>E-Mail </b>
                                    <p>{{ $admin -> email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <b>Teléfono </b>
                                    <p>{{ $admin -> phone }}</p>
                                </div>
                            </div>                                   
                        </li>
                        <li class="list-group-item">   
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Contraseña </b>
                                    <p> 
                                        <button type="button" id="btn-changePassword" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#changePassword">Cambiar</button>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <b>Cargo </b>
                                    <p>@if ($admin -> cargo == null ) Sin cargo @else {{ $admin -> cargo }} @endif</p>
                                </div>
                            </div>         
                        </li>
                        <li class="list-group-item">
                            <b>Descripción </b>
                            <p>@if (!empty($admin -> description)) {{ $admin -> description }} @else Sin Descipción @endif</p>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Localización </b>
                                    <p>@if (!empty($admin -> location)) {{ $admin -> location }} @else Sin localización @endif</p>
                                </div>
                                <div class="col-md-6">
                                     <b>Dirección </b>
                                    <p>@if (!empty($admin -> address)) {{ $admin -> address }} @else Sin Dirección @endif</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>  
                <div class="box-footer text-center">
                    <button type="button" id="btn-updatePerfil" class="btn btn-primary" data-toggle="modal" data-target="#updatePerfil">Modificar</button>
                </div>
            </div>
        </div>
        <div class="col-md-3"> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sobre mí</h3>
                </div>
                <div class="box-body box-profile">
                    <div class="wrap-img">   
                        <a id="btn-change-image" data-toggle="modal" data-target="#change-image"> 

                            @if (empty($admin -> image))                                
                                <span class="label label-danger image-edit"><i class="fa fa-pencil"></i></span>
                                <img src="{{ Storage::disk('images') -> url( 'user-default.png' ) }}" alt="{{ $admin -> name }}">
                            @else
                                <span class="label label-danger image-edit"><i class="fa fa-pencil"></i></span>
                                <img src="{{ Storage::disk('admins')->url($admin -> image) }}" alt="{{ $admin -> name }}">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('modals')
    <div class="modal fade" id="change-image" tabindex="-1" role="dialog" aria-labelledby="change-image">
        <form action=" {{ route('imagen.update', $admin -> id) }} " method="POST" enctype="multipart/form-data"> 
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="change-image">Cambiar imagen</h4>
                    </div>
                    <div class="modal-body">      
                        <div class="form-group">
                            <label for="imagen" class="col-md-3 control-label">Imagen</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input name="image" type="file" class="form-control" id="imagen">
                                    <input name="page" type="hidden" value="perfil">
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
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword">
        <form action=" {{ action('Admin\PerfilController@changePassword', $admin -> id) }} " method="POST"> 
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="change-image">Cambiar contraseña</h4>
                    </div>
                    <div class="modal-body">      
                        <div class="form-group">
                            <label for="old-password" class="control-label">Contraseña anterior</label>
                            <input name="old_password" type="password" class="form-control" id="old-password">
                        </div>     
                        <div class="form-group">
                            <label for="password" class="control-label">Nueva Contraseña</label>
                            <input name="password" type="password" class="form-control" id="password">
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
    <div class="modal fade" id="updatePerfil" tabindex="-1" role="dialog" aria-labelledby="updatePerfil">
            <form action="{{ route('perfil.update', $admin -> id) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cambiar datos</h4>
                    </div>
                    <div class="modal-body"> 
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" class="control-label">Sexo <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="gender" required="required">
                                        <option value="">Seleccione un sexo</option>
                                        <option value="0" @if ($admin -> gender == 0) selected="selected" @endif>Hombre</option>
                                        <option value="1" @if ($admin -> gender == 1) selected="selected" @endif>Mujer</option>
                                    </select>                   
                                </div>
                            </div>
                            <div class="col-md-6">                              
                                <div class="form-group">
                                    <label for="location" class="control-label">Localización</label>
                                    <input name="location" type="text" class="form-control" id="location" placeholder="Ciudad y pais donde recide, Ejemplo: Santiago, Chile" maxlength="90" value="{{ $admin -> location }}">                   
                                </div> 
                            </div>
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
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </div>
                </div>
            </div>            
        </form>
    </div>

@stop
@section('scripts')
    <script>        
        $('#change-image').on('shown.bs.modal', function () {
          $('#btn-change-image').focus()
        })
    </script>
    <script src="../../plugins/fastclick/fastclick.js"></script>
@endsection