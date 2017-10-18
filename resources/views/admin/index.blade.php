@extends('layouts.admin.default')

@section('title', 'Dashboard')
@section('content')
        <div class="row">
            <div class="col-md-6">
                <a href="/admin/propiedades">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$num_propiedades}}</h3>
                            <p>Propiedades</p>
                        </div>
                        <div class="icon"><i class="ion ion-home"></i></div>
                    </div>
                </a>
            </div>
            {{-- <div class="col-md-4">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{count($emails)}}</h3>
                        <p>Mensajes</p>
                    </div>
                    <div class="icon"><i class="ion ion-chatbox"></i></div>
                </div>
            </div> --}}
            <div class="col-md-6">
                <a href="/admin/administradores">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$num_users}}</h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon"><i class="ion ion-person-stalker"></i></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Small boxes (End box) -->
        {{-- <div class="row">
            <div class="col-md-6">
                <!-- Chat box -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-comments-o"></i><h3 class="box-title">Mensajes</h3>
                    </div>
                    <div class="box-body chat" id="chat-box">
                        @if (count($emails)>0)
                           @foreach ($email as $element)
                                <!-- chat item -->
                                <a href="{{route('mensajes.show', $element->id)}}">
                                <div class="item">
                                    <div class="icon">
                                        <i class="fa fa-envelope" style="font-size: 10pt; padding: 12px; color: #FFF; @if ($element->estatus==1) background-color: #00A65A; @else background-color: #DD4B39; @endif border-radius: 50%;"></i>
                                    </div>
                                    <div class="message"> 
                                        <h4>{{$element->asunto}}</h4>
                                        <p href="#" class="name">
                                            <span>{{$element->nombre}}</span>
                                        </p>
                                        <span>{{$element->email}}</span>
                                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 
                                        {{$element->created_at}}
                                        </small>
                                    </div>                                
                                </div>
                                </a>

                                /.item
                            @endforeach   
                            {{ $email -> links() }}
                        @else
                            <p class="text-primary">No hay nuevos mensajes</p>
                        @endif                     
                    </div>
                </div>
                <!-- /.box (chat box) -->     
            </div>  

            <div class="col-md-6">
                <!-- quick email widget -->
                <div class="box box-info col-md-6">
                    <div class="box-header">
                        <i class="fa fa-envelope"></i><h3 class="box-title">Enviar Email</h3>
                    </div>
                    <div class="box-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailto" placeholder="Enviar a:">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Asunto">
                            </div>
                            <div>
                                <textarea class="textarea" placeholder="Mensaje" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-right btn btn-default" id="sendEmail">Enviar <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
      </div> --}}

        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-comments-o"></i><h3 class="box-title">Google Maps</h3>
                    </div>
                    <div class="box-body chat" id="chat-box">
                        <ul>
                            <li><b>Descripcion</b> {{ $maps -> description }}</li>
                            <li><b>Longitud</b> <span id="lng-val">{{ $maps -> longitude }}</span></li>
                            <li><b>Latitud</b> <span id="lat-val">{{ $maps -> latitude }}</span></li>
                        </ul>
                        <button id="btn-change-map" data-toggle="modal" data-target="#changeMap" type="button" class="btn btn-primary btn-xs">Modificar</button>
                    </div>
                </div>   
            </div>  
            
        </div>
@stop
@section('modals')
    <div class="modal fade" id="changeMap" tabindex="-1" role="dialog" aria-labelledby="changeMap">
        <form action=" {{ route('maps.change', $maps -> id) }} " method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="change-image">Maps</h4>
                    </div>
                    <div class="modal-body">      
                        <div class="form-group">
                            <label for="latitude" class="control-label">Latitud</label>
                            <input id="latitude" required="" name="latitude" type="text" class="form-control" placeholder="Latitud">
                        </div>     
                        <div class="form-group">
                            <label for="longitude" class="control-label">Longitud</label>
                            <input id="longitude" required="" name="longitude" type="text" class="form-control" placeholder="Longitud">
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
@endsection
@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#changeMap').on('shown.bs.modal', function(){
            $('#latitude').val($('#lat-val').text())
            $('#longitude').val($('#lng-val').text())
        })
    })
</script>
@endsection