<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <title>
                                Panel de administración - @yield('titulo')
                            </title>
                           {{--  <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png"/> --}}
                            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                <link href="{{ asset('plugins/materialize/css/materialize.min.css') }}" rel="stylesheet">
                                    <link href="{{ asset('css/admin/admin.css') }}" media="screen,projection" rel="stylesheet" type="text/css"/>
                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <!-- CABECERA -->
        <header>
            <!-- Dropdown Structure -->
            <ul class="dropdown-content" id="dropdown1">
                <li>
                    <a class="right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('  Cerrar Sesión') }}
                    </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <nav>
                <a class="sidenav-trigger" data-target="slide-out" href="#">
                    <i class="material-icons">
                        menu
                    </i>
                </a>
                <div class="nav-wrapper">
                    <div class="container">
                        <a class="brand-logo" href="#!">
                            @yield('titulo')
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <!-- Dropdown Trigger -->
                            <li>
                                <a class="dropdown-trigger" data-target="dropdown1" href="#!">
                                    Bienvenido
                                    <i class="material-icons right">
                                        arrow_drop_down
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <li>
                    <a href="sass.html">
                        Sass
                    </a>
                </li>
                <li>
                    <a href="badges.html">
                        Components
                    </a>
                </li>
                <li>
                    <a href="collapsible.html">
                        Javascript
                    </a>
                </li>
                <li>
                    <a href="mobile.html">
                        mama
                    </a>
                </li>
            </ul>
            <!-- SIDENAV MENU -->
            <ul class="sidenav sidenav-fixed" id="slide-out">
                <div class="logo">
                    <a class="brand-logo" href="" id="logo-container">
                        <img alt="" class="responsive-img" src="{{ asset('img/logo_blanco.png') }}">
                        </img>
                    </a>
                </div>
                <ul class="collapsible collapsible-accordion">
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Datos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('datos.edit', 1)}}">
                                        Editar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Contenido de empresas
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('contenido_empresas.edit', 1)}}">
                                        Editar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Valor agregado
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('valor_agregados.index')}}">
                                        Listado
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Servicios
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('servicios.index')}}">
                                        Listado
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Sliders
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('sliders.index')}}">
                                        Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('sliders.create')}}">
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Banner
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('banner.index')}}">
                                        Editar banner
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Categorias
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('categorias.index')}}">
                                        Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('categorias.create')}}">
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Productos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('productos.index')}}">
                                        Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('productos.create')}}">
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Redes
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('redes.index')}}">
                                        Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('redes.create')}}">
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Descuentos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('descuentos.index')}}">
                                        Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('descuentos.create')}}">
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Catalogo
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('catalogos.index')}}">
                                        Editar
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Usuarios
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('users.index')}}">
                                        Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('users.create')}}">
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="bold">
                        <a class="collapsible-header waves-effect waves-admin">
                            <i class="material-icons">
                                home
                            </i>
                            Pedidos
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('pedidos.index')}}">
                                        Ver historial
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
            </ul>
        </header>
        <main style="">
            <div class="container">
                @yield('contenido')
            </div>
        </main>
        <!--Import jQuery before materialize.js-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript">
        </script>
        <!-- Materialize Core JavaScript -->
        <script src="{{ asset('plugins/materialize/js/materialize.min.js') }}">
        </script>
        <script src="{{ asset('js/app.js')}}"></script>
        @yield('js')
<script type="text/javascript">
            /*         document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
*/
  // Or with jQuery

$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('.collapsible').collapsible();

  });
  $(document).ready(function(){
    $('.modal').modal();
  });

</script>
        
</html>