@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Paginas')
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <table id="form-content" class="table table-bordered table-striped  table-hover">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-capitalize">Encabezado</td>
                        <td>Editar numero y correo de contacto.</td>
                        <td class="text-capitalize"></td>
                        <td></td>
                        <td class="text-center">
                            <a class="btn btn-success btn-xs" href="{{ route('header-show') }}" title="Ver"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-primary btn-xs" href="{{ route('header-edit') }}" title="Editar"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                    @foreach ($pages as $element)
                        <tr>
                            <td class="text-capitalize">{{ $element -> title }}</td>
                            <td>{{ $element -> description }}</td>
                            <td class="text-capitalize">{{ $element -> first_name . ' ' . $element -> last_name }}</td>
                            <td>{{ date_format($element -> updated_at, 'd/m/Y') }}</td>
                            <td class="text-center">
                                <a class="btn btn-success btn-xs" href="{{ route('paginas.show', $element -> id) }}" title="Ver"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-xs" href="{{ route('paginas.edit', $element -> id) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- DataTables -->
    <script type="text/javascript" src="{{asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/adminlte/plugins/datatables/dataTables.custom.js')}}"></script>
@endsection
