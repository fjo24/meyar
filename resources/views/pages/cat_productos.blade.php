@extends('pages.templates.body')
@section('title', 'Productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/productos.css') }}" rel="stylesheet">
        @endsection
@section('contenido')
        <div class="container" style="width: 90%;">
            <div class="categorias">
                <div style="">
                    <div class="row">
                        <div class="col l3 s12 m3">
                            <h7>
                                <a class=" hide-on-med-and-down" href="" style="color: gray">
                                    Productos |
                                </a>
                                <a class="hide-on-med-and-down" style="color: gray;text-transform: lowercase">
                                    {!! $categoria->nombre !!}
                                </a>
                            </h7>
                            @include('pages.templates.nav_cat_productos')
                        </div>
                        <div class="col l9 s12 m9" style="margin-top: -1.5%;">
                            @foreach($productos as $producto)
                            {{-- @foreach($categoria->productos as $pro) --}}
                            {{-- @if($pro->id==$producto->id) --}}
                            <div class="col l4 s12 m4">
                                <div class="card div-product">
                                    <a href="{{ route('productoinfo', $producto->id)}}">
                                        <div class="efecto hide-on-med-and-down">
                                            <span class="central" style="background-color: #8D302F;border-radius: 60px;">
                                                <i class="center material-icons">
                                                    add
                                                </i>
                                            </span>
                                        </div>
                                        <img alt="" class="responsive-img" src="{{asset($producto->imagen)}}" style="border:#ECECEC 1px solid;width: 373px;height: 284px;">
                                        <br><br>        
                                        <br><br>        
                                        <br>        
                                        <div class="div-nombre center">
                                            <span  class="d-codigo">
                                                {!!$producto->codigo !!}
                                            </span>
                                                    <br>
                                            <span class="d-descripcion">
                                                {!!$producto->descripcion !!}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- @endif --}}
                            {{-- @endforeach --}}
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
        </script>
@endsection