<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @for ($i = 0; $i < count($banners); $i++)
            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
        @endfor        
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @php($b=0)
        @foreach ($banners as $element) @php($b++)
            <div class="item @if($b == 1) active @endif ">
                <img src="{{ Storage::disk('banners')->url($element -> image) }}" alt="Imagen 1">
                <div class="carousel-caption" style="text-shadow: 0 0 5px #000;">
                    <h4>{{ $element -> name }}</h4>
                    <p>{{ $element -> description }}</p>
                    @if (!empty($element -> link ))
                        <div class="text-center"><a href="{{ url($element -> link) }}" class="btn btn-primary">Ver más</a></div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
