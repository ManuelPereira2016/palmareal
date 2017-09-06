@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Roles')
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <a class="btn btn-primary" href="{{route('roles.create')}}">Nuevo</a>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped  table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Creación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $element)
                        <tr>
                            <td class="text-capitalize">{{ $element -> name }}</td>
                            <td>{{ date_format($element -> updated_at, 'd/m/Y') }}</td>
                            <td class="text-center" style="width: 100px;">                                
                                 <form action="{{ route('roles.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar esta propiedad?');">

                                    <a class="btn btn-success btn-xs" href="{{ route('roles.show', $element -> id) }}" title="Ver"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-primary btn-xs" href="{{route('roles.edit',  $element  -> id)}}" title="Editar"><i class="fa fa-pencil"></i></a>
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
