@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Mensajes')
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped  table-hover">
                <thead>
                    <tr>
                        <th><i class="fa fa-eye"></i></th>
                        <th>Asunto</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $element)
                        <tr>
                            <td style="font-size: 7pt; text-align: center">@if ($element -> status == 1) <i class="fa fa-circle text-success"></i> <span style="display: none">1</span> @else <i class="fa fa-circle text-danger"></i> @endif</td>
                            <td class="text-capitalize"> {{ $element -> subject }}</td>
                            <td>{{ $element -> name }}</td>
                            <td>{{ date_format($element -> created_at, 'd/m/Y') }}</td>
                            <td>                                
                                 <form action="{{ route('mensajes.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar esta propiedad?');">
                                    <a class="btn btn-success btn-xs" href="{{ route('mensajes.show', $element->id) }}"><i class="fa fa-eye"></i></a>
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
