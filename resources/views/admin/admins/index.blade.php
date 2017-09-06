@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Administradores')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <a class="btn btn-primary" href="{{route('administradores.create')}}">Nuevo</a>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped  table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Estatus</th>
                        <th>Registrado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $element)
                        <tr>
                            <td class="text-capitalize">{{ $element -> first_name . ' ' . $element -> last_name }}</td>
                            <td>{{ $element -> email }}</td>
                            <td>
                                <form action="{{ route('administradores.status', $element -> id) }}" method="post">                                    
                                    {{ csrf_field() }}
                                    <input type="hidden" name="status" value="{{ $element -> status }}">                                
                                    @if ($element -> status == 1) 
                                        <button class="btn label label-success" type="submit">Activo <i class="fa fa-refresh"></i></button>
                                    @else 
                                        <button class="btn label label-danger" type="submit">Inactivo <i class="fa fa-refresh"></i></button>
                                    @endif 
                                </form>
                            <td>{{ date_format($element -> created_at, 'd/m/Y') }}</td>
                            <td class="text-center">

                                @if($element -> id == Auth::user()->id)
                                    <span class="label label-success">Usuario logueado</span>
                                @elseif ($element -> id == 1)
                                    <span class="label label-danger">Super usuario</span>
                                @else 
                                    <form action="{{ route('administradores.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar este usuario?');">
                                        <a class="btn btn-success btn-xs" href="{{ route('administradores.show', $element -> id) }}" title="Ver"><i class="fa fa-eye"></i></a>                        
                                        &nbsp;&nbsp;
                                        <a class="btn btn-primary btn-xs" href="{{ route('administradores.edit', $element  -> id) }}" title="Editar"><i class="fa fa-pencil"></i></a>                             
                                        &nbsp;&nbsp;
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></spanl></button>
                                    </form>   
                                @endif               
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
<script src="{{asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
