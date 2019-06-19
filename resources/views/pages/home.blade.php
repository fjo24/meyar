@extends('pages.templates.body')
@section('title', 'Home')
@section('css')
<link href="{{ asset('css/pages/sliders/slider.css') }}" rel="stylesheet" />
<link href="{{ asset('css/pages/destacados.css') }}" rel="stylesheet" />
<link href="{{ asset('css/pages/producto_home.css') }}" rel="stylesheet" />
<link href="{{ asset('css/pages/home.css') }}" rel="stylesheet" />
<link href="{{ asset('css/pages/calidad.css') }}" rel="stylesheet" />
<link href="{{ asset('css/pages/servicios.css') }}" rel="stylesheet" />
@endsection
@section('contenido')
<div class="slider">
    <ul class="slides" style="width: 100%">
        @foreach($sliders as $slider)
        <li>
            <img src="{{asset($slider->imagen)}}">
            @if(isset($slider->texto)||isset($slider->texto2))
            <div class="caption box-cap" style="">
                <div style="">
                    <span class="slidertext2">
                        {!! $slider->texto !!}
                    </span>
                </div>
            </div>
            @endif
            </img>
        </li>
        @endforeach
    </ul>
</div>
<div class="container" style="width: 90%;">
    <div class="row bloquecard col l12 s12 m12">
        @foreach($productos as $producto)
        <div class="col l3 s12 m6">
            <a href="{{ route('productoinfo', $producto->id)}}">
                <div class="card white darken-1" style="">
                    <div class="card-content white-text">
                            <div class="{{-- center masproducto hide-on-med-and-down  --}}col l12 m12 s12">
                                <img src="{{asset($producto->imagen)}}" style="width: 237px; height: 221px;">
                        </div>
                    </div>
                    <div class="card-action" style="padding-top: 5%; height:96px">
                        <div class="titulo_video" style="text-align: center;width: 100%;">
                                {{$producto->codigo}}
                        </div>
                        <div class="contenido_video" style="text-align: center;width: 100%;">
                                {{$producto->descripcion}}
                            </div>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="col l12 s12 center">
        <a class="btn btn-danger" href="{{route('page.categorias')}}"
            <button class="btn btn-danger">VER PRODUCTOS</button>
        </a>
    </div>
</div>
<div class="row seccion-banner hide-on-med-and-down" style="background: url(/img/banner/banner.jpg);margin-top: 35px;">
    <div class="container" style="width: 90%;">
    <div class="col l12 s12">
        <div class="col l5 s5">
            <div class="btexto">
                <div class="tbanner">
                    <p>
                        {!! $banner->texto !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col l7 s7">
            <div class="btexto">
                <div class="tbanner2">
                    <p>
                        {!! $banner->texto2 !!}
                    </p>
                    <div>
                        <a href="{{route('presupuesto')}}">
                            <button class="btn btn-ingresar">INGRESAR</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="container" style="width: 89%;">
        <div class="servicios center" style="align-items: center">
            <span class="titulo-servicio">
                Una empresa hecha para servir
            </span>
            <div class="items-servicio row" style="align-items: center;">
                <div class="col l12 s12 m12">
                    @foreach($servicios as $servicio)
                    <div class="col l3 s12 m6">
                        <span class="img-servicio" style="">
                            <img alt="" src="{{asset($servicio->imagen)}}" style="">
                            </img>
                            <div class="texto-servicio">
                                <p>
                                    {!! $servicio->texto !!}
                                </p>
                            </div>
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
    $('.slider').slider({
        indicators: true,
        height: 450,
    });
</script>
@endsection