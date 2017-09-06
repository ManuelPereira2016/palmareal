@extends('layouts.default')

@section('title', $page -> title)
@section('content')
	<article id="construcciones" class="container">
		<header class="content-header">
           	<h2 class="text-capitalize">@yield('title')</h2>
            <small class="subtitle">{{ $page -> subtitle }}</small>
        </header>
        <section class="text-center">
        	{!! $page -> content !!}
        </section>
	</article>
@endsection