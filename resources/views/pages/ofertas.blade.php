@extends('pages.templates.body')
@section('title', 'Productos')
@section('css')
<link href="{{ asset('css/pages/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/oferta.css') }}" rel="stylesheet">
        @endsection
@section('contenido')
        <div class="container" style="width: 90%;">
            <div class="categorias">
                <div style="">
                    <div class="row">
                        <div class="col l12 s12 m12" style="margin-top: -1.5%;">
                            @foreach($productos as $producto)
                            {{-- @foreach($categoria->productos as $pro) --}}
                            {{-- @if($pro->id==$producto->id) --}}
                            <div class="col l4 s12 m4">
                                <div class="card div-product">
                                    <a href="{{-- {{ route('productoinfo', ['id' => $pro->id,'cat' => $categoria->id])}} --}}">
                                        <div class="efecto hide-on-med-and-down">
                                            <span class="central" style="background-color: #8D302F;border-radius: 60px;">
                                                <i class="center material-icons">
                                                    add
                                                </i>
                                            </span>
                                        </div>
                                        <img alt="" class="responsive-img" src="{{asset($producto->imagen)}}" style="border:#ECECEC 1px solid;width: 373px;height: 284px;">
                                        <br><br><br>      
                                        <br>        
                                        {{-- <div class="center" style=""> --}}
                                            <div class="div-nombre center" style="">
                                                <span  class="d-codigo">
                                                    {!!$producto->codigo !!}
                                                </span>
                                                <br>
                                                <span class="d-descripcion">
                                                    {!!$producto->descripcion !!}
                                                </span>
                                            </div>
                                       {{--  </div> --}}
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