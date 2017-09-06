@extends('layouts.admin.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/dataTables.bootstrap.css') }}">
@stop
@section('title', 'Banners')
@section('content')
    <div class="box box-default">
        <div class="box-header text-right with-border">
            <a href="{{ route('banners.create') }}" class="btn btn-default">Nuevo</a>
        </div>
        <div class="box-body">
            <ul style="list-style: none">
                @if (count($banners)>0)
                    @foreach ($banners as $element)
                        <li style="border-bottom: 1px solid #e1e1e1; padding: 20px; position: relative;">
                            <div  style="display: block;position: absolute;color: #FFF; top: 10px; right: 20px; z-index: 10">     
                                <form action="{{ route('banners.destroy', $element -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar este banner?');">
                                    <a class="btn btn-primary btn-xs" href="{{ route('banners.edit', $element -> id) }}" title="Editar"><i class="fa fa-pencil"></i></a>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></spanl></button>
                                </form>
                            </div>
                            <div class="row banner">
                                <div class="col-xs-6">
                                    <h3>{{ $element -> name }}</h3>
                                    <p>{{ $element -> description }}</p>
                                    @if (!empty($element -> link))
                                        <a class="btn btn-default" href="{{ url($element -> link) }}" target="_blank">Ver más</a>
                                    @endif
                                </div>
                                <div class="col-xs-6">
                                    <img width="80%" src="{{ Storage::disk('banners') -> url( $element -> image ) }}" alt="
                                    {{ $element -> name }}">
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                <li><p class="text-center">No hay banners registrados</p></li>
               @endif
            </ul>
        </div>
    </div>
@stop
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
