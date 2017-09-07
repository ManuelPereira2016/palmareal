@extends('layouts.default')

@section('title', $page -> title)
@section('content')
    <article id="home" class="container">
        <section>
            <header class="content-header">
                <h2 class="text-capitalize">{{ $page -> title }}</h2>
                <small class="subtitle">{{ $page -> subtitle }}</small>
            </header>
            <div class="content-body">
                {!! $page -> content !!}
            </div>
        </section>
        <section>
            <header class="content-header">
                <h2>Ultimas Propiedades</h2>
                <small class="subtitle">Mire las ultimas propiedades cargadas</small>
            </header>
            <div class="row">
                @foreach ($properties as $element)
                    <div class="col-sm-6 col-md-3">
                            <div class="thumbnail card">
                                @if(array_key_exists($element -> id, $item = array_column($media->toArray(), 'url', 'item')))
                                    <img src="{{ Storage::disk('properties')->url($item[$element -> id]) }}" alt="Imagen de propiedad">
                                @else
                                    <img src="{{ Storage::disk('images')->url('propiety-default.jpg') }}" alt="Imagen de propiedad">
                                @endif
                                <div class="caption">
                                    <h3 style="height: 45px; overflow: hidden">{{ $element -> name }}</h3>
                                    <div class="price">@if ($element -> price > 0) $ {{ $element -> price }} @endif </div>
                                    @if (!empty($element -> type))
                                        @foreach (explode(',', $element -> type) as $value)
                                            <div class="label label-default">{{ $value }}</div>
                                        @endforeach                          
                                    @endif
                                    <p class="text-justify">{{ substr($element -> description, 0, 100) }}</p>
                                   <a href="{{ action('WebController@propiedad', $element -> id ) }}" class="btn btn-second" role="button">Ver más</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </section>
    </article>
@endsection