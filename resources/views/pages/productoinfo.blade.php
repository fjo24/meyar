@extends('pages.templates.body')
@section('title', 'Info del producto')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
<link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/pages/productos2.css') }}" rel="stylesheet"> --}}
{{-- <link href="{{ asset('css/pages/menuproductos.css') }}" rel="stylesheet"> --}}
@endsection
@section('contenido')
<div class="container" style="width: 90%;">
    <div class="categorias">
        <div style="">
            <div class="row">
                <div class="col l3 s12 m3">
                    <h7>
                    <a ;="" href="{{route('page.categorias')}}" style="color: gray">
                            Productos |
                        </a>
                        <a href="{{route('page.cat.productos', $categoria->id)}}" style="color: gray;text-transform: lowercase">
                            {!! $categoria->nombre !!} |
                        </a>
                        <a href="" style="color: gray;text-transform: lowercase">
                            {!! $producto->codigo !!}
                        </a>
                    </h7>
                    @include('pages.templates.nav_productoinfo')
                </div>
                <div class="galeria2 col l9 m9 s12" style="margin-top: 3%;">
                    <div class="col l12 m12 s12" style="padding: 0;    height: auto;    padding-left: 2%!important;">
                        <div class="col l6 m12 s12 galeriadeproducto" style="border: 1px solid #ECECEC;">
                            <div class="col l12 m12 s12">
                                <div class="carousel carousel-slider center" data-indicators="true"
                                    style="height: 325px!important;width: 100%;">
                                    <div class="carousel-item" href="" style="height: 100%;">
                                        <img alt="slider" src="{{ asset($producto->imagen) }}" />
                                    </div>
                                    @foreach($producto->imagenes as $imagen)
                                    <div class="carousel-item" href="" style="height: 100%;">
                                        <img alt="slider" src="{{ asset($imagen->imagen) }}" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col l6 m12 s12 infoproducto" style="padding-left: 29px;">
                            <div class="codigoproducto">
                                {!! $producto->codigo !!}
                            </div>
                            <div class="descripcionproducto">
                                {!! $producto->descripcion !!}
                            </div>
                            <hr class="pro-line" />
                            @if ($producto->ancho_total)
                            <div class="item col l12 m12 s12">
                                <div class="col l2 m2 s2">
                                    <img class="" src="{{asset('img/ancho_total.png')}}">
                                </div>
                                <div class="item-info col l4 m4 s4">
                                    Ancho total
                                </div>
                                <div class="item-dato col l6 m6 s6">
                                    {!!$producto->ancho_total!!} mm
                                </div>
                            </div>
                            @endif
                            @if ($producto->largo_total)
                            <div class="item col l12 m12 s12">
                                <div class="col l2 m2 s2">
                                    <img class="" src="{{asset('img/largo_total.png')}}">
                                </div>
                                <div class="item-info col l4 m4 s4">
                                    Largo total
                                </div>
                                <div class="item-dato col l6 m6 s6">
                                    {!!$producto->largo_total!!} mm
                                </div>
                            </div>
                            @endif
                            @if ($producto->alto)
                            <div class="item col l12 m12 s12">
                                <div class="col l2 m2 s2">
                                    <img class="" src="{{asset('img/alto.png')}}">
                                </div>
                                <div class="item-info col l4 m4 s4">
                                    Alto
                                </div>
                                <div class="item-dato col l6 m6 s6">
                                    {!!$producto->alto!!} mm
                                </div>
                            </div>
                            @endif
                            @if ($producto->peso)
                            <div class="item col l12 m12 s12">
                                <div class="col l2 m2 s2">
                                    <img class="" src="{{asset('img/peso.png')}}">
                                </div>
                                <div class="item-info col l4 m4 s4">
                                    Peso
                                </div>
                                <div class="item-dato col l6 m6 s6">
                                    {!!$producto->peso!!} Kg
                                </div>
                            </div>
                            @endif
                            <div class="col l12 m12 s12" style="margin-top: 8%;">
                                <div class="col l6 m6 s6">
                                    <a href="{{ route('contacto') }}" style="margin-top: 3%;">
                                        <button class="pedido btn btn-default left">
                                            <span class="rpedido">
                                                CONSULTAR
                                            </span>
                                        </button>
                                    </a>
                                </div>
                                <div class="col l6 m6 s6">
                                    @if (is_null($producto->ficha))
                                    @else
                                    <a href="{{ route('ficha', $producto->id) }}" style="margin-top: 3%;">
                                        <button class="pedido btn btn-default left">
                                            <span class="rpedido">
                                                FICHA TÉCNICA
                                            </span>
                                        </button>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (!is_null($producto->contenido))
                    <div class="col l12 m12 s12 infoproducto" style="padding-left: 29px;">
                        <div class="caracteristicas">
                            Caracteristicas
                        </div>
                        <hr class="rela-line left" style="width: 19%;" />
                    </div>
                    <div class="col l12 m12 s12 relablock" style="padding-left: 29px;font-size: 17px;color:#595959;">
                        {!! $producto->contenido !!}
                    </div>
                    @endif
                    <div class="col l12 m12 s12 infoproducto" style="padding-left: 29px;">
                        <div class="caracteristicas">
                            Productos Relacionados
                        </div>
                        <hr class="left rela-line" style="width: 30%;"/>
                    </div>
                    <div class="col l12 m12 s12 relablock">
                        @foreach($relacionados as $relacionado)
                        <div class="col l4 s12 m4">
                                <div class="card div-product">
                                    <a href="{{ route('productoinfo', $relacionado->id)}}">
                                        <div class="efecto hide-on-med-and-down">
                                            <span class="central" style="background-color: #8D302F;border-radius: 60px;">
                                                <i class="center material-icons">
                                                    add
                                                </i>
                                            </span>
                                        </div>
                                        <img alt="" class="responsive-img" src="{{asset($relacionado->imagen)}}" style="border:#ECECEC 1px solid;width: 373px;height: 284px;">
                                        <br><br>        
                                        <br><br>        
                                        <br>        
                                        <div class="div-nombre center">
                                            <span  class="d-codigo">
                                                {!!$relacionado->codigo !!}
                                            </span>
                                                    <br>
                                            <span class="d-descripcion">
                                                {!!$relacionado->descripcion !!}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script type="text/javascript">
        $(document).ready(function(){
    $('.collapsible').collapsible();
  });
  $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            height: 300,
            with:400,
            indicators: true
        });
    $(document).ready(function() {
    var slider = document.getElementById('slider');
    noUiSlider.create(slider, {
    start: [20, 80],
    connect: true,
    step: 1,
    range: {
        'min': 0,
        'max': 100
   },
   format: wNumb({
     decimals: 0
   })
  });
});
    </script>
    @endsection