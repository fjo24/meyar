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
    <iframe width="100%" height="449" src="{{$empresa->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>
<div class="container" style="width: 88%;    margin-bottom: 3%;">
        <div class="row" style="position: relative;top: 20px;">
            <div class="izqcalidad col l6 m6 s12">
                <img src="{{asset($empresa->imagen)}}" style="/* width: 237px; height: 221px; */">
            </div>
            <div class="dercalidad col l6 m6 s12">
                <div class="nombrecalidad">
                    {!! $empresa->nombre !!}
                </div>
                <div class="descripcioncalidad">
                    {!! $empresa->descripcion !!}
                </div>
                <div class="contenidocalidad">
                    {!! $empresa->contenido !!}
                </div>
            </div>
        </div>
        <div class="row" style="position: relative;top: 20px;">
            <div class="izqcalidad col l6 m6 s12">
                <div class="blointem col l12 m12 s12">
                    <div class="nombrevalor">
                        Valor agregado MEYAR
                    </div>
                </div>
                @foreach ($valores as $valor)
                    <div class="blointem col l12 m12 s12">
                        <div class="col l2 m2 s2">
                            <img class="" src="{{asset($valor->imagen)}}">
                        </div>
                        <div class="item-info col l10 m10 s10" style="color: #5F5F5F;font-size: 17px;">
                            {{$valor->descripcion}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="dercalidad2 col l6 m6 s12" style="margin-top: 2%;">
                <hr class="lineacalidad left" />
                <div class="descripcion2calidad">
                    {!! $empresa->contenido2!!}
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