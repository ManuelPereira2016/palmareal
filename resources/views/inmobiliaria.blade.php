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
                <div class="content-body">
                    {!! $page -> content !!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-12 content-header">
                <h2>Ultimas Propiedades</h2>
                <small class="subtitle">Mire las ultimas propiedades cargadas</small>
            </div>
            <div class="col-md-3" style="background-color: #e1e1e1; "> 
                          
                    <form action="{{ route('search') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h3>Busqueda</h3>
                            @include('flash::message')      
                        </div>
                        <div class="form-group">
                            <input id="name" name="name" type="text" class="form-control" placeholder="Indique una o mas palabras claves" value="@if(isset($request)){{$request['name']}}@endif" >
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
                                    <input id="min-price" name="min_price" type="number" class="form-control" value="@if(isset($request)){{$request['min_price']}}@endif" placeholder="Minimo" >
                                </div>
                                <div class="col-md-6">
                                    <input id="max-price" name="max_price" type="number" class="form-control" value="@if(isset($request)){{$request['max_price']}}@endif" placeholder="Maximo" >
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
                                    <input id="max-size" name="max_size" type="number" class="form-control" value="@if(isset($request)){{$request['max_size']}}@endif" placeholder="Max m²" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Tipos de Propiedad</h4>
                                @foreach ($properties_types as $type)
                                    <div class="checkbox">
                                        <label class="text-capitalize"><input name="property_types[]" type="checkbox" 
                                        @if (isset($request)) 
                                            @if (isset($request["property_types"]))
                                            @if (in_array($type->id, $request["property_types"])) checked="checked" 
                                            @endif
                                            @endif
                                        @endif
                                         value="{{$type->id}}" />{{$type->name}}</label>
                                    </div>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Baños</h4>
                                @if (isset($request))
                                {!! $bathrooms_options !!}
                                @else
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
                                @endif
                        </div>
                        <div class="form-group">
                            <h4>Habitaciones</h4>
                                @if (isset($request))
                                {!! $rooms_options !!}
                                @else
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
                                @endif 
                        </div>
                        <div class="form-group">
                            <h4>Garages</h4>
                                @if (isset($request))
                                {!! $garages_options !!}
                                @else
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
                                @endif                      
                        </div>
                        <div class="form-group">
                            <h4>Ubicación</h4>
                            @foreach ($locations as $element)
                                <div class="checkbox">
                                    <label class="text-capitalize"><input name="locations[]" type="checkbox"
                                    @if (isset($request)) 
                                        @if (isset($request["locations"])) 
                                        @if (in_array($element, $request["locations"])) checked="checked" 
                                        @endif
                                        @endif
                                    @endif
                                     value="{{ $element }}" />{{ $element }}</label>
                                </div>
                            @endforeach
                        </div>
                    </form>                
            </div>
            <div class="col-md-9">
                @php($i=1)
                <div class="row">
                    @foreach ($properties as $element)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail card">
                                @if(array_key_exists($element -> id, $item = array_column($media->toArray(), 'url', 'item')))
                                    <img src="{{ Storage::disk('properties')->url($item[$element -> id]) }}" alt="Imagen de propiedad">
                                @else
                                    <img src="{{ Storage::disk('images')->url('propiety-default.jpg') }}" alt="Imagen de propiedad">
                                @endif
                                <div class="caption">
                                    <h3 style="height: 45px; overflow: hidden">{{ $element -> name }}</h3>
                                    <div class="price">@if ($element -> price > 0) $  {{ $element -> price }} @endif </div>
                                    @if (!empty($element -> types))
                                        @foreach (($element -> types) as $value)
                                            <div class="label label-default">{{ $value -> name }}</div>
                                        @endforeach                          
                                    @endif
                                    <p class="text-justify">{{ substr($element -> description, 0, 100) }}</p>
                                   <a href="{{ action('WebController@propiedad', $element -> id ) }}" class="btn btn-second" role="button">Ver más</a>
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
	</article>
@endsection