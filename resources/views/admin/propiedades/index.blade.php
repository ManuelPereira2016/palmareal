@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Propiedades')
@section('content')    
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i><h3 class="box-title">Tipos de inmuebles</h3>
                    <button  id="btnAddType" data-toggle="modal" data-target="#addType" type="button"  class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></button>
                </div>
                <div class="box-body chat" id="chat-box">
                    <table class="table">
                        @foreach ($types as $element)
                        <tr>
                            <td>{{ $element -> name }}</td>
                            <td width="18">
                                <form action="{{ route('tipos.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar este tipo de inmueble?');">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></spanl></button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </table>
                    {{ $types -> links() }}
                </div>
            </div>   
        </div> 
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i><h3 class="box-title">Tags</h3>
                    <button  id="btnAddTag" data-toggle="modal" data-target="#addTag" type="button"  class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i></button>
                </div>
                <div class="box-body chat" id="chat-box">
                    <table class="table">
                        @foreach ($tags as $element)
                        <tr>
                            <td>{{ $element -> name }}</td>
                            <td width="18">
                                <form action="{{ route('tags.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar este tag?');">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></spanl></button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </table>
                    {{ $tags -> links() }}
                </div>
            </div>   
        </div>  
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border fillable">
                    <a href="{{ route('propiedades.create') }}" class="btn btn-primary">Nuevo</a>
                </div>
                <div class="box-body">
                    <table id="form-content" class="table table-bordered table-striped  table-hover">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Usuario</th>
                                <th>Estatus</th>
                                <th>Fecha</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $element)
                                <tr>
                                    <td>{{ $element -> name }}</td>
                                    <td>{{ $element -> first_name . ' ' . $element -> last_name }}</td>
                                    <td>
                                        <form action="{{ route('propiedades.status', $element -> id) }}" method="post">                                    
                                            {{ csrf_field() }}
                                            <input type="hidden" name=":method" value="head"> 
                                            <input type="hidden" name="status" value="{{ $element -> status }}">                                
                                            @if ($element -> status == 1) 
                                                <button class="btn label label-success" type="submit">Activo <i class="fa fa-refresh"></i></button>
                                            @else 
                                                <button class="btn label label-danger" type="submit">Inactivo <i class="fa fa-refresh"></i></button>
                                            @endif 
                                        </form>
                                    </td>
                                    <td>{{ date_format($element->created_at, 'd/m/Y h:i:s A') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('propiedades.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar esta propiedad?');">
                                            <a class="btn btn-success btn-xs" href="{{ route('propiedades.show', $element -> id) }}" title="Ver"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary btn-xs" href="{{ route('propiedades.edit', $element -> id) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></spanl></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('modals')
<div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="addTag">
        <form action=" {{ route('tags.store') }} " method="post">
            {{ csrf_field() }}
            {{-- <input type="hidden" name="_method" value="post"> --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="change-image">Nuevo tag</h4>
                    </div>
                    <div class="modal-body">      
                        <div class="form-group">
                            <label for="name" class="control-label">Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre del tag">
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

    <div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="addType">
        <form action=" {{ route('tipos.store') }} " method="post">
            {{ csrf_field() }}
            {{-- <input type="hidden" name="_method" value="post"> --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="change-image">Nuevo tipo de inmueble</h4>
                    </div>
                    <div class="modal-body">      
                        <div class="form-group">
                            <label for="name" class="control-label">Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre para el nuevo tipo de inmueble">
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
    <!-- DataTables -->
    <script type="text/javascript" src="{{asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/adminlte/plugins/datatables/dataTables.custom.js')}}"></script>
@endsection