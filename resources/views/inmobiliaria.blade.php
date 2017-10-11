@extends('layouts.default')
@section('title', $page -> title)
@section('content')
	<article id="construcciones" class="container">
		<section class="row">
            <div class="col-md-12">
                <header class="content-header">
                    <h2 class="text-capitalize">{{ $page -> title }}</h2>
                    <small class="subtitle">{{ $page -> subtitle }}</small>
                </header>
                <div class="content-body" style="overflow: auto;">
                    {!! $page -> content !!}
                </div>
            </div>
        </section>
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-3" style="background-color: #e1e1e1; "> 
                    <form id="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h3>Busqueda</h3>
                            <div class="alert" id="message" style="display: none;"></div>     
                        </div>
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Indique una o mas palabras claves" value="" >
                        </div>
                       {{--  <div class="form-group">
                           <div class="row">
                                <div class="checkbox col-md-12"></div>
                                @foreach ($tags as $element)
                                    <div class="checkbox col-md-6">
                                        <label class="text-capitalize"><input name="tags[]" type="checkbox" value="{{ $element -> name }}">{{ $element -> name }}</label>
                                    </div>
                                @endforeach
                           </div>
                        </div> --}}
                        <div class="form-group">
                            <button class="btn btn-success">Buscar</button>
                        </div>
                        <div class="form-group">
                            <h4>Precio</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="min-price" name="min_price" type="number" class="form-control" value="" placeholder="Minimo" >
                                </div>
                                <div class="col-md-6">
                                    <input id="max-price" name="max_price" type="number" class="form-control" value="" placeholder="Maximo" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Tamaño de la Propiedad</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="min-size" name="min_size" type="number" class="form-control" value="min_size" placeholder="Min m²" >
                                </div>
                                <div class="col-md-6">
                                    <input id="max-size" name="max_size" type="number" class="form-control" value="" placeholder="Max m²" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Tipos de Propiedad</h4>
                                @foreach ($properties_types as $type)
                                    <div class="checkbox">
                                        <label class="text-capitalize"><input name="property_types[]" type="checkbox" 
                                         value="{{$type->id}}" />{{$type->name}}</label>
                                    </div>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Baños</h4>
                                <div class="checkbox">
                                    <label ><input name="bathrooms[]" type="checkbox" value="1" />1 Baño</label>
                                </div>
                                <div class="checkbox">
                                    <label ><input name="bathrooms[]" type="checkbox" value="2" />2 Baños</label>
                                </div>
                                <div class="checkbox">
                                    <label ><input name="bathrooms[]" type="checkbox" value="3" />3 Baños</label>
                                </div>
                                <div class="checkbox">
                                    <label ><input name="bathrooms[]" type="checkbox" value="4" />Mas de 4 Baños</label>
                                </div>
                        </div>
                        <div class="form-group">
                            <h4>Habitaciones</h4>
                                <div class="checkbox">
                                    <label><input name="rooms[]" type="checkbox" value="1" />1 Habitación</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="rooms[]" type="checkbox" value="2" />2 Habitaciones</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="rooms[]" type="checkbox" value="3" />3 Habitaciones</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="rooms[]" type="checkbox" value="4" />4 Habitaciones</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="rooms[]" type="checkbox" value="5" />Más de 5 Habitaciones</label>
                                </div>  
                        </div>
                        <div class="form-group">
                            <h4>Garages</h4>
                                <div class="checkbox">
                                    <label><input name="garages[]" type="checkbox" value="1" />1 Garage</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="garages[]" type="checkbox" value="2" />2 Garages</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="garages[]" type="checkbox" value="3" />3 Garages</label>
                                </div>
                                <div class="checkbox">
                                    <label><input name="garages[]" type="checkbox" value="4" />Más de 4 Garages</label>
                                </div>               
                        </div>
{{--                         <div class="form-group">
                            <h4>Ubicación</h4>
                            @foreach ($locations as $element)
                                <div class="checkbox">
                                    <label class="text-capitalize"><input name="locations[]" type="checkbox" 
                                     value="{{ $element }}" />{{ $element }}</label>
                                </div>
                            @endforeach
                        </div> --}}
                    </form>                
            </div>
            <div class="col-md-9">
                <div class="col-md-12 content-header" style="padding-top: 0px;">
                    <h2>Propiedades Destacadas</h2>
                    <div class="row">
                    @if ($best_properties)
                    @foreach ($best_properties as $element)
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="thumbnail card">
                                <a href="{{ action('WebController@propiedad', $element['id'] ) }}" >
                                <div class="overlay-img"> 
                                    <span>Ver más</span>
                                @if(count($element["images"]))
                                    <img src="{{ Storage::disk('properties')->url($element['images'][0]) }}" alt="Imagen de propiedad">
                                @else
                                    <img src="{{ Storage::disk('images')->url('propiety-default.jpg') }}" alt="Imagen de propiedad">
                                @endif
                                </div>
                                </a>
                                <div class="caption">
                                    <h3 style="height: 45px; overflow: hidden">{{ $element["name"] }}</h3>
                                    <div class="price">
                                    @if ($element["price"]) {{ $element["price"] }} @endif 
                                    </div>
                                    @if (!empty($element["types"]))
                                        @foreach (($element["types"]) as $value)
                                            <div class="label label-default">{{ $value["name"] }}</div>
                                        @endforeach 
                                    @endif
                                    <div class="truncate">
                                    <p class="text-justify break-words">{{ substr(strip_tags($element["description"]), 0, 100) }}</p></div>
                                   <a href="{{ action('WebController@propiedad', $element['id'] ) }}" class="btn btn-second" role="button">Ver más</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                    </div>
                </div>
                <div class="col-md-12 content-header" id="properties-page" style="padding-top: 0px;">
                    <h2>Ultimas Propiedades</h2>
                    <small class="subtitle">Mire las ultimas propiedades cargadas</small>
                </div>
                <div id="properties-container">
                @php($i=1)
                <div class="row">
                    @foreach ($properties as $element)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail card">
                                <a href="{{ action('WebController@propiedad', $element['id'] ) }}" >
                                <div class="overlay-img"> 
                                    <span>Ver más</span>
                                @if(count($element["images"]))
                                    <img src="{{ Storage::disk('properties')->url($element['images'][0]) }}" alt="Imagen de propiedad">
                                @else
                                    <img src="{{ Storage::disk('images')->url('propiety-default.jpg') }}" alt="Imagen de propiedad">
                                @endif
                                </div>
                                </a>
                                <div class="caption">
                                    <h3 style="height: 45px; overflow: hidden">{{ $element["name"] }}</h3>
                                    <div class="price">@if ($element["price"] > 0) $  {{ $element["price"] }} @endif </div>
                                    @if (!empty($element["types"]))
                                        @foreach (($element["types"]) as $value)
                                            <div class="label label-default">{{ $value["name"] }}</div>
                                        @endforeach 
                                    @endif
                                    <div class="truncate">
                                    <p class="text-justify break-words">{!! substr(strip_tags($element["description"]), 0, 100) !!}</p></div>
                                   <a href="{{ action('WebController@propiedad', $element['id'] ) }}" class="btn btn-second" role="button">Ver más</a>
                                </div>
                            </div>
                        </div>
                        @if ($i % 3 == 0 && $i != 1)
                        </div>
                        <div class="row">
                        @endif
                        @php($i++)
                    @endforeach
                </div>
                {{ $properties -> links() }}
                </div>
            </div>
        </div>
	</article>
    @foreach ($maps_props as $map)

    @endforeach
    
