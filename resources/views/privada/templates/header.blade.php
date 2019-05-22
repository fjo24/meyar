<header>
    {{-- BARRA PRINCIPAL --}}
    <nav class="principal">
        <div class="container" style="width: 80%">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style=" "><i class="material-icons" style="color: white;">menu</i></a>
            <div class="row" style="margin-bottom: 0%;">
                <div class="col l12 m12 s12">
                    <div class="redeshead col l4 m4 s4 center">
                        <ul class="center" style="margin-left: 38%;margin-top: 7%;">
                            <div class="col l3 m3 s3">
                                <li class="redes_head" style="margin-top: 20%;">
                                    <a class="" href="">
                                        <img alt="" src="{{asset('img/lupa.png')}}">
                                        </img>
                                    </a>
                                </li>
                            </div>
                            <div class="col l9 m9 s9">
                                <li class="redes_head">
                                    {!!Form::text('busqueda', null , ['class'=>'buscando', 'placeholder'=>'Estoy buscando' ,'required'])!!}
                                </li>
                            </div>
                        </ul>
                    </div>
                    <div class="col l4 m4 s4">
                        <a class="brand-logo center" style="left: 51%; z-index: 5;" href="{{ url('/') }}">
                            <img alt="" src="{{asset('img/logo.png')}}">
                            </img>
                        </a>
                    </div>
                    <div class="privadohead col l4 m4 s4 center">
                            <ul class="center" style="margin-left: 22%;margin-top: 7%;">
                                <li class="privado_head" style="margin-top: 8%;">
                                    <a class="" style="margin: 0;" href="{{ url('/') }}">
                                        <img alt="" src="{{asset('img/user.png')}}">
                                        </img>
                                    </a>
                                </li>
                                <li class="privado_head">
                                    <div class="dropdown-trigger" data-target="dropdown1">
                                        <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-transform: capitalize;line-height: 125%;margin-top: 14%;color: #8D302F">
                            Bienvenido, {{ Auth::User()->name }}<br>
                            (Cerrar Sesión)
                     
                                        </a>
                                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
                
        {{-- BARRA SUPERIOR --}}
    <div class="top hide-on-med-and-down">
        <div class="container hide-on-med-and-down" style="width: 80%;">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="col l6 m6 s6 center">
                        <ul class="item-left center hide-on-med-and-down">
                            @if($activo=='pedidos')
                            <li class="activo item-m">
                                <a href="{{ route('zproductos') }}">
                                    PEDIDOS
                                </a>
                            </li>
                            @else
                            <li class="item-m">
                                <a href="{{ route('zproductos') }}">
                                    PEDIDOS
                                </a>
                            </li>
                            @endif
                            @if($activo=='productos')
                            <li class="activo item-m" {{-- id="menu_productos" --}}>
                            <a class="{{-- prod_menu --}}" href="{{route('carrito')}}">
                                    CARRITO
                                </a>
                                <!-- 
                                <ul style="margin-top: -2%!important;">
                                    <li class="menu_cate">
                                        <a href="" style="text-transform: uppercase;">
                                            POR SISTEMA
                                        </a>
                                    </li>
                                    <li class="menu_cate">
                                        <a href="" style="text-transform: uppercase;">
                                            POR RUBRO
                                        </a>
                                    </li>
                                </ul>-->
                            </li>
                            @else
                            <li class="item-m" {{-- id="menu_productos" --}}>
                                <a class="{{-- prod_menu --}}item-m" href="{{route('carrito')}}">
                                    CARRITO
                                </a>
                            <!--   <ul style="margin-top: -2%!important;">
                                    <li class="menu_cate">
                                        <a href="" style="text-transform: uppercase;">
                                            POR SISTEMA
                                        </a>
                                    </li>
                                    <li class="menu_cate">
                                        <a href="" style="text-transform: uppercase;">
                                            POR RUBRO
                                        </a>
                                    </li>
                                </ul>-->
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col l6 m6 s6 center">
                        <ul class="item-left center hide-on-med-and-down">
                            @if($activo=='catalogo')
                            <li class="activo item-m" style="margin: 0px 94px;">
                            <a href="{{route('listadeprecios')}}">
                                    LISTA DE PRECIOS
                                </a>
                            </li>
                            @else
                            <li class="item-m" style="margin: 0px 85px;">
                                <a href="{{route('listadeprecios')}}">
                                    LISTA DE PRECIOS
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    </nav>

{{-- Para moviles --}}
<ul class="sidenav" id="slide-out" style="position: absolute;color: #7D0045;">
        <ul class="collapsible collapsible-accordion">
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/') }}">
                    <span class="side">
                        INICIO
                    </span>
                    <i class="material-icons">
                        home
                    </i>
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="{{ url('/empresa') }}">
                    <i class="material-icons">
                        group
                    </i>
                    QUIÉNES SOMOS
                </a>
            </li>
            <li class="bold">
                <a href="" class="collapsible-header waves-effect waves-admin">
                    <i class="material-icons">
                        map
                    </i>
                    PRODUCTOS
                </a>
                <div class="collapsible-body">
                  <!--          <ul>
                                <li class="item-m">
                                    <a href="">
                                        SISTEMA
                                    </a>
                                </li>
                                <li class="item-m">
                                    <a href="">
                                        RUBRO
                                    </a>
                                </li>
                            </ul>
                        </div>-->
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="contacto">
                    <i class="material-icons">
                        new_releases
                    </i>
                    VIDEOS
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="">
                    <i class="material-icons">
                        build
                    </i>
                    CALIDAD
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="">
                    <i class="material-icons">
                        format_list_numbered
                    </i>
                    NOVEDADES
                </a>
            </li>
            <li class="bold">
                <a class="principalmovil collapsible-header waves-effect waves-admin" href="">
                    <i class="material-icons">
                        contact_mail
                    </i>
                    CONTACTO
                </a>
            </li>
        </ul>
    </ul>
 {{-- Para moviles fin--}} 
         
</header>