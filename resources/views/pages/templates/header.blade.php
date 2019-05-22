<header>
    {{-- BARRA PRINCIPAL --}}
    <nav class="principal">
        <div class="container" style="width: 80%">
            <a href="#" data-target="slide-out" class="sidenav-trigger" style=" "><i class="material-icons" style="color: white;">menu</i></a>
            <div class="row" style="margin-bottom: 1.5%;">
                <div class="col l12 m12 s12">
                    <div class="redeshead col l4 m4 s4 center">
                        <ul class="center" style="margin-left: 38%;margin-top: 7%;">
                            <div class="col l3 m3 s3">
                                <li class="redes_head" style="margin-top: 72%;">
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
                        <a class="brand-logo center" style="left: 49.9%; z-index: 5;" href="{{ url('/') }}">
                            <img alt="" src="{{asset('img/logo_blanco.png')}}">
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
                                @if(Auth::user())
                                    <div class="dropdown-trigger hide-on-med-and-down">
                                        <a href="{{ route('zproductos')}}" style="color: #595959; margin: 3% 0%;">
                                            Zona privada
                                        </a>
                                    </div>
                                    @else
                                    <div class="dropdown-trigger hide-on-med-and-down" data-target="dropdown1">
                                        <span href="zonaprivada/productos" style="color: #595959; margin: 3% 0%;">
                                            Zona privada
                                        </span>
                                    </div>
                                @endif                                                                  <!-- Dropdown LOGIN -->
                <div class="areaprivada">
                        <ul class="dropdown-content" id="dropdown1" style="background: none, width:400px!important; height: 282px!important;">
                            <div class="container" style="background: #FAFAFA; margin-top: 19px !important; outline: none; width: 282px;height: 62px;">
                                {!!Form::open(['route'=>'logindistribuidor', 'method'=>'POST', 'class' => 'col s12'])!!}
                                <div class="row">
                            <div class="input-field col s12">
                                <label for="Usuario" style="height: 65%;">Usuario</label>
                                <input class="" name="username" type="text" style="border-bottom: 1px solid black;margin-top: 15%;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password" style="height: 65%;">Contraseña</label>
                                <input class="" name="password" type="password" style="border-bottom: 1px solid black;margin-top: 15%;">
                            </div>
                        </div>
                                <style type="text/css">
                                    .color-del-boton{
                     background-color: #01A0E2;
                }
                .color-del-boton:hover{
                     background-color: #01A0E2;
                }
                                </style>
                                <div class="col s12" style="position: relative;right: 24%;margin-top: 9%;
        margin-bottom: 2%;">
                                    <input class="waves-effect waves-light btn right colorboton" style="color: white;font-family: 'Lato';font-weight: bold;padding-top: 4%;" type="submit" value="INGRESAR">
                                    </input>
                                </div>
                                <li class="center" style="font-size: 12px;color: pink; text-decoration: none;">
                                    <a href="{{route('registro')}}" style="color: #8D302F!important; text-align: center;">
                                        CREAR UNA CUENTA NUEVA
                                    </a>
                                </li>
                                {!!Form::close()!!}
                            </div>
                        </ul>
                    </div>
                    <!-- Dropdown LOGIN FIN -->
                           {{--      @endif --}}
                <!-- Dropdown LOGIN FIN -->
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
                
        {{-- BARRA SUPERIOR --}}
    <div class="top hide-on-med-and-down">
        <div class="container hide-on-med-and-down" style="width: 100%;">
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="col l6 m6 s6 center">
                        <ul class="item-left center hide-on-med-and-down">
                            @if($activo=='home')
                            <li class="activo item-m">
                                <a href="{{ url('/') }}">
                                    INICIO
                                </a>
                            </li>
                            @else
                            <li class="item-m">
                                <a href="{{ url('/') }}">
                                    INICIO
                                </a>
                            </li>
                            @endif
                            @if($activo=='empresa')
                            <li class="activo item-m">
                                <a href="{{ url('/empresa') }}">
                                    EMPRESA
                                </a>
                            </li>
                            @else
                            <li class="item-m">
                                <a href="{{ url('/empresa') }}">
                                    EMPRESA
                                </a>
                            </li>
                            @endif
                            @if($activo=='productos')
                            <li class="activo item-m" {{-- id="menu_productos" --}}>
                            <a class="{{-- prod_menu --}}" href="{{route('page.categorias')}}">
                                    PRODUCTOS
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
                                <a class="{{-- prod_menu --}}item-m" href="{{route('page.categorias')}}">
                                    PRODUCTOS
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
                            @if($activo=='ofertas')
                            <li class="activo item-m" style="margin: 0px 0px;">
                            <a href="{{route('ofertas')}}">
                                    OFERTAS
                                </a>
                            </li>
                            @else
                            <li class="item-m" style="margin: 0px 0px;">
                                <a href="{{route('ofertas')}}">
                                    OFERTAS
                                </a>
                            </li>
                            @endif
                            @if($activo=='presupuesto')
                            <li class="activo item-m" style="margin: 0px -9px;">
                                <a href="{{route('presupuesto')}}">
                                    SOLICITAR PRESUPUESTO
                                </a>
                            </li>
                            @else
                            <li class="item-m" style="margin: 0px -9px;">
                                <a href="{{route('presupuesto')}}">
                                    SOLICITAR PRESUPUESTO
                                </a>
                            </li>
                            @endif
                            @if($activo=='contacto')
                            <li class="activo item-m" style="margin: 0px -9px;">
                                <a href="{{route('contacto')}}">
                                    CONTACTO
                                </a>
                            </li>
                            @else
                            <li class="item-m" style="margin: 0px -9px;">
                                <a href="{{route('contacto')}}">
                                    CONTACTO
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