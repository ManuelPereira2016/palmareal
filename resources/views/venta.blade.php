@extends('layouts.default')


@section('title', $page -> title)
@section('content')
        <article class="container">
            <header class="content-header">
            <h2 class="text-capitalize">@yield('title')</h2>
            <small class="subtitle">{{ $page -> subtitle }}</small>
            </header>
            <section style="margin: 20px auto;">
                <div class="row">
                    <div class="text-left col-md-7">
                    {!! $page -> content !!}
                    </div>
                    <div class="col-md-5" style="background-color: #e1e1e1; ">            
                        <form action="{{ action('WebController@venta') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="get">
                            <input type="hidden" name="modality" value="1">
                            <div class="form-group">
                                <h3>Busqueda</h3>
                                @include('flash::message')      
                            </div>
                            <div class="form-group">
                                <label for="name" class="label-control">Nombre</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Indeque el nombre del inmueble" required="required">
                            </div>
                            <div class="form-group">
                                <label for="type" class="label-control">Tipo de inmueble</label>
                                <select id="type" name="type" class="form-control" required="required">
                                    <option value="">Seleccione un tipo</option>
                                    <option value="1">Casa</option>
                                    <option value="2">Apartamento</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <hr>
            <section>
                @if (count($properties)>0)
                    <h4>Resultados encontrados: {{ count($properties) }}</h4>
                    <div class="row">
                        @foreach ($properties as $element)
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{ asset('imgs/propiety-default.jpg') }}" alt="Imagen de propiedad">
                                    <div class="caption">
                                        <h3 style="height: 45px; overflow: hidden">{{ $element -> name }}</h3>
                                        <div class="price">$ {{ $element -> price }} @if ($element -> modality == 2) / Mes @endif</div>
                                        <div class="label label-default">@if ($element -> type == 1) Casa @else Apartamento @endif</div>
                                        <p class="text-justify">{{ substr($element -> description, 0, 100) }}</p>
                                       <a href="{{ action('WebController@propiedad', $element -> id ) }}" class="btn btn-second" role="button">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-right">
                        {{ $properties -> links() }}
                    </div>
                @else
                    <p class="text-center">No se encontraron resultados a la busqueda</p>
                @endif
            </section>
        </article>
@endsection