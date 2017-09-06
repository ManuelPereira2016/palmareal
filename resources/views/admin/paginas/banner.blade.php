@extends('layouts.admin.default')

@section('title', 'Ver banner')
@section('content')
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border text-right">                 
                <a class="btn btn-default" href="{{ route('paginas.show', $banner -> page) }}">Regresar</a>    
            </div>
            <div class="box-body">
                <ul class="box-list">
                    <li style="border-bottom: 1px solid #e1e1e1; padding: 20px; position: relative;">
                        <div  style="display: block;position: absolute;color: #FFF; top: 10px; right: 20px; z-index: 10">     
                            <form action="{{ route('paginas.imagen.destroy', $banner -> id) }}" method="post" onsubmit="return confirm('¿Esta seguro de eleminar este banner?');">
                                <button type="button" id="btnEditBanner" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editBanner"> <i class="fa fa-pencil"></i></button>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></spanl></button>
                            </form>
                        </div>
                        <div class="row banner">
                            <div class="col-xs-6">
                                @if (!empty($banner -> name))
                                    <h3>{{ $banner -> name }}</h3>
                                @endif
                                @if (!empty($banner -> description))
                                    <p>{{ $banner -> description }}</p>
                                @endif
                                @if (!empty($banner -> link))
                                    <a class="btn btn-default" href="{{ url($banner -> link) }}" target="_blank">Ver más</a>
                                @endif
                            </div>
                            <div class="col-xs-6">
                                <img width="80%" src="{{ Storage::disk('banners') -> url( $banner -> image ) }}" alt="
                                {{ $banner -> name }}">
                            </div>
                        </div>
                    </li>
                </ul>               
            </div>
        </div>
    </div>
@stop

@section('modals')
    {{-- MODAL PARA MODIFICAR IMAGEN --}}
    <div class="modal fade" id="editBanner" tabindex="-1" role="dialog" aria-labelledby="editBanner">
        <div class="modal-dialog">
            <form action="{{ route('paginas.imagen.update', $banner -> id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="page" value="{{ $banner -> page }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modificar imagen</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">                    
                               <div class="form-group">
                                    <label for="name">Titulo </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del banner" maxlength="150" value="{{ $banner -> name }}">
                                </div>  
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Link del boton" maxlength="150" value="{{  $banner -> link }}">
                                </div> 
                            </div> 
                        </div> 
                        <div class="form-group">
                            <label for="images" class="control-label">Imagen </label>   
                            <input class="form-control" name="images" id="image" type="file">     
                        </div>  
                        <div class="form-group">
                            <label for="descripcion">Descripción </label>
                            <textarea name="description" id="descripcion" class="form-control" placeholder="Descripcion de la noticia" rows="10">{{ $banner -> description }}</textarea>
                        </div>
                    </div>    
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection