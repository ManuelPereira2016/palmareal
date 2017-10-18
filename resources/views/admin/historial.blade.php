@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Historial')
@section('content')
    <div class="box box-primary">
            <div class="box-header with-border fillable">
                <a href="#" id="clear-history" class="btn btn-danger">Eliminar historial</a>
            </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped  table-hover">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Transacción</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historical as $element)
                        <tr>
                            <td class="text-capitalize">{{ $element -> first_name . ' ' . $element -> last_name }}</td>                            
                            <td class="text-capitalize">
                                @if ($element -> transaction == 1)
                                    <span class="label label-success">Crear</span>
                                @elseif($element -> transaction == 2)
                                    <span class="label label-primary">Editar</span>
                                @elseif($element -> transaction == 3)
                                    <span class="label label-danger">Eliminar</span>
                                @else
                                    <span class="label label-default">Indefinida</span>
                                @endif
                            </td>
                            <td>{{ $element -> description }}</td>
                            <td>{{ date_format($element -> created_at, 'd/m/Y h:i:s a') }}</td>
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
    var token = $('[name="csrf-token"]').attr('content');

    $('#clear-history').on('click', function(){
        $.ajax({
            url:'/admin/clear-history',
            type: 'POST',
            data: {'_token' : token }
        })
        .done(function(data){
            location.reload();
        })
    })

});
</script>
@endsection