@endsection
@section('scripts')
<script type="text/javascript">new searchPage()</script>
        <script>
            $(function(){
                $('.card .overlay-img').on('mouseout', function(){
                    $(this).parent().find('span').css('display', 'none')
                })

                $('.card .overlay-img').on('mouseover', function(){
                    $(this).parent().find('span').css('display', 'block')
                })
            })

            function initMap() {

                var marker;
                var infowindow = new google.maps.InfoWindow({});

                @if($main_lng && $main_lat)
                    var palmareal = {lng: {{$main_lng}}, lat: {{$main_lat}}};
                @else
                    var palmareal = {lng: {{$maps -> longitude}}, lat: {{$maps -> latitude}}};
                @endif

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: palmareal
                });

                @foreach ( $maps_props as $location)
                    var property = {lng: {{ $location -> longitude }}, lat: {{ $location -> latitude }}};

                    marker = new google.maps.Marker({
                        position: property,
                        map: map
                    });

                    @if ($location -> property)
                        google.maps.event.addListener(marker, 'click', (function (marker) {
                            return function () {
                                infowindow.setContent( "<a href='{{ action('WebController@propiedad', $location -> property -> id ) }}'> {{ $location -> property -> name }}</a>" )
                                infowindow.open(map, marker);
                            }
                        })(marker));
                    @endif
                @endforeach

                // var marker = new google.maps.Marker({
                //     position: palmareal,
                //     map: map
                // });
            }
        </script>
@endsection